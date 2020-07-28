@extends('layouts.app', ['title' => __('Post Page')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
@if(!$posts->isEmpty())
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
                    Image
                </th>
                <th scope="col">
                    Title
                </th>
                <th scope="col">
                    By
                </th>
                <th scope="col">
                    Edit
                </th >
                <th scope="col">
                    Delete
                </th >
            </tr>
        </thead>
        <tbody>
                @foreach($posts as $key=>$post)
                <tr>

                    <th scope="row">{{$key+1}}</th>
                    <td>
                        <img src="{{$post->featured}}" alt="{{$post->title}}" class="img-thumbnail">
                    </td>
                    <td>
                     Post Title : {{$post->title}},<br>  Post category name : <span>{{$post->category->name}}</span><br>
                    </td>
                    <td>
                        <img src="@if(isset($post->user->profile->avatar)) {{asset("uploads/avatars/".$post->user->profile->avatar)}}@else {{asset("uploads/avatars/default.png")}} @endif" alt="{{$post->user->name}}"  style="border-radius:50%"  width="40" height="40"  > {{$post->user->name}}
                    </td>
                    <td>
                        <a href="{{route("post.edit",['post'=>$post->id])}}" class="btn btn-xs btn-primary">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form  action="{{route("post.destroy",['post'=>$post->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-xs btn-dark"  >
                                    Trash
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
            <strong>Empty Posts</strong>
        </div>
        <hr>
        <p>There is no Posts yet, try to create </p>
        <a class="btn btn-primary" href="{{route("post.create")}}" role="button">Let's Go </a>
    </div>
@endif
@stop
<style>
    .img-thumbnail {
    width: 100px;
    height: 76px !important;
    }
</style>
