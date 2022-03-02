<?php

namespace App\Http\Controllers;

use App\Events\LoginUserEvent;
use App\Events\RegisterUserEvent;
use App\Events\UserDetailsEvent;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Country;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register() {
        $languageOptions = cache()->rememberForever('languages', function () {
            return Language::all()->map(function ($language) {
                return [
                    'value' => $language->id,
                    'text' => $language->name,
                ];
            })->toArray();
        });

        $countryOptions = cache()->rememberForever('countries', function (){
            return Country::all()->map(function($country) {
                return [
                    'value' => $country->id,
                    'text' => $country->name,
                ];
            })->toArray();
        });

        return view("pages.register")->with(compact('languageOptions','countryOptions'));
    }

    public function user_register(UserRegisterRequest $request) {
        $user = User::create($request->only('name', 'password', 'email', 'language_id', 'country_id'));

        if(!$user) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Error !',
                'message' => "Registration failed. Please try again later.",
            ])->withInput($request->all());
        }

        event(new RegisterUserEvent($user));

        return redirect()->back()->with([
            'type' => 'success',
            'title' => 'Success !',
            'message' => "Registration success.",
        ]);
    }

    public function login() {
        return view('pages.signin');
    }

    public function user_login(UserLoginRequest $request) {
        if(auth()->attempt($request->only('email','password'))) {
            return redirect()->route('home');
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Error !',
            'message' => "Login failed.",
        ]);
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }

    public function user_details($id) {
        if(!auth()->check()) {
            return abort(403);
        }

        $user = User::with('language','country')->findOrFail($id);
        $auth_user = User::findOrFail(auth()->id());

        event(new UserDetailsEvent($auth_user, $user));
    }
}
