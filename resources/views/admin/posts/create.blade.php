@extends('layouts.app', ['title' => __('Create Post')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
@if(!$categories->isEmpty() &&  !$tags->isEmpty())
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
            Create a New Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.store')}}" method="POST"  enctype="multipart/form-data" >
                @csrf
                
                <div class="form-group">
                    <label for="title" >Title </label>
                    <input type="text" name="title" class="form-control">
                </div>
                    @error("title")
                    <small id="emailHelp" class="form-text error">
                        {{ $message}}
                    </small>
                    @enderror

                <div class="form-group  ">
                    <label for="featured">Featured Image </label>
                    <input type="file" name="featured" class="form-control">
                </div>
                    @error("featured")
                    <small id="emailHelp" class="form-text error">
                        {{ $message}}
                    </small>
                    @enderror

                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{ $category->id}}" >{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach($tags as $key=>$tag)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tags[]" id="exampleCheck{{$key}}" value="{{$tag->id}}">
                        <label class="form-check-label" for="exampleCheck{{$key}}">{{$tag->tag}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content </label>
                  <textarea  name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                    @error("content")
                    <small id="emailHelp" class="form-text error">
                        {{ $message}}
                    </small>
                    @enderror

                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Create Post
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@else
<div class="card card-default p-3">
    <div class="card-body">
        <strong>Empty Category or/and Tags</strong>
    </div>
    <hr>
    <p>There is no category or/and tags  yet, try to create at least one of both  </p>
    <a class="btn btn-primary" href="{{route("category.create")}}" role="button">Let's Go </a>
</div>
@endif
@endsection
@section('styles')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js">
</script>
<script>

  $('#content').summernote();

</script>

<style>
    .error{
        color: red !important;
    }
</style>
