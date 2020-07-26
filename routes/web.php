<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/test',function(){
    return view("index");
});
Route::get('/test1',function(){
    return view("about");
});

Route::get('/test2',function(){
    return view("blog");
});

Route::get('/test3',function(){
    return view("contact");
});


Route::get('/test4',function(){
    return view("event");
});

Route::get('/test5',function(){
    return view("single");
});

Route::get('/test6',function(){
    return view("travel");
});
Route::group(['middleware'=>"auth"],function(){

    Route::get('/', 'FrontEndController@index');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('/posts',"PostController@index")->name("post.index");
    Route::get('/post/create',"PostController@create")->name("post.create");
    Route::post('/post/store',"PostController@store")->name("post.store");
    Route::get('/post/{post}/edit',"PostController@edit")->name("post.edit");
    Route::patch('/post/{post}',"PostController@update")->name("post.update");
    Route::delete('/post/{post}',"PostController@destroy")->name("post.destroy");
    Route::post('/post/{post}/kill',"PostController@kill")->name("post.kill");
    Route::post('/post/{post}/restore',"PostController@restore")->name("post.restore");
    Route::get('/post/trashed',"PostController@trashed")->name("post.trashed");


    Route::get('/categories',"CategoryController@index")->name("category.index");
    Route::get('/category/create',"CategoryController@create")->name("category.create");
    Route::post('/category',"CategoryController@store")->name("category.store");
    Route::get('/category/{category}/edit',"CategoryController@edit")->name("category.edit");
    Route::patch('/category/{category}',"CategoryController@update")->name("category.update");
    Route::delete('/category/{category}',"CategoryController@destroy")->name("category.destroy");

    Route::get('/tags',"TagController@index")->name("tag.index");
    Route::get('/tag/create',"TagController@create")->name("tag.create");
    Route::post('/tag/store',"TagController@store")->name("tag.store");
    Route::get('/tag/{tag}/edit',"TagController@edit")->name("tag.edit");
    Route::patch('/tag/{tag}',"TagController@update")->name("tag.update");
    Route::delete('/tag/{tag}',"TagController@destroy")->name("tag.destroy");

    Route::get('/users',"UserController@index")->name("user.index");
    Route::get('/user/create',"UserController@create")->name("user.create");
    Route::post('/user/store',"UserController@store")->name("user.store");
    Route::post('/user/{user}/admin',"UserController@admin")->name("user.admin")->middleware("admin");
    Route::post('/user/{user}/notadmin',"UserController@not_admin")->name("user.notadmin")->middleware("admin");

    Route::get('/user/profile',"ProfilesController@index")->name("user.profile");
    Route::patch('/user/profile/update',"ProfilesController@update")->name("user.update");
    Route::delete('/user/{user}',"ProfilesController@destroy")->name("user.destroy");

    Route::get('/settings',"SettingController@index")->name("setting.index");
    Route::patch('/setting/update',"SettingController@update")->name("setting.update");

});
