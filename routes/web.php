<?php

use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();



/*
|--------------------------------------------------------------------------
| Website pages
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'FrontEndController@index')->name("interface.index");
Route::get('/posts/{id}/{slug}', 'FrontEndController@SinglePost')->name("post.single");
Route::get('/categories/{category}', 'FrontEndController@category')->name("category");
Route::get('/tags/{tag}', 'FrontEndController@tag')->name("tag");

Route::group(['middleware'=>"auth"],function(){
/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
|
*/
    Route::get('/admin/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Profile Auth
|--------------------------------------------------------------------------
|
*/

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
/*
|--------------------------------------------------------------------------
| Posts properties
|--------------------------------------------------------------------------
|
*/
    Route::get('/posts',"PostController@index")->name("post.index");

    Route::get('/post/create',"PostController@create")->name("post.create");
    Route::post('/post/store',"PostController@store")->name("post.store");
    Route::get('/post/{post}/edit',"PostController@edit")->name("post.edit");
    Route::patch('/post/{post}',"PostController@update")->name("post.update");
    Route::delete('/post/{post}',"PostController@destroy")->name("post.destroy");
    Route::post('/post/{post}/kill',"PostController@kill")->name("post.kill");
    Route::post('/post/{post}/restore',"PostController@restore")->name("post.restore");
    Route::get('/post/trashed',"PostController@trashed")->name("post.trashed");
/*
|--------------------------------------------------------------------------
| Categories properties
|--------------------------------------------------------------------------
|
*/

    Route::get('/categories',"CategoryController@index")->name("category.index");
    Route::get('/category/create',"CategoryController@create")->name("category.create");
    Route::post('/category',"CategoryController@store")->name("category.store");
    Route::get('/category/{category}/edit',"CategoryController@edit")->name("category.edit");
    Route::patch('/category/{category}',"CategoryController@update")->name("category.update");
    Route::delete('/category/{category}',"CategoryController@destroy")->name("category.destroy");
/*
|--------------------------------------------------------------------------
| Tags properties
|--------------------------------------------------------------------------
|
*/
    Route::get('/tags',"TagController@index")->name("tag.index");
    Route::get('/tag/create',"TagController@create")->name("tag.create");
    Route::post('/tag/store',"TagController@store")->name("tag.store");
    Route::get('/tag/{tag}/edit',"TagController@edit")->name("tag.edit");
    Route::patch('/tag/{tag}',"TagController@update")->name("tag.update");
    Route::delete('/tag/{tag}',"TagController@destroy")->name("tag.destroy");
/*
|--------------------------------------------------------------------------
| User Auth
|--------------------------------------------------------------------------
|
*/

    Route::get('/users',"UserController@index")->name("user.index");
    Route::get('/user/create',"UserController@create")->name("user.create");
    Route::post('/user/store',"UserController@store")->name("user.store");
    Route::post('/user/{user}/admin',"UserController@admin")->name("user.admin")->middleware("admin");
    Route::post('/user/{user}/notadmin',"UserController@not_admin")->name("user.notadmin")->middleware("admin");
    Route::resource('user', 'UserController', ['except' => ['show']]);
/*
|--------------------------------------------------------------------------
| Setting options
|--------------------------------------------------------------------------
|
*/

    Route::get('/settings',"SettingController@index")->name("setting.index");
    Route::patch('/setting/update',"SettingController@update")->name("setting.update");

});
