@extends('layouts.app', ['title' => __('Update Tags')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
    @include('admin.include.errors')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
            Update Tag:{{$tag->name}}
        </div>
        <div class="card-body">
            <form action="{{ route('tag.update',["tag"=>$tag->id]) }}" method="POST" >
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="tag" >Tags Name </label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
                </div>
                    @error("tag")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Update  Tag
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
