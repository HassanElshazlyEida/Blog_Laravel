@extends("layouts.app")

@section("content")

    @include('admin.include.errors')
    <div class="card card-default">
        <div class="card-header">
            Update Category:{{$category->name}}
        </div>
        <div class="card-body">
            <form action="{{ route('category.update',["category"=>$category->id]) }}" method="POST" >
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="name" >Category Name </label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                    @error("name")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Update  Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
