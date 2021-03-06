@extends('layouts.app', ['title' => __('Update Post')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
    @include('admin.include.errors')
    <div class="card card-default">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-header">
            <span>Update Category:</span><strong>{{$post->title}}</strong>
        </div>
        <div class="card-body">

            <form action="{{ route('post.update',["post"=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
            @method("PATCH")
                <img class="card-img-top mb-3 "  src="{{$post->featured}}" alt="{{$post->title}}"height="400">

                <div class="form-group  ">
                    <label for="featured">Featured Image </label>
                    <input type="file" name="featured"  class="form-control">
                </div>
                    @error("featured")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="form-group">
                    <label for="title" >Post Title </label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                </div>
                    @error("title")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id}}"
                            @if($post->category_id==$category->id)
                            selected
                            @endif
                            >
                        {{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>

                    @foreach($tags as $key=>$tag)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tags[]" id="exampleCheck{{$key}}" value="{{$tag->id}}"
                        @foreach($post->tags as $t)
                            @if($tag->id == $t->id)
                            checked
                            @endif
                        @endforeach>
                        <label class="form-check-label" for="exampleCheck{{$key}}">{{$tag->tag}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content" >Post Content </label>
                    <textarea type="text" name="content"  class="form-control" cols="5" rows="5">{{$post->content}}</textarea>
                </div>
                    @error("content")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Update  Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
