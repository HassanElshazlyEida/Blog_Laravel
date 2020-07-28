@extends('layouts.app', ['title' => __('Post\'s Trash')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Category page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
])
@if(!$posts->isEmpty())
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<div class="card card-default p-3">
  <div class="card-body">
      <strong>Post's Trash  Setting</strong>
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
                    Restore
                </th >
                <th scope="col">
                    Destroy
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
                        {{$post->title}}
                    </td>
                    <td>
                        <form  action="{{route("post.restore",['post'=>$post->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-xs btn-success"  >
                                    Restore
                            </button>
                        </form>
                    </td>
                    <td>
                        <form  action="{{route("post.kill",['post'=>$post->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-xs btn-danger"  >
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
            <strong>Empty Trash</strong>
        </div>
        <hr>
        <p>Your Trash is empty</p>
    </div>
@endif
@stop
<style>
    .img-thumbnail {
    width: 100px;
    height: 76px !important;
    }
</style>
