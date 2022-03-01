@extends("layout")
@section("content")
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h4>Sign in</h4>
            <hr />
            <form action="" method="post">
                @csrf
                <x-bootstrap-forms.input label-text="E-Mail" name="email" placeholder-text="Ex: john@johndoe.com" input-type="email" id="signinEmail"/>
                <x-bootstrap-forms.input label-text="Password" name="password" placeholder-text="Password" input-type="password" id="signinPassword" />
                <div class="row justify-content-end mt-3">
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Giriş yap</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
