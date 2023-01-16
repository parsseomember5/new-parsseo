@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">نمونه کار ها /</span> ویرایش
        </h4>
        <div>
            <a href="{{route('portfolio.show',$portfolio)}}" class="btn btn-label-secondary" target="_blank"><span><i class="bx bx-show me-sm-2"></i> <span class="d-none d-sm-inline-block">مشاهده</span></span></a>
            <a href="{{route('portfolios.create')}}" class="dt-button create-new btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن نمونه کار جدید</span></span></a>
        </div>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('portfolios.update',$portfolio)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- name --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="name">نام پروژه (ضروری)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$portfolio->name)}}">
                        </div>

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">عنوان (ضروری)</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title',$portfolio->title)}}">
                        </div>

                        {{-- category --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="categories">دسته بندی ها</label>
                            <select class="select2 form-select" id="categories" name="categories[]" data-allow-clear="true" multiple>
                                @foreach(\App\Models\PortfolioCategory::all() as $category)
                                    <option value="{{$category->id}}" {{ in_array($category->id,$portfolio->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$portfolio->slug)}}">
                        </div>

                        {{-- website --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="website">لینک سایت</label>
                            <input type="text" dir="ltr" class="form-control" id="website" name="website" value="{{old('website',$portfolio->website)}}">
                        </div>

                        {{-- short description --}}
                        <div class="mb-3 col-12">
                            <label for="short_description" class="form-label">توضیحات کوتاه</label>
                            <textarea rows="3" class="form-control" id="short_description" name="short_description">{{old('short_description',$portfolio->short_description)}}</textarea>
                        </div>


                        {{-- image --}}
                        <div class="mb-3 col-lg-4">
                            <label for="image" class="form-label">تصویر اصلی</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        @if($portfolio->image)
                            <div class="col-lg-3 mb-3">
                                <input type="hidden" id="remove_image" name="remove_image">
                                <div class="pt-4">
                                    <a href="{{$portfolio->getImage()}}" target="_blank">
                                        <img src="{{$portfolio->getImage('thumb')}}" alt="image" class="w-px-40 h-auto rounded" id="post-image">
                                    </a>
                                    <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$portfolio->image['original']}}"
                                          input-id="remove_image" image-id="post-image"><i class="bx bx-trash"></i></span>
                                </div>
                            </div>
                        @endif

                        <div class="col-12"></div>

                        {{-- scroll image --}}
                        <div class="mb-3 col-lg-4">
                            <label for="scroll_image" class="form-label">تصویر اسکرولی</label>
                            <input class="form-control" type="file" id="scroll_image" name="scroll_image">
                        </div>

                        @if($portfolio->scroll_image)
                            <div class="col-lg-3 mb-3">
                                <input type="hidden" id="remove_scroll_image" name="remove_scroll_image">
                                <div class="pt-4">
                                    <a href="{{$portfolio->getScrollImage()}}" target="_blank">
                                        <img src="{{$portfolio->getScrollImage('thumb')}}" alt="scroll image" class="w-px-40 h-auto rounded" id="scrollImage">
                                    </a>
                                    <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$portfolio->scroll_image['original']}}"
                                          input-id="remove_scroll_image" image-id="scrollImage"><i class="bx bx-trash"></i></span>
                                </div>
                            </div>
                        @endif


                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body',$portfolio->body)}}">
                            <label for="body" class="form-label">محتوای نمونه کار</label>
                            <div id="main-editor" data-input-id="body">{!! old('body',$portfolio->body) !!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>باکس ها (اختیاری)</h5>

                    <div class="row">
                        {{-- box 1 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box1_title">عنوان باکس اول</label>
                            <input type="text" class="form-control" id="box1_title" name="box1_title" value="{{old('box1_title',$portfolio->box1_title)}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box1_value">مقدار باکس اول</label>
                            <input type="text" class="form-control" id="box1_value" name="box1_value" value="{{old('box1_value',$portfolio->box1_value)}}">
                        </div>

                        {{-- box 2 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box2_title">عنوان باکس دوم</label>
                            <input type="text" class="form-control" id="box2_title" name="box2_title" value="{{old('box2_title',$portfolio->box2_title)}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box2_value">مقدار باکس دوم</label>
                            <input type="text" class="form-control" id="box2_value" name="box2_value" value="{{old('box2_value',$portfolio->box2_value)}}">
                        </div>

                        {{-- box 3 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box3_title">عنوان باکس سوم</label>
                            <input type="text" class="form-control" id="box3_title" name="box3_title" value="{{old('box3_title',$portfolio->box3_title)}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box3_value">مقدار باکس سوم</label>
                            <input type="text" class="form-control" id="box3_value" name="box3_value" value="{{old('box3_value',$portfolio->box3_value)}}">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        {{-- locale --}}
                        <div class="mb-3 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="locale">زبان مقاله</label>
                                <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                                    <option value="fa" {{ $portfolio->locale == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                                    <option value="en" {{ $portfolio->locale == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                                </select>
                            </div>
                        </div>

                        {{-- translation --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                            <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                                <option value="" selected>انتخاب نشده</option>
                                @foreach(\App\Models\Portfolio::where('locale','!=',$portfolio->locale)->latest()->get() as $translation)
                                    <option value="{{$translation->id}}" {{$portfolio->translation_id == $translation->id ? 'selected' : ''}}>{{$translation->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- meta description --}}
                    <div class="mb-3">
                        <label class="form-label" for="meta_description">متای توضیحات</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description',$portfolio->meta_description)}}</textarea>
                    </div>

                    {{-- canonical --}}
                    <div class="mb-3">
                        <label class="form-label" for="canonical">تگ canonical</label>
                        <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical',$portfolio->canonical)}}">
                    </div>

                    {{-- keywords --}}
                    <div class="mb-3">
                        <label for="features" class="form-label">لیست ویژگی ها</label>
                        <input id="features" class="form-control tagify-select" name="features" value="{{old('features',$portfolio->features)}}">
                        <small class="d-block text-muted mt-1">جمله را بنوسید و سپس اینتر بزنید</small>
                    </div>

                    {{-- order --}}
                    <div class="mb-3">
                        <label class="form-label" for="order">اولویت نمایش</label>
                        <input type="number" class="form-control" dir="ltr" id="order" name="order" value="{{old('order',$portfolio->order)}}">
                        <small class="d-block text-muted mt-1">اولویت بالاتر جلوتر نمایش داده میشود.</small>
                    </div>

                    {{-- featured --}}
                    <div class="mb-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" {{$portfolio->featured ? 'checked' :''}}>
                            <label class="form-check-label" for="featured">نمونه کار ویژه</label>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-success submit-button">ذخیره تغییرات</button>

                        <button type="button" class="btn btn-label-danger" id="edit-page-delete"
                                data-alert-message="بعد از حذف به زباله‌دان منتقل میشود."
                                data-model-id="{{$portfolio->id}}" data-model="portfolios">
                            حذف این نمونه کار
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('styles')
@endsection
@section('scripts')
    <script>
        let localeSelect = $('#locale');
        let translationSelect = $('#translation_id');

        localeSelect.change(function () {
            getTranslations($(this).val());
        });
        function getTranslations(locale){
            let data = new FormData();
            data.append('locale',locale);

            $.ajax({
                method: 'POST',
                url: '/admin/portfolios/get-translations',
                data: data,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': _token},
                error:function () {
                }
            }).done(function (data) {
                console.log(data);
                translationSelect.empty();
                translationSelect.append($('<option>', {
                    value: '',
                    text: 'انتخاب نشده'
                }));
                $(data).each(function (index,item) {
                    translationSelect.append($('<option>', {
                        value: item['id'],
                        text: item['title']
                    }));
                });

            }).always(function () {
            });
        }
    </script>
@endsection
