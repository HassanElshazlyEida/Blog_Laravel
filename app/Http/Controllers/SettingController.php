<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $setting=Setting::first();
        return view("admin.setting.index",compact("setting"));
    }
    public function update(Request $request){
        $data=$this->validate($request,[
            'site_name'=>"required",
            'contact_number'=>"required",
            'contact_email'=>"required",
            'address'=>"required",
        ]);
        $setting=Setting::first();
        $setting->update($data);
        return redirect()->back()->withStatus(__('Setting Page successfully updated.'));;
    }
}
