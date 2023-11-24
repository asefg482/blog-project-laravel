<article class="entry">
    <div class="entry-img">
        <img src="{{route('file-manager.show',$blog->image)}}" alt="" class="img-fluid">
    </div>

    <h2 class="entry-title">
        <a href="{{route('single',$blog->slug)}}">
            {{$blog->title}}
        </a>
    </h2>


    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                <a href="blog-single.html">{{$blog->user->name}}</a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                <a href="blog-single.html">
                    <time datetime="{{$blog->updated_at}}">{{$blog->updated_at}}</time>
                </a></li>
            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                <a href="blog-single.html">12 Comments</a></li>
        </ul>
    </div>

    <div class="entry-content">
        <p>
            {{$blog->short_description}}
        </p>
        <div class="read-more">
            <a href="{{route('single',$blog->slug)}}">Read More</a>
        </div>
    </div>

</article><!-- End blog entry -->
