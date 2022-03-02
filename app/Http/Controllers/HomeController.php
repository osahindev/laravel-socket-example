<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $lastest_users = \App\Models\User::orderBy('id','desc')->limit(5)->get();

        return view('pages.home')->with(compact('lastest_users'));
    }
}
