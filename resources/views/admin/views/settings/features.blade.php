@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> ویژگی ها
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">ویدیو</h5>
                <form action="{{route('settings.features_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <input type="hidden" name="remove_features_video_image" id="remove_features_video_image">
                                <img src="{{$settings->getVideoImage()}}" alt="image" class="d-block rounded" width="100" id="heroImage">
                                <div class="button-wrapper">
                                    <label for="features_video_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="features_video_image" name="features_video_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                    </label>
                                    @if($settings->features_video_image != null)
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->features_video_image}}" image-id="heroImage" input-id="remove_features_video_image">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">بازنشانی</span>
                                        </button>
                                    @endif
                                    <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="features_video_link" class="form-label">لینک ویدیو</label>
                                <input class="form-control" dir="ltr" type="text" id="features_video_link" name="features_video_link"
                                       value="{{old('features_video_link',$settings->features_video_link)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="features_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="features_uptitle" name="features_uptitle"
                                       value="{{old('features_uptitle',$settings->features_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="features_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="features_title" name="features_title"
                                       value="{{old('features_title',$settings->features_title)}}">
                            </div>

                            <div class="mb-3">
                                <label for="features_text" class="form-label">متن</label>
                                <textarea class="form-control" rows="4" id="features_text" name="features_text">{{old('features_text',$settings->features_text)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">آیتم ها</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="features_item1_title" class="form-label">عنوان آیتم یک</label>
                                <input class="form-control" type="text" id="features_item1_title" name="features_item1_title"
                                       value="{{old('features_item1_title',$settings->features_item1_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="features_item1_text" class="form-label">متن آیتم یک</label>
                                <input class="form-control text-start" type="text" id="features_item1_text" name="features_item1_text"
                                       value="{{old('features_item1_text',$settings->features_item1_text)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="features_item1_icon" class="form-label">آیکن آیتم یک</label>
                                <input class="form-control text-start" type="text" id="features_item1_icon" name="features_item1_icon"
                                       value="{{old('features_item1_icon',$settings->features_item1_icon)}}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="features_item2_title" class="form-label">عنوان آیتم دو</label>
                                <input class="form-control" type="text" id="features_item1_title" name="features_item2_title"
                                       value="{{old('features_item2_title',$settings->features_item2_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="features_item2_text" class="form-label">متن آیتم دو</label>
                                <input class="form-control text-start" type="text" id="features_item2_text" name="features_item2_text"
                                       value="{{old('features_item2_text',$settings->features_item2_text)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="features_item2_icon" class="form-label">آیکن آیتم دو</label>
                                <input class="form-control text-start" type="text" id="features_item1_icon" name="features_item2_icon"
                                       value="{{old('features_item2_icon',$settings->features_item2_icon)}}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="features_item3_title" class="form-label">عنوان آیتم سه</label>
                                <input class="form-control" type="text" id="features_item3_title" name="features_item3_title"
                                       value="{{old('features_item3_title',$settings->features_item3_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="features_item3_text" class="form-label">متن آیتم سه</label>
                                <input class="form-control text-start" type="text" id="features_item3_text" name="features_item3_text"
                                       value="{{old('features_item1_text',$settings->features_item3_text)}}">
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="features_item3_icon" class="form-label">آیکن آیتم سه</label>
                                <input class="form-control text-start" type="text" id="features_item3_icon" name="features_item3_icon"
                                       value="{{old('features_item3_icon',$settings->features_item3_icon)}}">
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
