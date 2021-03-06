<?php

namespace App\Http\Controllers;


use App\posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $posts = posts::paginate(5);
        return view('home', compact('posts'));
    }

    public function userlogin()
    {
        return view('login');
    }
    public function login()
    {
        return view('home');
    }
    public function ShowUserSetting(){
        return view('userProfile');
    }
}

