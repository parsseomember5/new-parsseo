<!DOCTYPE html>
<html lang="{{config('app.locale')}}" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default"
      data-assets-path="{{url('admin/assets/') . '/'}}" data-template="vertical-menu-template-starter">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/tagify/tagify.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/quill/typography.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/quill/editor.css')}}">

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
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('admin.includes.menu')

        <div class="layout-page">
            @include('admin.includes.navbar')
            <div class="content-wrapper">

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>


                <!-- Footer -->
                @include('admin.includes.footer')

                <div class="content-backdrop fade"></div>
            </div>

        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

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
<script src="{{asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/select2/i18n/fa.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/quill/quill.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('admin/assets/js/main.js')}}"></script>
<script src="{{asset('admin/assets/js/custom.js')}}"></script>

<!-- Page JS -->
@yield('scripts')
</body>
</html>
