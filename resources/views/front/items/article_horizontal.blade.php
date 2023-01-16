<div class="post-nav-item prev-post">
    <div class="thumb">
        <img src="{{$post->getImage('thumb')}}" alt="{{$post->title}}" loading="lazy">
        <i class="far {{$icon}}"></i>
    </div>
    <div class="content">
        <a href="{{route('post.show',$post)}}">{{$post->title}}</a>
        <span><i class="far fa-calendar-alt"></i> {{verta($post->created_at)->format('%d %B، %Y')}}</span>
    </div>
</div>
