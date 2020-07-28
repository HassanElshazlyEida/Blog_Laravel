@extends('layouts.app', ['title' => __('Categories')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Categories page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])
@if(!$categories->isEmpty())

    <div class="card card-default p-3">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card-body">
        <strong>Categories Setting</strong>
    </div>
    <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                    #
                    </th >
                    <th scope="col">
                        Category Name
                    </th>
                    <th scope="col">
                        Editing  Category
                    </th>
                    <th scope="col">
                        Deleting Category
                    </th >
                </tr>
            </thead>
            <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{route("category.edit",['category'=>$category->id])}}" class="btn btn-xs btn-primary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form  action="{{route("category.destroy",['category'=>$category->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-xs btn-danger" >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
@else
    <div class="card card-default p-3">
        <div class="card-body">
            <strong>Empty Category</strong>
        </div>
        <hr>
        <p>There is no category yet, try to create </p>
        <a class="btn btn-primary" href="{{route("category.create")}}" role="button">Let's Go </a>
    </div>
@endif

@endsection
