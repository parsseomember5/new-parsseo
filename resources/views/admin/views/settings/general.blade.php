@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> عمومی
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات هدر</h5>
                <form action="{{route('settings.general_update',$settings)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <label class="form-label">لوگو</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_header_logo" id="remove_header_logo">
                            <img src="{{$settings->getHeaderLogo()}}" alt="image" class="d-block rounded" width="100" id="headerLogo">
                            <div class="button-wrapper">
                                <label for="header_logo" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="header_logo" name="header_logo" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->header_logo != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->header_logo}}" image-id="headerLogo" input-id="remove_header_logo">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>
                        <label class="form-label mt-4">لوگو منوی موبایل</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_header_mobile_logo" id="remove_header_mobile_logo">
                            <img src="{{$settings->getHeaderMobileLogo()}}" alt="image" class="d-block rounded" width="100" id="headerMobileLogo">
                            <div class="button-wrapper">
                                <label for="header_mobile_logo" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="header_mobile_logo" name="header_mobile_logo" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->header_mobile_logo != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->header_mobile_logo}}" image-id="headerMobileLogo" input-id="remove_header_mobile_logo">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="header_address" class="form-label">آدرس</label>
                                <input class="form-control" type="text" id="header_address" name="header_address"
                                       value="{{old('header_address',$settings->header_address)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="header_email" class="form-label">ایمیل</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="header_email" name="header_email"
                                       value="{{old('header_email',$settings->header_email)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="header_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="header_btn_text" name="header_btn_text"
                                       value="{{old('header_btn_text',$settings->header_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="header_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="header_btn_link" name="header_btn_link"
                                       value="{{old('header_btn_link',$settings->header_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="header_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="header_btn_icon" name="header_btn_icon"
                                       value="{{old('header_btn_icon',$settings->header_btn_icon)}}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">تنظیمات فوتر</h5>
                    <div class="card-body">
                        <label class="form-label">لوگو</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_footer_logo" id="remove_footer_logo">
                            <img src="{{$settings->getFooterLogo()}}" alt="image" class="d-block rounded" width="100" id="footerLogo">
                            <div class="button-wrapper">
                                <label for="footer_logo" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="footer_logo" name="footer_logo" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->footer_logo != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->footer_logo}}" image-id="footerLogo" input-id="remove_footer_logo">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                        <label class="form-label mt-4">تصویر بکگراند</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_footer_image" id="remove_footer_image">
                            <img src="{{$settings->getFooterImage()}}" alt="image" class="d-block rounded" width="100" id="footerImage">
                            <div class="button-wrapper">
                                <label for="footer_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="footer_image" name="footer_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->footer_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->footer_image}}" image-id="footerImage" input-id="remove_footer_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="footer_box_small_text" class="form-label">عنوان کوچک باکس</label>
                                <input class="form-control text-start" type="text" id="footer_box_small_text" name="footer_box_small_text"
                                       value="{{old('footer_box_small_text',$settings->footer_box_small_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="footer_box_large_text" class="form-label">عنوان بزرگ باکس</label>
                                <input class="form-control text-start" type="text" id="footer_box_large_text" name="footer_box_large_text"
                                       value="{{old('footer_box_large_text',$settings->footer_box_large_text)}}">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="footer_box_btn_text" class="form-label">متن دکمه باکس</label>
                                <input class="form-control" type="text" id="footer_box_btn_text" name="footer_box_btn_text"
                                       value="{{old('footer_box_btn_text',$settings->footer_box_btn_text)}}">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="footer_box_btn_icon" class="form-label">آیکن دکمه باکس</label>
                                <input class="form-control" type="text" id="footer_box_btn_icon" name="footer_box_btn_icon"
                                       value="{{old('footer_box_btn_icon',$settings->footer_box_btn_icon)}}">
                            </div>
                            <div class="mb-3 col-4">
                                <label for="footer_box_btn_link" class="form-label">لینک دکمه باکس</label>
                                <input class="form-control" type="text" id="footer_box_btn_link" name="footer_box_btn_link"
                                       value="{{old('footer_box_btn_link',$settings->footer_box_btn_link)}}">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="footer_under_logo_text" class="form-label">متن زیر لوگو</label>
                                <input class="form-control" type="text" id="footer_under_logo_text" name="footer_under_logo_text"
                                       value="{{old('footer_under_logo_text',$settings->footer_under_logo_text)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="footer_list1_title" class="form-label">عنوان لیست 1</label>
                                <input class="form-control text-start" type="text" id="footer_list1_title" name="footer_list1_title"
                                       value="{{old('footer_list1_title',$settings->footer_list1_title)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="footer_list2_title" class="form-label">عنوان لیست 2</label>
                                <input class="form-control text-start" type="text" id="footer_list2_title" name="footer_list2_title"
                                       value="{{old('footer_list2_title',$settings->footer_list2_title)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="footer_list3_title" class="form-label">عنوان لیست 3</label>
                                <input class="form-control text-start" type="text" id="footer_list3_title" name="footer_list3_title"
                                       value="{{old('footer_list3_title',$settings->footer_list3_title)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="footer_list4_title" class="form-label">عنوان لیست 4</label>
                                <input class="form-control text-start" type="text" id="footer_list4_title" name="footer_list4_title"
                                       value="{{old('footer_list4_title',$settings->footer_list4_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="footer_phone" class="form-label">شماره تماس</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="footer_phone" name="footer_phone"
                                       value="{{old('footer_phone',$settings->footer_phone)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="footer_email" class="form-label">ایمیل</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="footer_email" name="footer_email"
                                       value="{{old('footer_email',$settings->footer_email)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="footer_address" class="form-label">آدرس</label>
                                <input class="form-control text-start" type="text" id="footer_address" name="footer_address"
                                       value="{{old('footer_address',$settings->footer_address)}}">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="footer_copyright" id="footer_copyright" value="{{old('footer_copyright',$settings->footer_copyright)}}">
                                <label for="footer_copyright" class="form-label">متن کپی رایت</label>
                                <div id="main-editor" data-input-id="footer_copyright">{!! old('footer_copyright',$settings->footer_copyright) !!}</div>
                            </div>
                            <div class="mb-3">
                                <label for="footer_logos" class="form-label">کد html زیر لوگو</label>
                                <small class="d-block mt-1 mb-2">میتوانید کد های خود را html خود را بنویسید.</small>
                                <textarea class="form-control" type="text" dir="ltr" id="footer_logos" rows="5" name="footer_logos">{{old('footer_logos',$settings->footer_logos)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">شبکه های اجتماعی</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="twitter" class="form-label">تویتتر</label>
                                <input class="form-control" type="text" id="twitter" name="twitter"
                                       value="{{old('twitter',$settings->twitter)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="instagram" class="form-label">اینستاگرام</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="instagram" name="instagram"
                                       value="{{old('instagram',$settings->instagram)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="youtube" class="form-label">یوتیوب</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="youtube" name="youtube"
                                       value="{{old('youtube',$settings->youtube)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="linkedin" class="form-label">لینکداین</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="linkedin" name="linkedin"
                                       value="{{old('linkedin',$settings->linkedin)}}">
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">سئو صفحه اصلی</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="home_canonical" class="form-label">تگ canonical</label>
                                <input class="form-control" type="text" dir="ltr" id="home_canonical" name="home_canonical"
                                       value="{{old('home_canonical',$settings->home_canonical)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="main_nav_title" class="form-label">عنوان nav اصلی</label>
                                <input class="form-control" type="text" id="main_nav_title" name="main_nav_title"
                                       value="{{old('main_nav_title',$settings->main_nav_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="home_title" class="form-label">تگ title</label>
                                <input class="form-control" type="text" id="home_title" name="home_title"
                                       value="{{old('home_title',$settings->home_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="home_h1" class="form-label">تگ h1 مخفی</label>
                                <input class="form-control" type="text" id="home_h1" name="home_h1"
                                       value="{{old('home_h1',$settings->home_h1)}}">
                            </div>
                            <div class="mt-3">
                                <label for="home_meta_description" class="form-label">متای توضیحات</label>
                                <textarea class="form-control" name="home_meta_description" id="home_meta_description">{{old('home_meta_description',$settings->home_meta_description)}}</textarea>
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">پاپ آپ تماس با ما</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="popup_title" class="form-label">عنوان</label>
                                <input class="form-control" type="text" id="popup_title" name="popup_title"
                                       value="{{old('popup_title',$settings->popup_title)}}">
                            </div>
                            {{-- image --}}
                            <div class="mb-3 col-lg-4">
                                <label for="popup_image" class="form-label">تصویر جدید</label>
                                <input class="form-control" type="file" id="popup_image" name="popup_image">
                            </div>
                            @if($settings->popup_image)
                                <div class="col-lg-3 mb-3">
                                    <input type="hidden" id="remove_popup_image" name="remove_popup_image">
                                    <div class="pt-4">
                                        <a href="{{$settings->getPopupImage()}}" target="_blank">
                                            <img src="{{$settings->getPopupImage()}}" alt="popup_image" class="w-px-40 h-auto rounded" id="popup-image">
                                        </a>
                                        <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$settings->popup_image}}"
                                              input-id="remove_popup_image" image-id="popup-image"><i class="bx bx-trash"></i></span>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-3 col-12">
                                <label for="popup_description" class="form-label">توضیحات</label>
                                <textarea class="form-control" name="popup_description" id="popup_description">{{old('popup_description',$settings->popup_description)}}</textarea>
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">دکمه های صفحه اصلی</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="whatsapp_button_number" class="form-label">شماره دکمه واتساپ</label>
                                <input class="form-control" type="text" dir="ltr" id="whatsapp_button_number" name="whatsapp_button_number"
                                       value="{{old('whatsapp_button_number',$settings->whatsapp_button_number)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="call_button_number" class="form-label">شماره دکمه تماس</label>
                                <input class="form-control" type="text" dir="ltr" id="call_button_number" name="call_button_number"
                                       value="{{old('call_button_number',$settings->call_button_number)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="call_button_text" class="form-label">متن دکمه تماس</label>
                                <input class="form-control text-start" type="text" id="call_button_text" name="call_button_text"
                                       value="{{old('call_button_text',$settings->call_button_text)}}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">تنظیمات اضافی</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="footer_scripts" class="form-label">جاواسکریپت سفارشی (Scripts)</label>
                            <small class="d-block mt-1 mb-2">کد های خود را بین تگ های script بنویسید.</small>
                            <textarea class="form-control" type="text" dir="ltr" id="footer_scripts" rows="5" name="footer_scripts">{{old('footer_scripts',$settings->footer_scripts)}}</textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success me-2 submit-button">ذخیره تغییرات</button>
                            <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">انصراف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
