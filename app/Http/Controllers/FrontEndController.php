<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Setting;
use App\Tag;

class FrontEndController extends Controller
{
    protected $notfound=false;
    public function index(Request $request)
    {
        $Settings=Setting::first();
        $categories=Category::take(6)->get();
        $tags=Tag::take(15)->get();
        $first_post=Post::first();
        if($request->has("search")){
            $posts=Post::where('id',$request->query('search'))->orderByRaw("RAND()")->paginate(6);
            if($posts->isEmpty())
                $this->notfound=true;
        }
        else
            $posts=Post::orderByRaw("RAND()")->paginate(6);
        $notfound=$this->notfound;
        $recent_posts=Post::orderBy('title', 'desc')->paginate(3);
        return view('index',compact("id","categories","first_post",
        "posts","notfound","recent_posts","tags","Settings"));
    }
    public function SinglePost(Post $id,$slug)
    {
        $post=$id;
        $Settings=Setting::first();
        $categories=Category::take(6)->get();
        $recent_posts=Post::orderBy('id', 'desc')->paginate(3);
        $tags=Tag::take(15)->get();
        return view("single",compact("post","categories","Settings","recent_posts","tags"));
    }
    public function category(Category $category){
        $categories=$category->posts()->paginate(4);
        $Settings=Setting::first();
        $tags=Tag::take(15)->get();
        $recent_posts=Post::orderBy('id', 'desc')->paginate(3);
        return view("category",compact("Settings","tags","recent_posts","categories","category"));
    }
    public function tag(Tag $tag){
        $tags=$tag->posts()->paginate(4);
        $Settings=Setting::first();
        $recent_posts=Post::orderBy('id', 'desc')->paginate(3);
        $categories=Category::take(6)->get();
        return view("tag",compact("Settings","recent_posts","tags","tag","categories"));
    }


}
