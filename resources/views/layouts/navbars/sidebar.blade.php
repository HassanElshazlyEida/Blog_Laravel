<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0 " href="{{ route('interface.index') }}" >
            <div id="colorlib-logo"><img src="{{ asset('images/laravel-512.png') }}" height="50" width="50" />
            <p  class="brand-home">{{ __('Blog Website') }} </p></div>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                @if(Auth::check())
                    <ul class="list-group">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="ni ni-tv-2 text-danger"></i> {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="ni ni-circle-08 text-danger"></i>  {{ __('User profile') }}
                            </a>
                        </li>

                        @if(Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="ni ni-key-25 text-success"></i>
                                <span class="nav-link-text" style="color: #f4645f;">{{ __('Admin Settings') }}</span>
                            </a>

                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a  class="nav-link"  href="{{ route("user.index")}}">
                                            <i class="ni ni-bullet-list-67 text-success"></i> {{ __('Users') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a   class="nav-link" href="{{ route("user.create")}}">
                                             <i class="ni ni-circle-08 text-success"></i> {{ __('Create New User') }}
                                        </a>

                                    </li>

                                    <li class="nav-item">
                                        <a   class="nav-link" href="{{ route("setting.index")}}">
                                             <i class="ni ni-settings text-success"></i> {{ __('Settings') }}
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        @endif



                    </ul>
                @endif

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">  <i class="ni ni-align-left-2"></i> &nbsp; BLog Setting</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">

                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("category.index")}}">
                        <i class="ni ni-collection text-primary"></i> {{ __('Categories') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("post.index")}}">
                          <i class="ni ni-collection text-primary"></i> {{ __('Posts') }}
                    </a>

                </li>

                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("tag.index")}}">
                        <i class="ni ni-collection text-primary"></i> {{ __('Tags') }}
                    </a>

                </li>


                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("category.create")}}">
                        <i class="ni ni-fat-add text-primary"></i> {{ __('Create New Category') }}
                    </a>

                </li>

                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("post.create")}}">
                         <i class="ni ni-fat-add text-primary"></i> {{ __('Create New Post') }}
                    </a>

                </li>

                <li class="nav-item">
                    <a   class="nav-link"  href="{{ route("tag.create")}}">
                        <i class="ni ni-fat-add text-primary"></i> {{ __('Create New Tag') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a   class="nav-link" href="{{ route("post.trashed")}}">
                        <i class="ni ni-basket text-primary"></i> {{ __('Post \' Trash') }}
                    </a>

                </li>


            </ul>
        </div>
    </div>
</nav>
