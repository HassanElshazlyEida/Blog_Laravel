@extends('layouts.app', ['title' => __('Create User')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is page that allowed you to create new user . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])

    <div class="card card-default">
        <div class="card-header">
            Create a New User
        </div>
        <div class="card-body">
            <form action="{{ route('user.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name" >User Name </label>
                    <input type="text" name="name" class="form-control">
                </div>
                    @error("name")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="email" >User Email  </label>
                    <input type="text" name="email" class="form-control">
                </div>
                    @error("email")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="password" >User password  </label>
                    <input type="password" name="password" class="form-control">
                </div>
                    @error("password")
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
