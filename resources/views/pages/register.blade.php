@extends("layout")
@section("content")
    <div class="row">
        <div class="col-md-8 mx-auto">
            @if(session('message'))
                <x-bootstrap.alert :type="session('type')" :title="session('title')" :message="session('message')" />
            @endif
            <h4>Register</h4>
            <hr />
            <form action="{{ route('user_register') }}" method="post">
                @csrf
                <x-bootstrap-forms.input label-text="Full name" name="name" placeholder-text="Ex: John Doe" input-type="text" id="registerFullName" />
                <x-bootstrap-forms.input label-text="E-Mail" name="email" placeholder-text="Ex: john@johndoe.com" input-type="email" id="registerEmail"/>
                <x-bootstrap-forms.select label-text="Language" name="language_id" id="registerLanguage" placeholder-text="Select your language." :options="$languageOptions" />
                <x-bootstrap-forms.select label-text="Country" name="country_id" id="registerCountry" placeholder-text="Select your country." :options="$countryOptions" />
                <x-bootstrap-forms.input label-text="Password" name="password" placeholder-text="Password" input-type="password" id="registerPassword" />
                <x-bootstrap-forms.input label-text="Password ( Repeat )" name="password_confirmation" placeholder-text="Password repeat" input-type="password" id="registerPasswordRepeat" />
                <div class="row justify-content-end mt-3">
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
