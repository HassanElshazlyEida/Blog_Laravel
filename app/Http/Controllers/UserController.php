<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        //return view('users.index');
        $users=User::all();
        return view("admin.users.index",compact('users'));
    }
    public function index2(User $model) /* For view all users */
    {
        $users=User::all();
        return view("admin.users.index",compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'name'=>"required",
            "email"=>"required|email|unique:users",
            'password'=>"required"
        ]);
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        $profile=Profile::create(['user_id'=>$user->id]);

        return redirect()->route("user.index");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function admin(User $user){
        $user->where('id', $user->id)->update(array('admin' =>1));
        return redirect()->back();
    }

    public function not_admin(User $user){
        $user->where('id', $user->id)->update(array('admin' => 0));
        return redirect()->back();
    }


}
