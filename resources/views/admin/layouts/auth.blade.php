<!DOCTYPE html>
<html lang="{{config('app.locale')}}" class="light-style customizer-hide" dir="rtl" data-theme="theme-default"
      data-assets-path="{{url('admin/assets/') . '/'}}" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>صفحه 1 - کیت شروع | فرست - قالب مدیریت بوت‌استرپ</title>

    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon/favicon.ico')}}">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}">

    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" /> -->
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/rtl/rtl.css')}}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">

    <!-- Page CSS -->
    @yield('styles')


    <!-- Helpers -->
    <script src="{{asset('admin/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('admin/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
</head>

<body>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <img src="{{asset('admin/assets/img/branding/auth_logo.png')}}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                    <!-- /Logo -->
                    @yield('content')

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('admin/assets/vendor/libs/hammer/hammer.js')}}"></script>

<script src="{{asset('admin/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{asset('admin/assets/js/main.js')}}"></script>

<!-- Page JS -->
@yield('scripts')


</body>
</html>
