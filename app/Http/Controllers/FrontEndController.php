<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class FrontEndController extends Controller
{
    public function index()
    {
        $title=Setting::first()->site_name;
        return view('index',compact("title"));
    }
}
