@extends('front.layouts.master',['headerClass' => 'shadow-header', 'h1Title' => $portfolio->title,
'description' => $portfolio->meta_description, 'canonical' =>  $portfolio->canonical , 'title' => $portfolio->title])
@section('content')

    <!--====== Page Title Start ======-->
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3">
                            @if($portfolio->categories->count() > 0)
                                <li class="breadcrumb-item"><a href="{{route('post_category.show',$portfolio->categories->first())}}">{{$portfolio->categories->first()->title}}</a></li>
                            @endif
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                        </ol>
                    </nav>
                    <div class="portfolio-title">
                        <h2 class="page-title ml-2">{{$portfolio->title}}</h2>

                        @if($portfolio->categories->count() > 0)
                            @foreach($portfolio->categories as $cat)
                            <a href="{{route('portfolio_category.show',$cat)}}" class="project-summery-category mr-0">{{$cat->title}}</a>
                                @if(!$loop->last)<span class="mx-1">,</span>@endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Project Details Area Start ======-->
    <section class="project-details-area section-gap-extra-bottom pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="project-thumb mb-md-50">
                        <img src="{{$portfolio->getImage()}}" alt="{{$portfolio->title}}">
                        <img src="{{$portfolio->getScrollImage()}}" alt="{{$portfolio->title}}" class="mt-4">
                    </div>
                    <div class="description-content mt-4">
                        {!! $portfolio->body !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-summery sticky-top top-100">

                        <h3 class="project-title">{{$portfolio->name}}</h3>

                        <p>{{$portfolio->short_description}}</p>

                        {{-- boxes --}}
                        <div class="project-funding-info">
                            @if($portfolio->box1_title)
                            <div class="info-box">
                                <span>{{$portfolio->box1_value}}</span>
                                <span class="info-title">{{$portfolio->box1_title}}</span>
                            </div>
                            @endif
                            @if($portfolio->box2_title)
                                <div class="info-box">
                                    <span>{{$portfolio->box2_value}}</span>
                                    <span class="info-title">{{$portfolio->box2_title}}</span>
                                </div>
                            @endif
                            @if($portfolio->box3_title)
                                <div class="info-box">
                                    <span>{{$portfolio->box3_value}}</span>
                                    <span class="info-title">{{$portfolio->box3_title}}</span>
                                </div>
                            @endif
                        </div>

                        {{-- features --}}
                        <ul class="check-list portfolios-check-list mt-30 text-right">
                            @foreach($portfolio->getFeatures() as $text)
                                <li><p class="title">{{$text}}</p></li>
                            @endforeach
                        </ul>

                        <a href="{{$portfolio->website}}" target="_blank" class="main-btn btn-dark mt-30">لینک وب سایت <i class="far fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Project Details Area End ======-->
@endsection
