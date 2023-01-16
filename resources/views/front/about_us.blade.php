@extends('front.layouts.master',['headerClass' => '', 'h1Title' => $landing->page_title, 'title' => $landing->title])
@section('content')

    <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h2 class="page-title">{{$landing->page_title}}</h2>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== About Section Start ======-->
    <section class="about-section-three section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9 col-sm-10">
                    <div class="about-text mb-lg-50">
                        <div class="common-heading mb-30">
							<span class="tagline">
								<i class="fas fa-plus"></i> {{$landing->uptitle}}
								<span class="heading-shadow-text">{{$landing->uptitle}}</span>
							</span>
                            <h2 class="title text-right">{{$landing->title}}</h2>
                        </div>
                        <p>{{$landing->description}}</p>
                        <ul class="check-list mt-30">
                            @foreach($landing->getItems() as $item)
                            <li class="wow fadeInUp" data-wow-delay="0s">
                                <h5 class="title">{{$item}}</h5>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="about-gallery wow fadeInRight">
                        <div class="img-one">
                            <img src="{{$landing->getImage()}}" alt="Image">
                        </div>
                        <div class="pattern">
                            <img src="{{asset('assets/img/about/about-gallery-pattern.png')}}" alt="Pattern">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== About Section End ======-->

    <!--====== Feature Section Start ======-->
    <section class="feature-section primary-soft-bg section-gap">
        <div class="container">
            <div class="common-heading text-center mb-30">
				<span class="tagline">
					<i class="fas fa-plus"></i> {{$landing->features_uptitle}}
					<span class="heading-shadow-text">{{$landing->features_uptitle}}</span>
				</span>
                <h2 class="title">{{$landing->features_title}}</h2>
            </div>

            <div class="row icon-boxes justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon-box mt-30">
                        <div class="icon">
                            <i class="{{$landing->features_box1_icon}}"></i>
                        </div>
                        <h5 class="title text-center">{{$landing->features_box1_title}}</h5>
                        <p class="text-center">{{$landing->features_box1_text}}</p>
                        <span class="box-index">1</span>

                        <div class="box-img">
                            <img src="{{asset('assets/img/about/about-one.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon-box mt-30">
                        <div class="icon">
                            <i class="{{$landing->features_box2_icon}}"></i>
                        </div>
                        <h5 class="title text-center">{{$landing->features_box2_title}}</h5>
                        <p class="text-center">{{$landing->features_box2_text}}</p>
                        <span class="box-index">2</span>

                        <div class="box-img">
                            <img src="{{asset('assets/img/about/about-gallery-2.jpg')}}" alt="image">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon-box mt-30">
                        <div class="icon">
                            <i class="{{$landing->features_box3_icon}}"></i>
                        </div>
                        <h5 class="title text-center">{{$landing->features_box3_title}}</h5>
                        <p class="text-center">{{$landing->features_box3_text}}</p>
                        <span class="box-index">3</span>

                        <div class="box-img">
                            <img src="{{asset('assets/img/about/about-gallery-1.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Feature Section End ======-->

    <!--====== Team section Start ======-->
    <section class="team-slider-area">
        <div class="container mb-20">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="common-heading text-center mb-40">
						<span class="tagline text-center">
							<span class=""><i class="fas fa-plus"></i> {{$landing->team_uptitle}}</span>
							<span class="heading-shadow-text">{{$landing->team_uptitle}}</span>
						</span>
                        <h2 class="title text-center">{{$landing->team_title}}</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid fluid-extra-padding">
            <div class="row team-members team-slider">
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/01.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">آلن</a></h5>
                            <span class="title">مدیر عامل</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/02.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">استیون</a></h5>
                            <span class="title">مدیر</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/03.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">استالین</a></h5>
                            <span class="title">دیجیتال مارکتر</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/04.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">استیون</a></h5>
                            <span class="title">طراح وب</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/05.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">ریچارد</a></h5>
                            <span class="title">طراح وب</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/06.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">جیمز</a></h5>
                            <span class="title">مدیر</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/07.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">تونی</a></h5>
                            <span class="title">توسعه دهنده</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/08.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">برنارد</a></h5>
                            <span class="title">برنامه نویس</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="member-box">
                        <div class="member-photo">
                            <img src="assets/img/team/09.jpg" alt="Member">
                        </div>
                        <div class="member-info">
                            <h5 class="name text-center"><a href="company-overview.html">رونالد</a></h5>
                            <span class="title">طراح وب</span>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Team section End ======-->

    <!--====== Testimonials Start ======-->
    <section class="testimonials-section section-gap">
        <div class="container">
            <div class="common-heading text-center mb-30">
				<span class="tagline">
					<i class="fas fa-plus"></i> {{$landing->feedback_uptitle}}
					<span class="heading-shadow-text">{{$landing->feedback_uptitle}} </span>
				</span>
                <h2 class="title">{{$landing->feedback_title}}</h2>
            </div>

            <div class="row justify-content-center testimonial-boxes square-shape-two">
                @foreach(App\Models\Feedback::where('locale',app()->getLocale())->latest()->take(6)->get() as $feedback)
                <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="0.2s">
                    @include('front.items.feedback_square',$feedback)
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Testimonials End ======-->

    <!--====== Partners Section With CTA Start ======-->
    <section class="partners-section">
        <div class="container">
            <div class="partners-logos partners-section-padding section-border-top">
                <div class="row partners-logos-two">
                    @foreach(\App\Models\Logo::latest()->get() as $logo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        @include('front.items.logo',$logo)
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--====== Partners Section With CTA End ======-->
@endsection
