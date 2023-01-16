<!DOCTYPE html>
<?php $generalSetting = \App\Models\GeneralSetting::where('locale',app()->getLocale())->first();?>
<html lang="{{app()->getLocale()}}">
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta name="robots" content="noindex">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="canonical" href="{{isset($canonical) && $canonical != '' ? $canonical : url()->current()}}">
    <meta name="description" content="{{isset($description) && $description != '' ? $description : $generalSetting->home_meta_description}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== Title ======-->
    <title>{{isset($title) && $title != '' ? $title : $generalSetting->home_title}}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/png" />
    <!--====== Animate Css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
    <!--====== Slick Css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}" />
    <!--====== Lity Css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/lity.min.css')}}" />
    <!--====== Main css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
</head>

<body>
<h1 class="d-none">{{isset($h1Title) && $h1Title != '' ? $h1Title : $generalSetting->home_h1}}</h1>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<?php if(!isset($navTitle)) $navTitle = $generalSetting->main_nav_title;?>
@include('front.includes.header',['headerClass' => $headerClass,'navTitle' => $navTitle])
<main>
    @yield('content')
</main>
@include('front.includes.footer')

<!-- action buttons -->
<a href="{{'https://wa.me/' . $generalSetting->whatsapp_button_number}}" class="whatsapp-button" title="پشتیبانی واتساپ"><i class="fab fa-whatsapp"></i></a>
<a href="tel:{{$generalSetting->call_button_number}}" class="call-button" title="{{$generalSetting->call_button_text}}">
    <i class="far fa-phone"></i>
    <div class="d-flex flex-column number">
        <span>{{$generalSetting->call_button_text}}</span>
        <span>{{$generalSetting->call_button_number}}</span>
    </div>
</a>

@include('front.includes.popup_contact')

<!--====== jquery js ======-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!--====== Bootstrap js ======-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!--====== Inview js ======-->
<script src="{{asset('assets/js/jquery.inview.min.js')}}"></script>
<!--====== Slick js ======-->
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!--====== Lity js ======-->
<script src="{{asset('assets/js/lity.min.js')}}"></script>
<!--====== Wow js ======-->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!--====== Main js ======-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    $(document).on('change','.lang-switcher-select',function (){
       $(this).parent('form').submit();
    });
</script>
{!! $generalSetting->footer_scripts !!}
</body>

</html>
