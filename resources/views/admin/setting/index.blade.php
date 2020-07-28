@extends('layouts.app', ['title' => __(' BLog Setting')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is Setting page . You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
          Edit Blog Setting
        </div>
        <div class="card-body">
            <form action="{{ route('setting.update')}}" method="POST" >
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="site_name" >Site Name </label>
                    <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
                </div>
                    @error("site_name")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="address" >  Address  </label>
                    <input type="text" name="address" class="form-control"  value="{{$setting->address}}">
                </div>
                    @error("address")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="contact_number" >Contact Phone  </label>
                    <input type="text" name="contact_number" class="form-control"  value="{{$setting->contact_number}}">
                </div>
                    @error("contact_number")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror

                <div class="form-group">
                    <label for="contact_email" >Contact Email  </label>
                    <input type="email" name="contact_email" class="form-control"  value="{{$setting->contact_email}}">
                </div>
                    @error("contact_email")
                        <small id="emailHelp" class="form-text error">
                            {{ $message}}
                        </small>
                    @enderror
                <div class="div form-group">
                    <div class="div text-center">
                        <button class="btn btn-success" type="submit">
                            Update Site Setting
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
