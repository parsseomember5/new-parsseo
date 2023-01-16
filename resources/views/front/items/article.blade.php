<div class="latest-post-box mt-30">
    <div class="post-thumb">
        <img src="{{$article->getImage('medium')}}" alt="{{$article->title}}" loading="lazy">
    </div>
    <div class="post-content">
        <div class="d-flex align-items-center">
            <span class="post-date"><i class="far fa-calendar-alt ml-1"></i> {{verta($article->created_at)->format('%d %B، %Y')}}</span>
            <?php $viewCount = views($article)->count();?>
            @if($viewCount > 0)
            <span class="post-date mr-3"><i class="far fa-eye ml-1"></i> {{$viewCount . ' بازدید'}}</span>
            @endif
        </div>

        <h6 class="title">
            <a href="{{route('post.show',$article)}}">{{$article->title}}</a>
        </h6>
        <a href="{{route('post.show',$article)}}" class="post-link">بیشتر بخوانید <i class="far fa-arrow-left"></i></a>
    </div>
</div>
