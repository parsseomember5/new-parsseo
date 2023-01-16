@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> هیرو
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات هیرو سکشن</h5>
                <form action="{{route('settings.hero_update',$settings)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_hero_image" id="remove_hero_image">
                            <img src="{{$settings->getHeroImage()}}" alt="image" class="d-block rounded" width="100" id="heroImage">
                            <div class="button-wrapper">
                                <label for="hero_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="hero_image" name="hero_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->hero_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->hero_image}}" image-id="heroImage" input-id="remove_hero_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="hero_title" class="form-label">عنوان</label>
                                <input class="form-control" type="text" id="hero_title" name="hero_title"
                                       value="{{old('hero_title',$settings->hero_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_subtitle" class="form-label">زیرعنوان</label>
                                <input class="form-control text-start" type="text" id="hero_subtitle" name="hero_subtitle"
                                       value="{{old('hero_subtitle',$settings->hero_subtitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="hero_btn_text" name="hero_btn_text"
                                       value="{{old('hero_btn_text',$settings->hero_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="hero_btn_link" name="hero_btn_link"
                                       value="{{old('hero_btn_link',$settings->hero_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="hero_btn_icon" name="hero_btn_icon"
                                       value="{{old('hero_btn_icon',$settings->hero_btn_icon)}}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="hero_play_video_link" class="form-label">لینک ویدیو</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="hero_play_video_link" name="hero_play_video_link"
                                       value="{{old('hero_play_video_link',$settings->hero_play_video_link)}}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">باکس</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="hero_box_title" class="form-label">عنوان</label>
                                <input class="form-control" type="text" id="hero_box_title" name="hero_box_title"
                                       value="{{old('hero_box_title',$settings->hero_box_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="hero_box_text" class="form-label">متن</label>
                                <input class="form-control text-start" type="text" id="hero_box_text" name="hero_box_text"
                                       value="{{old('hero_box_text',$settings->hero_box_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_box_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="hero_box_btn_text" name="hero_box_btn_text"
                                       value="{{old('hero_box_btn_text',$settings->hero_box_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_box_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="hero_box_btn_link" name="hero_box_btn_link"
                                       value="{{old('hero_box_btn_link',$settings->hero_box_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="hero_box_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="hero_box_btn_icon" name="hero_box_btn_icon"
                                       value="{{old('hero_box_btn_icon',$settings->hero_box_btn_icon)}}">
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
