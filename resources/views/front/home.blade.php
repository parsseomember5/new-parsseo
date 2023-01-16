<?php
$locale = app()->getLocale();
$generalSetting = \App\Models\GeneralSetting::where('locale',$locale)->first();
$heroSetting = \App\Models\HeroSetting::where('locale',$locale)->first();
$aboutSetting = \App\Models\AboutSetting::where('locale',$locale)->first();
$portfoliosSetting = \App\Models\PortfoliosSetting::where('locale',$locale)->first();
$featuresSetting = \App\Models\FeaturesSetting::where('locale',$locale)->first();
$countersSetting = \App\Models\CounterBoxSetting::where('locale',$locale)->first();
$feedbacksSetting = \App\Models\FeedbacksSetting::where('locale',$locale)->first();
$eventsSetting = \App\Models\EventsSetting::where('locale',$locale)->first();
$articlesSetting = \App\Models\ArticleSetting::where('locale',$locale)->first();
?>
@extends('front.layouts.master',['headerClass' => 'transparent-header topbar-transparent',
 'h1Title' => $generalSetting->home_h1, 'title' => $generalSetting->home_title ,
 'canonical' => $generalSetting->home_canonical , 'description' => $generalSetting->home_meta_description])

@section('content')
    <!--====== Hero Area Start ======-->
    @include('front.includes.home.hero')
    <!--====== Hero Area End ======-->

    <!--====== About Section Start ======-->
    @include('front.includes.home.about')
    @include('front.includes.home.about_2')
    @include('front.includes.home.about_3')
    <!--====== About Section End ======-->

    <!--====== Project Section Start ======-->
    @include('front.includes.home.portfolios')
    <!--====== Project Section End ======-->

    <!--====== Feature Section Start ======-->
    @include('front.includes.home.features')
    <!--====== Feature Section End ======-->

    <!--====== Counter With Image Text Block Start ======-->
    @include('front.includes.home.counter_boxes')
    <!--====== Counter With Image Text Block End ======-->

    <!--====== Testimonials Start ======-->
    @include('front.includes.home.feedbacks')
    <!--====== Testimonials End ======-->

    <!--====== Partners Section With CTA Start ======-->
    @include('front.includes.home.events')
    <!--====== Partners Section With CTA End ======-->

    <!--====== Latest News Start ======-->
    @include('front.includes.home.articles')
    <!--====== Latest News End ======-->
@endsection
