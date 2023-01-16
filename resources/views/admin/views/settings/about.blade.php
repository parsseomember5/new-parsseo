@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> درباره ما
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">ویدیو</h5>
                <form action="{{route('settings.about_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <input type="hidden" name="remove_about_video_image" id="remove_about_video_image">
                                <img src="{{$settings->getVideoImage()}}" alt="image" class="d-block rounded" width="100" id="heroImage">
                                <div class="button-wrapper">
                                    <label for="about_video_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="about_video_image" name="about_video_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                    </label>
                                    @if($settings->about_video_image != null)
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->about_video_image}}" image-id="heroImage" input-id="remove_about_video_image">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">بازنشانی</span>
                                        </button>
                                    @endif
                                    <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="about_video_link" class="form-label">لینک ویدیو</label>
                            <input class="form-control" dir="ltr" type="text" id="about_video_link" name="about_video_link"
                                   value="{{old('about_video_link',$settings->about_video_link)}}">
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">سکشن 1</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_about_image" id="remove_about_image">
                            <img src="{{$settings->getImage()}}" alt="image" class="d-block rounded"  width="100" id="heroImage">
                            <div class="button-wrapper">
                                <label for="about_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="about_image" name="about_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->about_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->about_image}}" image-id="heroImage" input-id="remove_about_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="about_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="about_uptitle" name="about_uptitle"
                                       value="{{old('about_uptitle',$settings->about_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="about_title" name="about_title"
                                       value="{{old('about_title',$settings->about_title)}}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="about_text" class="form-label">متن</label>
                                <textarea class="form-control text-start" type="text" id="about_text" name="about_text">{{old('about_text',$settings->about_text)}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="about_btn_text" name="about_btn_text"
                                       value="{{old('about_btn_text',$settings->about_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about_btn_link" name="about_btn_link"
                                       value="{{old('about_btn_link',$settings->about_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about_btn_icon" name="about_btn_icon"
                                       value="{{old('about_btn_icon',$settings->about_btn_icon)}}">
                            </div>

                        </div>
                    </div>
                    <h5 class="card-header pt-0">آیتم ها</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="about_item1_title" class="form-label">عنوان آیتم یک</label>
                                <input class="form-control" type="text" id="about_item1_title" name="about_item1_title"
                                       value="{{old('about_item1_title',$settings->about_item1_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about_item1_text" class="form-label">متن آیتم یک</label>
                                <input class="form-control text-start" type="text" id="about_item1_text" name="about_item1_text"
                                       value="{{old('about_item1_text',$settings->about_item1_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about_item2_title" class="form-label">عنوان آیتم دو</label>
                                <input class="form-control" type="text" id="about_item2_title" name="about_item2_title"
                                       value="{{old('about_item2_title',$settings->about_item2_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about_item2_text" class="form-label">متن آیتم دو</label>
                                <input class="form-control text-start" type="text" id="about_item2_text" name="about_item2_text"
                                       value="{{old('about_item2_text',$settings->about_item2_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about_item3_title" class="form-label">عنوان آیتم سه</label>
                                <input class="form-control" type="text" id="about_item3_title" name="about_item3_title"
                                       value="{{old('about_item3_title',$settings->about_item3_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about_item3_text" class="form-label">متن آیتم سه</label>
                                <input class="form-control text-start" type="text" id="about_item3_text" name="about_item3_text"
                                       value="{{old('about_item3_text',$settings->about_item3_text)}}">
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">سکشن 2</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_about2_image" id="remove_about2_image">
                            <img src="{{$settings->getImage2()}}" alt="image" class="d-block rounded"  width="100" id="about2Image">
                            <div class="button-wrapper">
                                <label for="about2_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="about2_image" name="about2_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->about2_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->about2_image}}" image-id="about2Image" input-id="remove_about2_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="about2_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="about2_uptitle" name="about2_uptitle"
                                       value="{{old('about2_uptitle',$settings->about2_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about2_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="about2_title" name="about2_title"
                                       value="{{old('about2_title',$settings->about2_title)}}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="about2_text" class="form-label">متن</label>
                                <textarea class="form-control text-start" type="text" id="about2_text" name="about2_text">{{old('about2_text',$settings->about2_text)}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about2_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="about2_btn_text" name="about2_btn_text"
                                       value="{{old('about2_btn_text',$settings->about2_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about2_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about2_btn_link" name="about2_btn_link"
                                       value="{{old('about2_btn_link',$settings->about2_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about2_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about2_btn_icon" name="about2_btn_icon"
                                       value="{{old('about2_btn_icon',$settings->about2_btn_icon)}}">
                            </div>

                        </div>
                    </div>
                    <h5 class="card-header pt-0">آیتم ها</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="about2_item1_title" class="form-label">عنوان آیتم یک</label>
                                <input class="form-control" type="text" id="about2_item1_title" name="about2_item1_title"
                                       value="{{old('about2_item1_title',$settings->about2_item1_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about2_item1_text" class="form-label">متن آیتم یک</label>
                                <input class="form-control text-start" type="text" id="about2_item1_text" name="about2_item1_text"
                                       value="{{old('about2_item1_text',$settings->about2_item1_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about2_item2_title" class="form-label">عنوان آیتم دو</label>
                                <input class="form-control" type="text" id="about2_item2_title" name="about2_item2_title"
                                       value="{{old('about2_item2_title',$settings->about2_item2_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about2_item2_text" class="form-label">متن آیتم دو</label>
                                <input class="form-control text-start" type="text" id="about2_item2_text" name="about2_item2_text"
                                       value="{{old('about2_item2_text',$settings->about2_item2_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about2_item3_title" class="form-label">عنوان آیتم سه</label>
                                <input class="form-control" type="text" id="about2_item3_title" name="about2_item3_title"
                                       value="{{old('about2_item3_title',$settings->about2_item3_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about2_item3_text" class="form-label">متن آیتم سه</label>
                                <input class="form-control text-start" type="text" id="about2_item3_text" name="about2_item3_text"
                                       value="{{old('about2_item3_text',$settings->about2_item3_text)}}">
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">سکشن 3</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_about3_image" id="remove_about3_image">
                            <img src="{{$settings->getImage3()}}" alt="image" class="d-block rounded"  width="100" id="about3Image">
                            <div class="button-wrapper">
                                <label for="about3_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="about3_image" name="about3_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->about3_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->about3_image}}" image-id="about3Image" input-id="remove_about3_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="about3_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="about3_uptitle" name="about3_uptitle"
                                       value="{{old('about3_uptitle',$settings->about3_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about3_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="about3_title" name="about3_title"
                                       value="{{old('about3_title',$settings->about3_title)}}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="about3_text" class="form-label">متن</label>
                                <textarea class="form-control text-start" type="text" id="about3_text" name="about3_text">{{old('about3_text',$settings->about3_text)}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about3_btn_text" class="form-label">متن دکمه</label>
                                <input class="form-control text-start" type="text" id="about3_btn_text" name="about3_btn_text"
                                       value="{{old('about3_btn_text',$settings->about3_btn_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about3_btn_link" class="form-label">لینک دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about3_btn_link" name="about3_btn_link"
                                       value="{{old('about3_btn_link',$settings->about3_btn_link)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="about3_btn_icon" class="form-label">آیکن دکمه</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="about3_btn_icon" name="about3_btn_icon"
                                       value="{{old('about3_btn_icon',$settings->about3_btn_icon)}}">
                            </div>

                        </div>
                    </div>
                    <h5 class="card-header pt-0">آیتم ها</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="about3_item1_title" class="form-label">عنوان آیتم یک</label>
                                <input class="form-control" type="text" id="about3_item1_title" name="about3_item1_title"
                                       value="{{old('about3_item1_title',$settings->about3_item1_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about3_item1_text" class="form-label">متن آیتم یک</label>
                                <input class="form-control text-start" type="text" id="about3_item1_text" name="about3_item1_text"
                                       value="{{old('about3_item1_text',$settings->about3_item1_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about3_item2_title" class="form-label">عنوان آیتم دو</label>
                                <input class="form-control" type="text" id="about3_item2_title" name="about3_item2_title"
                                       value="{{old('about3_item2_title',$settings->about3_item2_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about3_item2_text" class="form-label">متن آیتم دو</label>
                                <input class="form-control text-start" type="text" id="about3_item2_text" name="about3_item2_text"
                                       value="{{old('about3_item2_text',$settings->about3_item2_text)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about3_item3_title" class="form-label">عنوان آیتم سه</label>
                                <input class="form-control" type="text" id="about3_item3_title" name="about3_item3_title"
                                       value="{{old('about3_item3_title',$settings->about3_item3_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="about3_item3_text" class="form-label">متن آیتم سه</label>
                                <input class="form-control text-start" type="text" id="about3_item3_text" name="about3_item3_text"
                                       value="{{old('about3_item3_text',$settings->about3_item3_text)}}">
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
