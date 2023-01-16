@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> لندینگ طراحی اپلیکیشن
        </h4>
        @include('admin.includes.lang_switcher')
    </div>
    @include('admin.views.settings.nav')
    @include('admin.includes.alerts')
    <form action="{{route('settings.appdesign_update',$settings)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <h5 class="card-header">تنظیمات CTA</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="h1_hidden" class="form-label">تگ h1 مخفی</label>
                            <input class="form-control" type="text" id="h1_hidden" name="h1_hidden"
                                   value="{{old('h1_hidden',$settings->h1_hidden)}}">
                        </div>

                        <div class="mb-3 col-12">
                            <label for="nav_title" class="form-label">تگ عنوان nav</label>
                            <input class="form-control" type="text" id="nav_title" name="nav_title"
                                   value="{{old('nav_title',$settings->nav_title)}}">
                        </div>

                        <label class="form-label">تصویر CTA</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="remove_cta_image" id="remove_cta_image">
                            <img src="{{$settings->getCtaImage()}}" alt="image" class="d-block rounded" width="100" id="ctaImage">
                            <div class="button-wrapper">
                                <label for="cta_image" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="cta_image" name="cta_image" class="account-file-input" hidden accept="image/png, image/jpeg">
                                </label>
                                @if($settings->cta_image != null)
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->cta_image}}" image-id="ctaImage" input-id="remove_cta_image">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">بازنشانی</span>
                                    </button>
                                @endif
                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="cta_uptitle" class="form-label">عنوان کوچک cta</label>
                            <input class="form-control" type="text" id="cta_uptitle" name="cta_uptitle"
                                   value="{{old('cta_uptitle',$settings->cta_uptitle)}}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cta_title" class="form-label">cta عنوان</label>
                            <input class="form-control text-start" type="text" id="cta_title" name="cta_title"
                                   value="{{old('cta_title',$settings->cta_title)}}">
                        </div>

                        <div class="mb-3 col-12">
                            <label for="cta_text" class="form-label">متن cta</label>
                            <textarea class="form-control" type="text" rows="4" id="cta_text" name="cta_text">{{old('cta_text',$settings->cta_text)}}</textarea>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="cta_btn1_text" class="form-label">متن دکمه یک cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn1_text" name="cta_btn1_text"
                                   value="{{old('cta_btn1_text',$settings->cta_btn1_text)}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="cta_btn1_link" class="form-label">لینک دکمه یک cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn1_link" name="cta_btn1_link"
                                   value="{{old('cta_btn1_link',$settings->cta_btn1_link)}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="cta_btn1_icon" class="form-label">آیکن دکمه یک cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn1_icon" name="cta_btn1_icon"
                                   value="{{old('cta_btn1_icon',$settings->cta_btn1_icon)}}">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="cta_btn2_text" class="form-label">متن دکمه دو cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn2_text" name="cta_btn2_text"
                                   value="{{old('cta_btn2_text',$settings->cta_btn2_text)}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="cta_btn2_link" class="form-label">لینک دکمه دو cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn2_link" name="cta_btn2_link"
                                   value="{{old('cta_btn2_link',$settings->cta_btn2_link)}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="cta_btn2_icon" class="form-label">آیکن دکمه دو cta</label>
                            <input class="form-control text-start" type="text" id="cta_btn2_icon" name="cta_btn2_icon"
                                   value="{{old('cta_btn2_icon',$settings->cta_btn2_icon)}}">
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <h5 class="card-header">ویدیو</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">ویدیو</label>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <input type="hidden" name="remove_video" id="remove_video">
                                <img src="{{asset('admin/assets/img/icons/unicons/cube.png')}}" alt="image" class="d-block rounded" width="100" id="videoFile">
                                <div class="button-wrapper">
                                    <label for="video" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">انتخاب ویدیو جدید</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="video" name="video" class="account-file-input" hidden accept="video/mp4,video/x-m4v,video/*">
                                    </label>
                                    @if($settings->video != null)
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->video}}" image-id="videoFile" input-id="remove_video">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">بازنشانی</span>
                                        </button>
                                    @endif
                                    <p class="mb-0">فایل‌های ویدیویی با حجم حداکثر 40 مگابایت</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label class="form-label">تصویر پوستر ویدیو</label>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <input type="hidden" name="remove_video_poster" id="remove_video_poster">
                                <img src="{{$settings->getVideoPoster()}}" alt="image" class="d-block rounded" width="100" id="posterImage">
                                <div class="button-wrapper">
                                    <label for="video_poster" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="video_poster" name="video_poster" class="account-file-input" hidden accept="image/png, image/jpeg">
                                    </label>
                                    @if($settings->video_poster != null)
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$settings->video_poster}}" image-id="posterImage" input-id="remove_video_poster">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">بازنشانی</span>
                                        </button>
                                    @endif
                                    <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <h5 class="card-header">تنظیمات مقاله</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label for="article_btn_text" class="form-label">متن دکمه</label>
                            <input class="form-control" type="text" id="article_btn_text" name="article_btn_text"
                                   value="{{old('article_btn_text',$settings->article_btn_text)}}">
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="article_btn_link" class="form-label">لینک دکمه</label>
                            <input class="form-control" type="text" id="article_btn_link" name="article_btn_link"
                                   value="{{old('article_btn_link',$settings->article_btn_link)}}">
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="article_btn_icon" class="form-label">آیکن دکمه</label>
                            <input class="form-control" type="text" id="article_btn_icon" name="article_btn_icon"
                                   value="{{old('article_btn_icon',$settings->article_btn_icon)}}">
                        </div>

                        <div class="mb-3 col-12">
                            <label for="summary" class="form-label">summary</label>
                            <textarea class="form-control" type="text" rows="3" id="summary" name="summary">{{old('summary',$settings->summary)}}</textarea>
                        </div>

                        <div class="mb-3 col-12">
                            <input type="hidden" name="details" id="details" value="{{old('details',$settings->details)}}">
                            <label for="details" class="form-label">details</label>
                            <div id="main-editor" data-input-id="details">{!! old('details',$settings->details) !!}</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success me-2 submit-button">ذخیره تغییرات</button>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">انصراف</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header">سوالات متداول</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="faq_title" class="form-label">عنوان سوالات متداول</label>
                            <input class="form-control" type="text" id="faq_title" name="faq_title"
                                   value="{{old('faq_title',$settings->faq_title)}}">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="faq_title" class="form-label">سوالات متداول</label>
                            <div id="faq-items">
                                @if($settings->faq)
                                    @foreach($settings->faq as $item)
                                        <?php $itemName = \Illuminate\Support\Str::random(6);?>
                                        <div class='row align-items-end' id='faq_row_{{$itemName}}'>
                                            <div class='mb-3 col-12'>
                                                <label for="item_faq_{{$itemName}}" class="form-label">عنوان</label>
                                                <input class="form-control text-start" type="text" id="item_faq_{{$itemName}}" name="item_faq_{{$itemName}}[]"
                                                       value="{{old('item_faq_' . $itemName,$item[0])}}">
                                            </div>

                                            <div class='mb-3 col-12'>
                                                <label for="item_faq_{{$itemName}}" class="form-label">متن</label>
                                                <textarea class="form-control text-start" type="text" id="item_faq_{{$itemName}}" name="item_faq_{{$itemName}}[]">{{old('item_faq_' . $itemName,$item[1])}}</textarea>
                                            </div>

                                            <div class='mb-3 col-lg-2'>
                                                <span class='btn btn-label-danger btn-remove-faq' data-delete='faq_row_{{$itemName}}'><i class='bx bx-trash'></i></span>
                                            </div>

                                            <div class='col-12'><hr></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="btn btn-primary add-more-faq"><i class="bx bx-plus"></i> افزودن آیتم</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
