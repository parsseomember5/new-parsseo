<section class="about-section-two">
    <div class="about-text-area">
        <div class="container">
            <div class="row justify-content-xl-start">
                <div class="col-xl-5 col-lg-7 col-md-8 order-xl-2">
                    <div class="about-text text-right">
                        <div class="common-heading mb-30">
								<span class="tagline">
									<span class="float-right"><i class="fas fa-plus"></i> {{$aboutSetting->about3_uptitle}}</span>
									<span class="heading-shadow-text">{{$aboutSetting->about3_uptitle}}</span>
								</span>
                            <h2 class="title text-right">{{$aboutSetting->about3_title}}</h2>
                        </div>
                        <p>{{$aboutSetting->about3_text}}</p>
                        <ul class="check-list mt-30 text-right">
                            <li>
                                <h5 class="title">{{$aboutSetting->about3_item1_title}}</h5>
                                <p>{{$aboutSetting->about3_item1_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about3_item2_title}}</h5>
                                <p>{{$aboutSetting->about3_item2_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about3_item3_title}}</h5>
                                <p>{{$aboutSetting->about3_item3_text}}</p>
                            </li>
                        </ul>
                        <a href="{{$aboutSetting->about3_btn_link}}" {{str_starts_with($aboutSetting->about3_btn_link,'#') ? 'data-lity' : ''}} class="main-btn btn-dark  mt-40">{{$aboutSetting->about3_btn_text}} <i class="far {{$aboutSetting->about3_btn_icon}}"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 order-xl-1 wow fadeInUp">
                    <div class="about-curved-img">
                        <img src="{{$aboutSetting->getImage3()}}" alt="Image" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
