<div class="project-item mb-30">
    <div class="thumb" style="background-image: url({{$portfolio->getImage('medium')}});"></div>
    <div class="content">
        <div class="cats">
            @if($portfolio->categories->count() > 0)
            @foreach($portfolio->categories as $cat)
            <a href="{{route('portfolio_category.show',$cat)}}">{{$cat->title}}</a>
            @endforeach
            @endif
        </div>

        <h5 class="title">
            <a href="{{route('portfolio.show',$portfolio)}}">{{$portfolio->title}}</a>
        </h5>

        <p>{{$portfolio->short_description}}</p>

        <a href="{{route('portfolio.show',$portfolio)}}" class="main-btn bordered-btn mt-30"><span class="me-2">مشاهده جزئیات</span><i class="fa fa-long-arrow-left"></i></a>

    </div>
</div>
