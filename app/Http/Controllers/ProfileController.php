<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Rules\CurrentPasswordCheckRule;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user=Auth::user();
        return view('profile.edit',compact("user"));
    }


    public function update(Auth $user,Request $request)
    {
        $user=$user::user();
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

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(Auth $user,Request $request)
    {
        $data=$this->validate($request,[
            'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
            'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:6'],
        ]);

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    public function destroy()
    {


    }
}
