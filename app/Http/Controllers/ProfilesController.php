<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user=Auth::user();
        return view("admin.users.profile",compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user=Auth::user();
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            Rule::unique('users')->ignore($user->id),
            'avatar'=>"image|mimes:jpeg,png,jpg|max:2048",
        ]);
        $more_features=$this->validate($request,[
            'about'=>'required',
            'facebook'=>'required|url',
            'youtube'=>'required|url',
        ]);
        /*User Properties */
        if($request->has("password") &&$request->password!= null )
            $user->password=Hash::make($request->password);

        $user->name =$request->name;
        $user->email =$request->email;
        $user->save();
        /* Profile Properties */
        if ($request->hasFile('avatar') && $request->avatar != '') {
            $file_path="uploads/avatars/".$user->profile->avatar;
            if(file_exists($file_path) && $user->profile->avatar!=null)
                unlink($file_path);
            $imageName=time().".".$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path("uploads/avatars"),$imageName);
            $user->profile->update($more_features+array("avatar"=>$imageName));
        }else {
            $user->profile->update($more_features);
        }
        $user->profile->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();
       $user->profile->delete();
       return redirect()->back();
    }
}
