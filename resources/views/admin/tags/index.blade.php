@extends('layouts.app')
@section('content')

@if(!$tags->isEmpty())
    <div class="card card-default p-3">
    <div class="card-body">
        <strong>Tags Setting</strong>
    </div>
    <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                    #
                    </th >
                    <th scope="col">
                        Tag Name
                    </th>
                    <th scope="col">
                        Editing  Tag
                    </th>
                    <th scope="col">
                        Deleting Tag
                    </th >
                </tr>
            </thead>
            <tbody>
                    @foreach($tags as $key=>$tag)
                    <tr>

                        <th scope="row">{{$key+1}}</th>
                        <td>
                            {{$tag->tag}},<br> @if(isset($tag->posts[0])){{$tag->posts[0]->title}}@endif
                        </td>
                        <td>
                            <a href="{{route("tag.edit",['tag'=>$tag->id])}}" class="btn btn-xs btn-primary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form  action="{{route("tag.destroy",['tag'=>$tag->id])}}" method="POST">
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
            <strong>Empty Tags</strong>
        </div>
        <hr>
        <p>There is no tag yet, try to create </p>
        <a class="btn btn-primary" href="{{route("tag.create")}}" role="button">Let's Go </a>
    </div>
@endif

@stop
