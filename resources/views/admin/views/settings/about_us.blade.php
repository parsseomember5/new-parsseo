@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> لندینگ درباره ما
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">لندینگ درباره ما</h5>
                <form action="{{route('settings.about_us_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <input type="hidden" name="remove_image" id="remove_image">
                                <img src="{{$settings->getImage()}}" alt="image" class="d-block rounded" width="100" id="heroImage">
                                <div class="button-wrapper">
                                    <label for="image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="image" name="image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                    </label>
                                    @if($settings->image != null)
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->image}}" image-id="heroImage" input-id="remove_image">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">بازنشانی</span>
                                        </button>
                                    @endif
                                    <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="page_title" class="form-label">عنوان اصلی بالا</label>
                                <input class="form-control" type="text" id="page_title" name="page_title"
                                       value="{{old('page_title',$settings->page_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="uptitle" name="uptitle"
                                       value="{{old('uptitle',$settings->uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="title" name="title"
                                       value="{{old('title',$settings->title)}}">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="description" class="form-label">متن توضیحات</label>
                                <textarea class="form-control" type="text" rows="4" id="description" name="description">{{old('description',$settings->description)}}</textarea>
                            </div>

                            <div class="mt-3 col-12 overflow-hidden">
                                <label for="items" class="form-label">لیست چک ها</label>
                                <input id="items" class="form-control tagify-select" name="items" value="{{old('items',$settings->items)}}">
                                <small class="d-block text-muted mt-1">جمله را بنوسید و سپس اینتر بزنید</small>
                            </div>


                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">بخش ویژگی های ما</h5>
                    <div class="card-body">
                        <div class="row">
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

                            <div class="mb-3 col-md-4">
                                <label for="features_box1_icon" class="form-label">آیکن باکس یک</label>
                                <input class="form-control text-start" type="text" id="features_box1_icon" name="features_box1_icon"
                                       value="{{old('features_box1_icon',$settings->features_box1_icon)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box1_title" class="form-label">عنوان باکس یک</label>
                                <input class="form-control text-start" type="text" id="features_box1_title" name="features_box1_title"
                                       value="{{old('features_box1_title',$settings->features_box1_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box1_text" class="form-label">متن باکس یک</label>
                                <input class="form-control text-start" type="text" id="features_box1_text" name="features_box1_text"
                                       value="{{old('features_box1_text',$settings->features_box1_text)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box2_icon" class="form-label">آیکن باکس دو</label>
                                <input class="form-control text-start" type="text" id="features_box2_icon" name="features_box2_icon"
                                       value="{{old('features_box2_icon',$settings->features_box2_icon)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box2_title" class="form-label">عنوان باکس دو</label>
                                <input class="form-control text-start" type="text" id="features_box2_title" name="features_box2_title"
                                       value="{{old('features_box2_title',$settings->features_box2_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box2_text" class="form-label">متن باکس دو</label>
                                <input class="form-control text-start" type="text" id="features_box2_text" name="features_box2_text"
                                       value="{{old('features_box2_text',$settings->features_box2_text)}}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="features_box3_icon" class="form-label">آیکن باکس سه</label>
                                <input class="form-control text-start" type="text" id="features_box3_icon" name="features_box3_icon"
                                       value="{{old('features_box3_icon',$settings->features_box3_icon)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box3_title" class="form-label">عنوان باکس سه</label>
                                <input class="form-control text-start" type="text" id="features_box3_title" name="features_box3_title"
                                       value="{{old('features_box3_title',$settings->features_box3_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="features_box3_text" class="form-label">متن باکس سه</label>
                                <input class="form-control text-start" type="text" id="features_box3_text" name="features_box3_text"
                                       value="{{old('features_box3_text',$settings->features_box3_text)}}">
                            </div>

                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">بخش تیم ما</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="team_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="team_uptitle" name="team_uptitle"
                                       value="{{old('team_uptitle',$settings->team_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="team_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="team_title" name="team_title"
                                       value="{{old('team_title',$settings->team_title)}}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <h5 class="card-header">بخش نظرات مشتریان</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="feedback_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="feedback_uptitle" name="feedback_uptitle"
                                       value="{{old('feedback_uptitle',$settings->feedback_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="feedback_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="feedback_title" name="feedback_title"
                                       value="{{old('feedback_title',$settings->feedback_title)}}">
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
