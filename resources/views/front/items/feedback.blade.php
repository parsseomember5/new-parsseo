<div class="testimonial-box-two mt-30 wow fadeInUp" data-wow-delay="0s">
    <div class="author-img">
        <img src="{{$feedback->getImage()}}" alt="{{$feedback->name}}" loading="lazy">
    </div>
    <div>
        <p class="testimonial-desc">
            {{$feedback->text}}
        </p>
        <div class="author-info">
            <h5 class="name">{{$feedback->name}}</h5>
            <p class="position">{{$feedback->title}}</p>
        </div>
    </div>
    <div class="rating-wrap">
        <ul>
            @for ($i = 0; $i < intval($feedback->stars); $i++)
                <li><i class="fas fa-star"></i></li>
            @endfor
            @php $remaining = 5 - intval($feedback->stars);@endphp
            @for ($i = 0; $i < $remaining; $i++)
                <li><i class="far fa-star"></i></li>
            @endfor
        </ul>
    </div>
</div>
