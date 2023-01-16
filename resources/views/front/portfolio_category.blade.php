@extends('front.layouts.master',['headerClass' => '','h1Title' => $category->title,
'description' => $category->meta_description, 'canonical' =>  $category->canonical , 'title' => $category->title])
@section('content')
    <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h2 class="page-title">{{$category->title}}</h2>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                        <li><a href="{{route('portfolios')}}">نمونه‌کار ها</a></li>
                        <li><a href="{{route('portfolio_category.show',$category)}}">{{$category->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Project Area Start ======-->
    <section class="project-section section-gap-extra-bottom primary-soft-bg">
        <div class="container">
            <div class="row justify-content-center project-items project-style-two">
                @foreach($portfolios as $portfolio)
                <div class="col-xl-10">
                    @include('front.items.portfolio_horizontal',$portfolio)
                </div>
                @endforeach
                <div class="col-12">
                    {{$portfolios->links('front.includes.paginator')}}
                </div>
            </div>
        </div>
    </section>
    <!--====== Project Area End ======-->
@endsection
