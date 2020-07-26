@extends("layouts.app")

@section("content")
    <div class="card card-default">
        <div class="card-header">
            Create a New Tag
        </div>
        <div class="card-body">
            <form action="{{ route('tag.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="tag" >Tag Name </label>
                    <input type="text" name="tag" class="form-control">
                </div>
                    @error("tag")
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
