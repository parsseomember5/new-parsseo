<section class="hero-area-two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-11">
                <div class="hero-text">
                    <h1 class="title wow fadeInLeft" data-wow-delay="0.2s">
                        {{$heroSetting->hero_title}}
                    </h1>
                    <p class="wow fadeInLeft text-right" data-wow-delay="0.3s">
                        {{$heroSetting->hero_subtitle}}
                    </p>
                    <ul class="hero-btn">
                        <li class="wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{$heroSetting->hero_btn_link}}" class="main-btn" {{str_starts_with($heroSetting->hero_btn_link,'#') ? 'data-lity' : ''}}>{{$heroSetting->hero_btn_text}} <i class="far {{$heroSetting->hero_btn_icon}}"></i></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.5s">
                            <a href="{{$heroSetting->hero_play_video_link}}" class="video-btn" data-lity><i class="fas fa-play"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto wow fadeInRight" data-wow-delay="0.2s">
                <div class="hero-img text-lg-right">
                    <img src="{{$heroSetting->getHeroImage()}}" alt="Img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <div class="hero-shapes">
        <div class="hero-line-one">
            <img src="{{asset('assets/img/hero/hero-line-3.png')}}" alt="Line" loading="lazy">
        </div>
        <div class="hero-line-two">
            <img src="{{asset('assets/img/hero/hero-line-2.png')}}" alt="Line" loading="lazy">
        </div>
        <div class="dot-one"></div>
        <div class="dot-two"></div>
    </div>
</section>
