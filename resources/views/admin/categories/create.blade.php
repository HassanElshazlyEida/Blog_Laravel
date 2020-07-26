@extends("layouts.app")

@section("content")
    <div class="card card-default">
        <div class="card-header">
            Create a New Category
        </div>
        <div class="card-body">
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
