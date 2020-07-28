@extends('layouts.app', ['title' => __('Create New Category')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
    <div class="card card-default">
        <div class="card-header">
            Create a New Category
        </div>
        <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <form action="{{ route('category.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name" >Category Name </label>
                    <input type="text" name="name" class="form-control">
                </div>
                    @error("name")
                    <small id="emailHelp" class="form-text error">
                        {{ $message}}
                    </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Create  Category
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
