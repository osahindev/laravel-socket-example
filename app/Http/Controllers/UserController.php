<?php

namespace App\Http\Controllers;

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

        return redirect()->back()->with([
            'type' => 'success',
            'title' => 'Success !',
            'message' => "Registration success.",
        ]);
    }
}
