@extends('layouts.app', ['title' => __('Create Tags')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
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
            Create a New Tag
        </div>
        <div class="card-body">
            <form action="{{ route('tag.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="tag" >Tag Name </label>
                    <input type="text" name="tag" class="form-control">
                </div>
                    @error("tag")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Create  Tag
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
<style>
    .error{
        color: red !important;
    }
</style>
