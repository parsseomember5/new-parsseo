<section class="about-section-two">
    <div class="about-form-area">
        <div class="container">
            <div class="about-donation-form">
                <div class="donation-heading">
                    <h3 class="title">{{$heroSetting->hero_box_title}}</h3>
                    <span class="shadow-text">{{$heroSetting->hero_box_title}}</span>
                </div>
                <form action="#">
                    <div class="form-wrap">
                        <h5>
                            {{$heroSetting->hero_box_text}}
                        </h5>
                        <a href="{{$heroSetting->hero_box_btn_link}}" {{str_starts_with($heroSetting->hero_box_btn_link,'#') ? 'data-lity' : ''}} class="main-btn btn-white">{{$heroSetting->hero_box_btn_text}} <i class="far {{$heroSetting->hero_box_btn_icon}}"></i></a>
                    </div>
                </form>
            </div>
            @if($aboutSetting->about_video_link)
            <div class="about-video wow fadeInDown" data-wow-delay="0.2s" style="background-image: url({{$aboutSetting->getVideoImage()}})">
                <a href="{{$aboutSetting->about_video_link}}" class="video-btn" data-lity><i class="fas fa-play"></i></a>
            </div>
            @endif
        </div>
    </div>
    <div class="about-text-area">
        <div class="container">
            <div class="row justify-content-xl-start">
                <div class="col-xl-5 col-lg-7 col-md-8 order-xl-2">
                    <div class="about-text text-right">
                        <div class="common-heading mb-30">
								<span class="tagline">
									<span class="float-right"><i class="fas fa-plus"></i> {{$aboutSetting->about_uptitle}}</span>
									<span class="heading-shadow-text">{{$aboutSetting->about_uptitle}}</span>
								</span>
                            <h2 class="title text-right">{{$aboutSetting->about_title}}</h2>
                        </div>
                        <p>{{$aboutSetting->about_text}}</p>
                        <ul class="check-list mt-30 text-right">
                            <li>
                                <h5 class="title">{{$aboutSetting->about_item1_title}}</h5>
                                <p>{{$aboutSetting->about_item1_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about_item2_title}}</h5>
                                <p>{{$aboutSetting->about_item2_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about_item3_title}}</h5>
                                <p>{{$aboutSetting->about_item3_text}}</p>
                            </li>
                        </ul>
                        <a href="{{$aboutSetting->about_btn_link}}" {{str_starts_with($aboutSetting->about_btn_link,'#') ? 'data-lity' : ''}} class="main-btn btn-dark  mt-40">{{$aboutSetting->about_btn_text}} <i class="far {{$aboutSetting->about_btn_icon}}"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 order-xl-1 wow fadeInUp">
                    <div class="about-curved-img">
                        <img src="{{$aboutSetting->getImage()}}" alt="Image" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-shape">
        <img src="{{asset('assets/img/about/about-shape.png')}}" alt="Shape" loading="lazy">
    </div>
</section>
