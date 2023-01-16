<?php $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();?>

<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.general" ? 'active' :''}}" href="{{route('settings.general')}}"><i class="bx bx-cog me-1"></i>
            عمومی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.hero" ? 'active' :''}}" href="{{route('settings.hero')}}"><i class="bx bx-layout me-1"></i> هیرو</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.about" ? 'active' :''}}" href="{{route('settings.about')}}"><i class="bx bx-text me-1"></i> درباره ما</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.portfolios" ? 'active' :''}}" href="{{route('settings.portfolios')}}"><i class="bx bx-package me-1"></i>
            نمونه کارها</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.features" ? 'active' :''}}" href="{{route('settings.features')}}"><i class="bx bx-list-ol me-1"></i> ویژگی ها</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.articles" ? 'active' :''}}" href="{{route('settings.articles')}}"><i class="bx bx-pencil me-1"></i> مقالات</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.feedbacks" ? 'active' :''}}" href="{{route('settings.feedbacks')}}"><i class="bx bx-chat me-1"></i> نظرات مشتریان</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.counters" ? 'active' :''}}" href="{{route('settings.counters')}}"><i class="bx bx-repeat me-1"></i> شمارشگر ها</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.events" ? 'active' :''}}" href="{{route('settings.events')}}"><i class="bx bx-calendar-event me-1"></i> رویداد ها</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.contact_us" ? 'active' :''}}" href="{{route('settings.contact_us')}}"><i class="bx bx-phone-call me-1"></i> لندینگ تماس باما</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.about_us" ? 'active' :''}}" href="{{route('settings.about_us')}}"><i class="bx bx-info-circle me-1"></i> لندینگ درباره ما</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.seo" ? 'active' :''}}" href="{{route('settings.seo')}}"><i class="bx bx-chart me-1"></i> لندینگ سئو</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.webdesign" ? 'active' :''}}" href="{{route('settings.webdesign')}}"><i class="bx bx-brush me-1"></i> لندینگ طراحی سایت</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$currentRoute == "settings.appdesign" ? 'active' :''}}" href="{{route('settings.appdesign')}}"><i class="bx bx-mobile me-1"></i> لندینگ طراحی اپ</a>
    </li>

</ul>
