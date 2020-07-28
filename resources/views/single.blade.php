@include("layouts.header")

		<aside id="colorlib-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12 breadcrumbs text-center">
						<h2>{{$post->title}}</h2>
						<p><span><a href="{{route("interface.index")}}">Home</a></span> / <span><a href="{{route("category",['category'=>$post->category->id])}}">{{$post->category->name}} </a></span> / <span>{{$post->title}}</span></p>
					</div>
				</div>
			</div>
		</aside>

		<div id="colorlib-container">
			<div class="container">
				<div class="row">
					<div class="col-md-9 content">
						<div class="row row-pb-lg">
							<div class="col-md-12">
								<div class="blog-entry">
									<div class="blog-img blog-detail" style="height: 400px !important" height="400">
										<img src="{{$post->featured}}" class="img-responsive"  alt="html5 bootstrap template">
									</div>
									<div class="desc">
										<p class="meta">
											<span class="cat"><a href="{{route("category",['category'=>$post->category->id])}}">{{$post->category->name}}</a></span>
                                            <span class="date">{{$post->created_at->toFormattedDateString()}}</span>
                                            <span class="pos">
                                                By
                                                <a href="#">
                                                    <img src="@if(isset($post->user->profile->avatar)) {{asset("uploads/avatars/".$post->user->profile->avatar)}}@else {{asset("uploads/avatars/default.png")}} @endif" alt="{{$post->user->name}}" class="img-thumbnail" style="border-radius:50%" height="50" width="50" > {{$post->user->name}}
                                                </a>
                                            </span>
                                        </p>
               <div class="addthis_inline_share_toolbox"></div>
										<blockquote>
                                            {{ str_limit($post->content, $limit = 400, $end = '...') }}
										</blockquote>
										</div>
								</div>
							</div>
                        </div>

                    @include("admin.include.disqus")
					</div>
					<div class="col-md-3">
						<div class="sidebar">
							<div class="side">
								<h2 class="sidebar-heading">Tags</h2>
								<p>
									<ul class="category">
                                        @foreach($post->tags as $tag)
                                            <li><a href="{{route("tag",['tag'=>$tag->id])}}"><i class="icon-check"></i> {{$tag->tag}}</a></li>
                                        @endforeach
									</ul>
                                </p>



                            </div>
                            <div class="side">
								<h2 class="sidebar-heading">Belong To</h2>
								<p>
									<ul class="category">
                                        <li><a href="{{route("category",['category'=>$post->category->id])}}"><i class="icon-check"></i> {{$post->category->name}}</a></li>
									</ul>
								</p>
							</div>
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
						</div>
					</div>
				</div>
			</div>
		</div>

@include("layouts.footer")
