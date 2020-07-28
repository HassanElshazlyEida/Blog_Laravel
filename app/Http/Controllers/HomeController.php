<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use App\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $num_users=User::all()->count();
        $num_categories=Category::all()->count();
        $num_posts=Post::all()->count();
        $num_tags=Tag::all()->count();
        $Settings=Setting::first();
        return view('dashboard',compact("num_users","num_categories","num_posts","num_tags","Settings"));
    }

}
