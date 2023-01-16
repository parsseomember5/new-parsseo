<div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0s">
    <div class="event-thumb">
        <img src="{{$article->getImage('square_thumb')}}" alt="{{$article->title}}" loading="lazy">
    </div>
    <div class="event-content">
        <ul class="meta">
            <li>
                @foreach($article->categories as $cat)
                <a href="{{route('post_category.show',$cat)}}" class="category">{{$cat->title}}</a>
                @endforeach
            </li>
            <li>
                <a href="#" class="date"><i class="fal fa-calendar-alt"></i>{{verta($article->created_at)->format('%d %B، %Y')}}</a>
            </li>
        </ul>
        <h4 class="event-title"><a href="{{route('post.show',$article)}}">{{$article->title}}</a></h4>
        <p>{{$article->excerpt}}</p>
    </div>
    <div class="event-button">
        <a href="{{route('post.show',$article)}}" class="main-btn bordered-btn">ادامه مطلب <i class="far fa-arrow-left"></i></a>
    </div>
</div>
