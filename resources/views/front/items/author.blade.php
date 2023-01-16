<div class="post-author">
    <div class="author-img">
        <img src="{{$author->getAvatar()}}" alt="{{$author->name}}" loading="lazy">
    </div>
    <div class="author-info">
        <h4 class="name">{{$author->name}}</h4>
        <p>{{$author->bio}}</p>
        <ul class="author-social-links mt-25">
        @if($author->instagram)
            <li><a href="{{$author->instagram}}"><i class="fab fa-instagram"></i></a></li>
        @endif
        @if($author->twitter)
            <li><a href="{{$author->twitter}}"><i class="fab fa-twitter"></i></a></li>
        @endif
        @if($author->dribbble)
            <li><a href="{{$author->dribbble}}"><i class="fab fa-dribbble"></i></a></li>
        @endif
        @if($author->facebook)
            <li><a href="{{$author->facebook}}"><i class="fab fa-facebook"></i></a></li>
        @endif
        @if($author->linkedin)
            <li><a href="{{$author->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
        @endif
        @if($author->telegram)
            <li><a href="{{$author->telegram}}"><i class="fab fa-telegram"></i></a></li>
        @endif
        </ul>
    </div>
</div>
