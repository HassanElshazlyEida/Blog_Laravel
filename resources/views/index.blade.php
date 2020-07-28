
@include("layouts.header")

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container">
			   			<div class="row">
				   			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
                                        @if(empty($first_post))
                                            <p class="meta">
                                                    <span class="cat">Events</a></span>
                                                    <span class="date">10 August 2020</span>
                                                    <span class="pos">By <a target='_blank'href="https://www.linkedin.com/in/hassanelshazlyeida/">Hassan Elshazly Eida</a></span>
                                            </p>
                                            <h1> Blog is a Laravel application and its highly flexible for modification.</h1>
                                        @else
                                            <p class="meta">
                                                <span class="cat">{{$first_post->title}}</a></span><br>
                                                <span class="date">{{$first_post->created_at->toFormattedDateString()}}</span>
                                            </p>
                                            <h1>{{ str_limit($first_post->content, $limit = 50, $end = '...') }}</h1>
                                        @endif
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

        <div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 content">
                        <div class="row row-pb-md">
                            @if($notfound)
                            <div class="card">
                                <div class="card-body" style="float:left">
                                  Not Found any posts
                                </div>
                                <div class="card-body"  style="float:right">
                                   <a href="{{route("interface.index")}}" class="btn btn-primary btn-subscribe">Back</a>
                                </div>
                              </div>
                            @endif
                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <div class="blog-img">
                                            <a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}"><img src="{{asset($post->featured)}}" class="img-responsive "  alt="html5 bootstrap template"></a>
                                        </div>
                                        <div class="desc">
                                            <p class="meta">
                                                <span class="cat"><a href="#">{{$post->category->name}}</a></span>
                                                <span class="date">{{$post->created_at->toFormattedDateString()}}</span>
                                                <span class="pos">By
                                                    <img src="@if(isset($post->user->profile->avatar)) {{asset("uploads/avatars/".$post->user->profile->avatar)}}@else {{asset("uploads/avatars/default.png")}} @endif" alt="{{$post->user->name}}"  style="border-radius:50%" width="30" height="30"  > {{$post->user->name}}
                                                </span>
                                            </p>
                                            <h2><a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title}}</a></h2>
                                            <p>{{ str_limit($post->content, $limit = 50, $end = '...') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination">
                                    {{$posts->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="side">
                                <div class="form-group">
                                    <form action="{{route('interface.index')}}" method="GET">
                                        <input type="text" class="form-control" name="search" placeholder="Search any post...">
                                        <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
                                    </form>

                                </div>
                            </div>
                            @if(!$categories->isEmpty())
                                <div class="side">
                                    <h2 class="sidebar-heading">Categories</h2>
                                    <p>
                                        <ul class="category">
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{route("category",['category'=>$category->id])}}"><i class="icon-check"></i>{{ $category->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </p>
                                </div>
                            @endif
                            <div class="side">
                                <h2 class="sidebar-heading">Recent Posts</h2>
                                <div class="instagram-entry">
                                    @foreach($recent_posts as $post)
                                        <div class="f-blog">
                                        <a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}" class="instagram-posts text-center blog-img img-thumbnail-recents" style="border-radius:4%;background-image: url({{asset($post->featured)}})">
                                        </a>
                                            <div class="desc">
                                                <h3><a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title}}</a></h3>
                                                <p class="admin"><span>{{$post->created_at->toFormattedDateString()}}</span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if(!$categories->isEmpty())
                            <div class="side">
                                <h2 class="sidebar-heading">Tags</h2>
                                <p>
                                    <ul class="category">
                                        @foreach($tags as $tag)
                                            <li>
                                                <a href="{{route("tag",['tag'=>$tag->id])}}"><i class="icon-check"></i>{{ $tag->tag}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


@include('layouts.footer')
