@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route("user.create")}}" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>
                                        <img src="@if(isset($user->profile->avatar)) {{asset("uploads/avatars/".$user->profile->avatar)}}@else {{asset("uploads/avatars/default.png")}} @endif" style="border-radius:50%;width:50px;height:50px" alt="{{$user->name}}" class="img-thumbnail">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                    </td>
                                    <td>
                                    @if($user->admin)
                                        <form  action="{{route("user.notadmin",['user'=>$user->id])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-xs btn-warning"  >
                                               Remove Permissions
                                            </button>
                                        </form>
                                    @else
                                    <form  action="{{route("user.admin",['user'=>$user->id])}}" method="POST">
                                        @csrf
                                        <button class="btn btn-xs btn-info"  >
                                              Make Admin
                                        </button>
                                    </form>
                                    @endif
                                    </td>
                                    <td class="text-right">
                                        @if(Auth::user()->id==$user->id)
                                        @else
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="padding:2px">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form  action="{{route("user.destroy",['user'=>$user->id])}}" method="POST">
                                                        @csrf
                                                                @method("DELETE")
                                                        <button class=" dropdown-item "  >
                                                                    {{ __('Delete Account') }}
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>

<footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6">
    <div class="copyright text-center text-xl-left text-muted">
        Design From <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> © 2020
    </div>
</div>

</div></footer>    </div>
    </div>


@endsection
