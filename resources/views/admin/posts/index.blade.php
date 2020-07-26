@extends('layouts.app')
@section('content')
@if(!$posts->isEmpty())
<div class="card card-default p-3">
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
                       first post's tags : <span>{{$post->tags[0]->tag}}</span>
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
