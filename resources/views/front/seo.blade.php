@extends('front.layouts.master',['headerClass' => 'shadow-header', 'h1Title' => $landing->h1_hidden, 'title' => $landing->title,
'navTitle' => $landing->nav_title])
@section('content')


    <!--====== About Section Start ======-->
    <section class="about-section-four landing-cta-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="about-img mb-md-70">
                        <img src="{{$landing->getCtaImage()}}" alt="{{$landing->h1_hidden}}" class="w-100">
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="about-text">
                        <div class="common-heading mb-30">
							<span class="tagline">
								<i class="fas fa-plus"></i> {{$landing->cta_uptitle}}
								<span class="heading-shadow-text"> {{$landing->cta_uptitle}}</span>
							</span>
                            <h2 class="title text-right">{{$landing->cta_title}}</h2>
                        </div>
                        <p class="mb-20">{{$landing->cta_text}}</p>
                        <a href="{{$landing->cta_btn1_link}}" class="main-btn mt-40 ml-3" {{str_starts_with($landing->cta_btn1_link,'#') ? 'data-lity' : ''}}> {{$landing->cta_btn1_text}} <i class="far {{$landing->cta_btn1_icon}}"></i> </a>
                        <a href="{{$landing->cta_btn2_link}}" class="main-btn btn-dark mt-40" {{str_starts_with($landing->cta_btn2_link,'#') ? 'data-lity' : ''}}> {{$landing->cta_btn2_text}} <i class="far {{$landing->cta_btn2_icon}}"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== About Section End ======-->

    <!--====== Categories Section Start ======-->
    <section class="categories-with-video">
        <div class="categories-area custom-categories-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-right">
                            <div class="common-heading text-center mb-30">
                                <h5 class="title text-right mt-0 font-30">{{$landing->faq_title}}</h5>
                            </div>
                        </div>
                        <div class="accordion accordion-landing" id="accordionFaq">
                            @if($landing->faq)
                                @foreach($landing->faq as $key => $item)
                                <div class="accordion-item">
                                <h5 class="accordion-title" data-toggle="collapse" aria-expanded="{{$loop->first ? 'true' :'false'}}" data-target="#accordion-{{$key}}">
                                    {{$item[0]}}
                                </h5>
                                <div id="accordion-{{$key}}" class="collapse {{$loop->first ? 'show' :''}}" data-parent="#accordionFaq">
                                    <div class="accordion-content">{{$item[1]}}</div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="custom-video">
                            <video controls poster="{{$landing->getVideoPoster()}}">
                                <source src="{{$landing->getVideo()}}" type="video/webm" />
                                <source src="{{$landing->getVideo()}}" type="video/mp4" />
                                <p>
                                    Your browser doesn't support HTML video. Here is a
                                    <a href="{{$landing->getVideo()}}">link to the video</a> instead.
                                </p>
                            </video>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!--====== Categories Section End ======-->

    <!--====== Latest News Start ======-->
    <section class="latest-blog-section section-gap-extra-bottom">
        <div class="container">
            <details open>
                <summary class="summary">{{$landing->summary}}</summary>
                <div class="post-content">
                    {!! $landing->details !!}
                </div>
                <a href="{{$landing->article_btn_text}}" class="main-btn btn-dark mt-30" {{str_starts_with($landing->article_btn_text,'#') ? 'data-lity' : ''}}> {{$landing->article_btn_text}} <i class="far {{$landing->article_btn_icon}}"></i> </a>
            </details>

        </div>
    </section>
    <!--====== Latest News End ======-->
@endsection
