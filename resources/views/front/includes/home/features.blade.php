<section class="feature-section feature-section-one section-gap">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-10">
                <div class="feature-content mb-md-50">
                    <div class="common-heading mb-45">
							<span class="tagline">
								<i class="fas fa-plus"></i> {{$featuresSetting->features_uptitle}}
								<span class="heading-shadow-text">{{$featuresSetting->features_uptitle}}</span>
							</span>
                        <h2 class="title text-right">{{$featuresSetting->features_title}}</h2>
                        <p class="mt-4">{{$featuresSetting->features_text}}</p>
                    </div>
                    <!-- Fancy Icon List -->
{{--                    <div class="fancy-icon-list">--}}
{{--                        <div class="fancy-list-item">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="{{$featuresSetting->features_item1_icon}}"></i>--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <h4 class="title">{{$featuresSetting->features_item1_title}}</h4>--}}
{{--                                <p>{{$featuresSetting->features_item1_text}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="fancy-list-item">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="{{$featuresSetting->features_item2_icon}}"></i>--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <h4 class="title">{{$featuresSetting->features_item2_title}}</h4>--}}
{{--                                <p>{{$featuresSetting->features_item2_text}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="fancy-list-item">--}}
{{--                            <div class="icon">--}}
{{--                                <i class="{{$featuresSetting->features_item3_icon}}"></i>--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <h4 class="title">{{$featuresSetting->features_item3_title}}</h4>--}}
{{--                                <p>{{$featuresSetting->features_item3_text}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="funden-video with-video-shape {{$featuresSetting->features_video_link ? '' : 'hide-before'}}">
                    <img src="{{$featuresSetting->getVideoImage()}}" alt="Image" loading="lazy">
                    @if($featuresSetting->features_video_link)
                    <a  href="{{$featuresSetting->features_video_link}}" class="video-popup" data-lity><i class="fas fa-play"></i></a>
                    <img src="{{asset('assets/img/video/video-shape.png')}}" alt="Image" class="video-shape" loading="lazy">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
