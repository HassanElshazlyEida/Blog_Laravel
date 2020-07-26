@extends("layouts.app")

@section("content")

    @include('admin.include.errors')
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
