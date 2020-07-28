@include("layouts.header")


    <aside id="colorlib-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadcrumbs text-center">
                    <h2>{{$category->name}}</h2>
                    <p><span><a href="{{route("interface.index")}}">Home</a></span> / <span>{{$category->name}}</span></p>
                </div>
            </div>
        </div>
    </aside>

    <div id="colorlib-container">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row row-pb-md">
                        @foreach($categories as $post)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <div class="blog-img">
                                        <a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}"><img src="{{$post->featured}}" class="img-responsive" alt="html5 bootstrap template"></a>
                                    </div>
                                    <div class="desc">
                                        <p class="meta">
                                            <span class="cat"><a href="{{route("category",['category'=>$post->category->id])}}">{{$category->name}}</a></span>
                                            <span class="date">{{$post->created_at->toFormattedDateString()}}</span>
                                            <span class="pos">By <a href="#">{{$post->user->name}}</a></span>
                                        </p>
                                        <h2><a href="{{route("post.single",['id'=>$post->id,'slug'=>$post->slug])}}">{{$post->title}}</a></h2>
                                        <p>{{ str_limit($post->content, $limit = 150, $end = '...') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination">
                              {{$categories ->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include("layouts.footer")
