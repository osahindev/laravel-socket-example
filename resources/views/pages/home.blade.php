@extends("layout")
@section("content")
    <div class="row">
        <div class="col">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2>Welcome to example</h2>
                <p>We made an example with laravel and socket io.</p>
            </div>
        </div>
    </div>
    @auth()
    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Online Users</h2>
            <hr>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody id="onlineUserData">
                <tr>
                    <td colspan="1">No data.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>Lastest Registered Users</h2>
            <hr>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody id="lastestRegisteredUserData">
                @forelse($lastest_users as $lastest_user)
                <tr data-id="{{ $lastest_user->id }}" id="registered_user_{{ $lastest_user->id }}">
                    <td colspan="1">{{ $lastest_user->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="1">No data.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="row mt-5">
                <div class="col">
                    <h4>Selected User</h4>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-5">
                            Full Name:
                        </div>
                        <div class="col-7" id="selectedFullName">No data.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5">
                            E-Mail:
                        </div>
                        <div class="col-7" id="selectedEmail">No data.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5">
                            Language:
                        </div>
                        <div class="col-7" id="selectedLanguage">No data.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5">
                            Country:
                        </div>
                        <div class="col-7" id="selectedCountry">No data.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

@endsection
@section("js")
    @auth()
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        window.laravelEchoPort = '{{ env('LARAVEL_ECHO_PORT') }}';
    </script>
    <script src="//{{ request()->getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function addUserToStatusTable(user) {
            var tr = $("<tr data-id=\""+user.id+"\" id=\"user_status_"+user.id+"\"></tr>");
            var nameTd = $("<td>"+user.name+"</td>");
            tr.append(nameTd);
            $("#onlineUserData").prepend(tr);
        }

        function addRegisteredUserTable(user) {
            if($("#lastestRegisteredUserData tr").length > 4) {
                var id = $("#lastestRegisteredUserData tr").eq(4).attr("id");
                $("#" + id).remove();
            }
            var tr = $("<tr data-id=\""+user.id+"\" id=\"user_status_"+user.id+"\"></tr>");
            var nameTd = $("<td>"+user.name+"</td>");
            tr.append(nameTd);
            $("#lastestRegisteredUserData").prepend(tr);
        }

        window.Echo.join('online_users').here(users => {
            $("#onlineUserData").html("");
            users.forEach(function(user){
                addUserToStatusTable(user);
            });
        }).joining((user) => {
            addUserToStatusTable(user);
        }).leaving((user) => {
            $("#user_status_" + user.id).remove();
        }).error((error) => {
            console.error(error);
        });

        window.Echo.private('user_register').listen('.register.event', function (data){
            addRegisteredUserTable(data.user);
        });

        window.Echo.private('user_details.{{ auth()->id() }}').listen('.user.details', function (data){
            console.log(data);

            $("#selectedFullName").text(data.getUser.name);
            $("#selectedEmail").text(data.getUser.email);
            $("#selectedLanguage").text(data.getUser.language.name);
            $("#selectedCountry").text(data.getUser.country.name);
        });

        $("body").on("click","tr", function (){
            var id = $(this).data("id");
            var url = "{{ route('user_details', 0) }}".replace('/0', "/" + id);

            var selectFullname = $("#selectedFullName");
            var selectEmail = $("#selectedEmail");
            var selectedLanguage = $("#selectedLanguage");
            var selectedCountry = $("#selectedCountry");
            selectFullname.text("Loading...");
            selectEmail.text("Loading...");
            selectedLanguage.text("Loading...");
            selectedCountry.text("Loading...");

            $.get(url, function (data){
            });
        });

    </script>
    @endauth
@endsection
