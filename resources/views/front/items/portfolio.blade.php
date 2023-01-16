<div class="project-item mt-30">
    <div class="thumb" style="background-image: url({{$portfolio->getImage('medium')}});"></div>
    <div class="content">
        <div class="cats">
            @if($portfolio->categories->count() > 0)
            <a href="{{route('portfolio_category.show',$portfolio->categories->first())}}">{{$portfolio->categories->first()->title}}</a>
            @endif
        </div>
        <div class="author">
            <a href="{{route('portfolio.show',$portfolio)}}">{{$portfolio->title}}</a>
        </div>
        <p class="title">
            {{$portfolio->short_description}}
        </p>
        <div class="text-center">
            <a href="{{route('portfolio.show',$portfolio)}}" class="main-btn bordered-btn portfolio-btn mt-md-30"><span class="me-2">مشاهده جزئیات</span><i class="fa fa-long-arrow-left"></i></a>
        </div>
    </div>
</div>
