@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> رویداد ها
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات باکس های رویداد</h5>
                <form action="{{route('settings.events_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <h5 class="card-header">باکس یک</h5>
                        <label class="form-label">تصویر بک گراند</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_event1_image" id="remove_event1_image">
                            <img src="{{$settings->getEvent1Image()}}" alt="image" class="d-block rounded" width="100" id="event1Image">
                            <div class="button-wrapper">
                                <label for="event1_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="event1_image" name="event1_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->event1_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->event1_image}}" image-id="event1Image" input-id="remove_event1_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="event1_title" class="form-label">عنوان</label>
                                <input class="form-control" type="text" id="event1_title" name="event1_title"
                                       value="{{old('event1_title',$settings->event1_title)}}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="event1_text" class="form-label">متن</label>
                                <textarea class="form-control text-start" rows="3" type="text" id="event1_text" name="event1_text">{{old('event1_text',$settings->event1_text)}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event1_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="event1_btn_text" name="event1_btn_text"
                                       value="{{old('event1_btn_text',$settings->event1_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event1_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" type="text" id="event1_btn_icon" name="event1_btn_icon"
                                       value="{{old('event1_btn_icon',$settings->event1_btn_icon)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event1_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" type="text" id="event1_btn_link" name="event1_btn_link"
                                       value="{{old('event1_btn_link',$settings->event1_btn_link)}}">
                            </div>

                        </div>

                        <hr>
                        <h5 class="card-header">باکس دو</h5>
                        <label class="form-label">تصویر بک گراند</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_event2_image" id="remove_event2_image">
                            <img src="{{$settings->getEvent2Image()}}" alt="image" class="d-block rounded" width="100" id="event2Image">
                            <div class="button-wrapper">
                                <label for="event2_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="event2_image" name="event2_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->event2_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->event2_image}}" image-id="event2Image" input-id="remove_event2_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="event2_title" class="form-label">عنوان</label>
                                <input class="form-control" type="text" id="event2_title" name="event2_title"
                                       value="{{old('event2_title',$settings->event2_title)}}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="event1_text" class="form-label">متن</label>
                                <textarea class="form-control text-start" rows="3" type="text" id="event2_text" name="event2_text">{{old('event2_text',$settings->event2_text)}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event1_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="event2_btn_text" name="event2_btn_text"
                                       value="{{old('event2_btn_text',$settings->event2_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event2_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" type="text" id="event1_btn_icon" name="event2_btn_icon"
                                       value="{{old('event2_btn_icon',$settings->event2_btn_icon)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="event2_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" type="text" id="event2_btn_link" name="event2_btn_link"
                                       value="{{old('event2_btn_link',$settings->event2_btn_link)}}">
                            </div>

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
