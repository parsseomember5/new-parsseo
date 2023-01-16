@extends('front.layouts.master',['headerClass' => '', 'h1Title' => $page->title,
'description' => $page->meta_description, 'canonical' =>  $page->canonical , 'title' => $page->title])
@section('content')
    <!--====== Page Title Start ======-->
    <section class="page-title-area" style="background-image: url({{$page->getImage()}})">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h2 class="page-title">{{$page->title}}</h2>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                        <li>{{$page->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Contact Section Start ======-->
    <section class="contact-section pb-5 mb-5 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-post-details">
                        <div class="post-content">
                            {!! $page->body !!}
                            <div class="post-footer mt-40">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="social-share">
                                            <span>اشتراک: </span>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('page.show',$page)}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="http://twitter.com/share?text={{$page->title}}&url={{route('page.show',$page)}}"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/?url={{route('page.show',$page)}}"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Section End ======-->
@endsection
