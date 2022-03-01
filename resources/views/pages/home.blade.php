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
    <div class="row mt-5">
        <div class="col">
            <h2>Online Users</h2>
            <hr>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Dates</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">No data.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
