<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts=Post::all();
       return view("admin.posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if (count($categories)==0 || count($tags)==0 ){
            Session::flash("EmptyCategory","You Must have some categroies before attemping to create a post");
            return redirect()->back();
        }


        return view("admin.posts.create",compact("categories","tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post)
    {

        $data=$this->validate_post($request);
        $tags=$this->validate($request,[
        'tags'=>'required',
        ]);
        $featured=$request->featured;
        $imageName=time().".".$featured->getClientOriginalExtension();

        $featured->move(public_path("uploads/posts"),$imageName);
        $Created=$post->create($data+array('slug'=>str_slug($request->title)));
        $Created->tags()->attach($request->tags);
        $this->edit_image_name($Created,$imageName);
        return redirect()->route("post.index");
    }

    protected function edit_image_name($post,$imageName){
        $post->update([
            'featured'=>$imageName
        ]);
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
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
       return view("admin.posts.edit",compact("post","categories",'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

       $data=$this->validate($request,[
        'title'=>"required|max:255",
        "content"=>"required",
        'category_id'=>"required",
        ]);

        $imageName=str_replace(asset("/uploads/posts/"),"", $post->featured);
        if ($request->hasFile('featured') && $request->featured != '') {
            $file_path=str_replace(asset(""),"", $post->featured);
            if(file_exists($file_path))
                unlink($file_path);
            $featured=$request->featured;
            $imageName=time().".".$featured->getClientOriginalExtension();
            $featured->move(public_path("uploads/posts"),$imageName);
        }

        $updated=$post->update($data+array('slug'=>str_slug($request->title),'featured'=>$imageName));
        $post->tags()->sync($request->tags);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
    public function trashed(){
        $posts=Post::onlyTrashed()->get();
        return view("admin.posts.trashed",compact("posts"));
    }
    public function kill($post){
        $post=$this->trash($post);
        if(!$post)
            return redirect()->back();//failed
        $post->forceDelete();
        return redirect()->back();//success
    }
    public function restore($post){
        $post=$this->trash($post);
        if(!$post)
            return redirect()->back();//failed
        $post->restore();
        return redirect()->back();//success
    }
    protected function trash($post){
        $post = Post::withTrashed()->find($post);
        if(isset($post)) {
            if ($post->exists)
                 return $post;
            else
                return false;
        }
        return false;
    }
    protected function validate_post($request){
        return $this->validate($request,[
            'title'=>"required|max:255",
            'featured'=>"required|image|mimes:jpeg,png,jpg|max:2048",
            "content"=>"required|min:3|max:1000",
            'category_id'=>"required",
       ]);
    }

}
