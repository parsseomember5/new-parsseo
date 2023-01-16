<section class="about-section-two dir-ltr">
    <div class="about-text-area">
        <div class="container ">
            <div class="row justify-content-xl-start">
                <div class="col-xl-5 col-lg-7 col-md-8 order-xl-2">
                    <div class="about-text text-right dir-rtl">
                        <div class="common-heading mb-30">
								<span class="tagline">
									<span class="float-right"><i class="fas fa-plus"></i> {{$aboutSetting->about2_uptitle}}</span>
									<span class="heading-shadow-text">{{$aboutSetting->about2_uptitle}}</span>
								</span>
                            <h2 class="title text-right">{{$aboutSetting->about2_title}}</h2>
                        </div>
                        <p>{{$aboutSetting->about2_text}}</p>
                        <ul class="check-list mt-30 text-right">
                            <li>
                                <h5 class="title">{{$aboutSetting->about2_item1_title}}</h5>
                                <p>{{$aboutSetting->about2_item1_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about2_item2_title}}</h5>
                                <p>{{$aboutSetting->about2_item2_text}}</p>
                            </li>
                            <li>
                                <h5 class="title">{{$aboutSetting->about2_item3_title}}</h5>
                                <p>{{$aboutSetting->about2_item3_text}}</p>
                            </li>
                        </ul>
                        <a href="{{$aboutSetting->about2_btn_link}}" {{str_starts_with($aboutSetting->about2_btn_link,'#') ? 'data-lity' : ''}} class="main-btn btn-dark  mt-40">{{$aboutSetting->about2_btn_text}} <i class="far {{$aboutSetting->about2_btn_icon}}"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 order-xl-1 wow fadeInUp">
                    <div class="about-curved-img">
                        <img src="{{$aboutSetting->getImage2()}}" alt="Image" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
