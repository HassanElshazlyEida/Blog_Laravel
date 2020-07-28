<footer id="colorlib-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3">
                <h2>Settings</h2>
                <p>
                    <ul class="colorlib-footer-links">
                        <li><a href="{{route("interface.index")}}"><i class="icon-check"></i> Home</a></li>
                        <li><a href="{{route("home")}}"><i class="icon-check"></i> Dashboard</a></li>
                        Contact Number:<li><a href="tell:{{$Settings->contact_number ?? ''}}"><i class="icon-check"></i> {{$Settings->contact_number ?? ''}}</a></li>
                        Contact Email:<li><a href="mailto:{{$Settings->contact_email ?? ''}}"><i class="icon-check"></i> {{$Settings->contact_email ?? ''}}</a></li>
                        Address:<li><i class="icon-check"></i> {{$Settings->address ?? '' }}</li>

                    </ul>
                </p>
            </div>
                <div class="col-md-3">
                    <div class="side">
                        <h2 class="sidebar-heading">Recent Posts</h2>
                        <div class="instagram-entry">
                            @if(isset($recent_posts))
                                @foreach($recent_posts as $post)
                                    <div class="f-blog">
                                    <a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}" class="instagram-posts text-center blog-img img-thumbnail-recents" style="border-radius:4%;background-image: url({{asset($post->featured)}})">
                                    </a>
                                        <div class="desc">
                                            <h3><a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title ?? ''}}</a></h3>
                                            <p class="admin"><span>{{$post->created_at->toFormattedDateString()}}</span></p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                <h2>Categories</h2>
                <p>
                    <ul class="colorlib-footer-links">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route("category",['category'=>$category->id])}}"><i class="icon-check"></i>{{ $category->name ?? ''}}</a>
                            </li>
                        @endforeach
                    @endif
                    </ul>
                </p>
            </div>
                <div class="col-md-3">
                    <h2>Tags</h2>
                    <p class="tags">
                        @if(isset($tags))
                            @foreach($tags as $tag)
                                <span><a href="{{route("tag",['tag'=>$tag->id])}}"><i class="icon-tag"></i> {{$tag->tag ?? ''}}</a></span>
                            @endforeach
                        @endif
                    </p>
                </div>
        </div>
    </div>
</footer>
</div>

<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>
	<!-- jQuery -->
	<script src="{{asset("js/jquery.min.js")}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset("js/jquery.easing.1.3.js")}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset("js/bootstrap.min.js")}}"></script>
	<!-- Waypoints -->
	<script src="{{asset("js/jquery.waypoints.min.js")}}"></script>
	<!-- Flexslider -->
	<script src="{{asset("js/jquery.flexslider-min.js")}}"></script>
	<!-- Owl carousel -->
	<script src="{{asset("js/owl.carousel.min.js")}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
	<script src="{{asset("js/magnific-popup-options.js")}}"></script>
	<!-- Main -->
	<script src="{{asset("js/main.js")}}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f1eab8e3113dbe2"></script>

    <!-- JS, Popper.js, and jQuery -->
	</body>
</html>

