@extends("layouts.app")

@section("content")
    <div class="card card-default">
        <div class="card-header">
            Edit Your Profile
        </div>
        <div class="card-body">
            <form action="{{ route('user.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="name" >User  Name </label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                    @error("name")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="email" >User Email  </label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                </div>
                    @error("email")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="password" >User Password  </label>
                    <input type="password" name="password" class="form-control">
                </div>
                    @error("password")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group  ">
                    <label for="avatar">Upload your  Image </label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                    @error("avatar")
                    <small id="emailHelp" class="form-text error">
                        {{ $message}}
                    </small>
                    @enderror

                <div class="form-group">
                    <label for="youtube" >Youtube Link  </label>
                    <input type="text" name="youtube" value="{{$user->profile->youtube}}"  class="form-control">
                </div>
                    @error("youtube")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="facebook" >Facebook Link</label>
                    <input type="text" name="facebook"  value="{{$user->profile->facebook}}" class="form-control">
                </div>
                    @error("facebook")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="form-group">
                    <label for="about" >About (BIO)  </label>
                    <textarea type="text" name="about"  class="form-control" cols="6" rows="6">
                        {{$user->profile->about}}
                    </textarea>
                </div>
                    @error("about")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                          Approve Changes
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
