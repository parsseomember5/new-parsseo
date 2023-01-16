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

    <!--====== Contact Section Start ======-->
    <section class="contact-section section-gap-extra-bottom">
        <div class="container">
            <!-- Contact Info Start -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lx-4 col-lg-5 col-sm-10">
                    <div class="contact-info-text mb-md-70">
                        <div class="common-heading mb-30">
                            <span class="tagline">
                                <i class="fas fa-plus"></i> {{$landing->uptitle}}
                                <span class="heading-shadow-text">{{$landing->uptitle}}</span>
                            </span>
                            <h2 class="title text-right">{{$landing->title}}</h2>
                        </div>
                        <p>{{$landing->description}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 offset-xl-1">
                    <div class="contact-info-boxes">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-6 col-sm-10">
                                <div class="info-box text-center wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon">
                                        <i class="flaticon-place"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-center">آدرس ما</h5>
                                        <p>
                                            {{$landing->address}}
                                        </p>
                                    </div>
                                </div>
                                <div class="info-box text-center mt-30 mb-sm-30 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="icon">
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-center">ایمیل</h5>
                                        <p>
                                            <a href="mailto:{{$landing->email}}">{{$landing->email}}</a> <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-10">
                                <div class="info-box text-center wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="icon">
                                        <i class="flaticon-phone-call-1"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-center">پشتیبانی</h5>
                                        <p>
                                            {{$landing->support}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Info End -->
            <div class="contact-from-area">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="contact-maps">{!! $landing->map !!}</div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form mr-lg-4 mt-4 mt-lg-0">
                            <form action="{{route('contact_form')}}" method="post">
                                @csrf
                                <h3 class="form-title">{{$landing->form_title}}</h3>
                                <div class="form-description">{{$landing->form_description}}</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-field mb-25">
                                            <label for="name">نام</label>
                                            <input type="text" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-field mb-25">
                                            <label for="phone-number">شماره تماس</label>
                                            <input type="text" name="phone" id="phone-number" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-field mb-30">
                                            <label for="message">توضیحات (اختیاری)</label>
                                            <textarea id="message" name="message" placeholder="سلام ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-field">
                                            <button class="main-btn" type="submit">ثبت درخواست <i class="far fa-arrow-left"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Section End ======-->

@endsection
