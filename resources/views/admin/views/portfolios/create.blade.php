@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">نمونه‌کارها /</span> افزودن نمونه‌کار جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('portfolios.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- name --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="name">نام پروژه (ضروری)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">عنوان (ضروری)</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>

                        {{-- categories --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="categories">دسته بندی ها</label>
                            <select class="select2 form-select" id="categories" name="categories[]" data-allow-clear="true" multiple>
                                @foreach(\App\Models\PortfolioCategory::all() as $category)
                                    <option value="{{$category->id}}" @if(old('categories')){{ in_array($category->id,old('categories')) ? 'selected' : '' }}@endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک (اختیاری)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                        </div>

                        {{-- website --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="website">لینک سایت</label>
                            <input type="text" dir="ltr" class="form-control" id="website" name="website" value="{{old('website')}}">
                        </div>

                        {{-- short description --}}
                        <div class="mb-3 col-12">
                            <label for="short_description" class="form-label">توضیحات کوتاه</label>
                            <textarea rows="3" class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                        </div>

                        {{-- image --}}
                        <div class="mb-3 col-lg-6">
                            <label for="image" class="form-label">تصویر اصلی</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        {{-- scroll image --}}
                        <div class="mb-3 col-lg-6">
                            <label for="image" class="form-label">تصویر اسکرولی</label>
                            <input class="form-control" type="file" id="scroll_image" name="scroll_image">
                        </div>

                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body')}}">
                            <label for="body" class="form-label">محتوای نمونه‌کار</label>
                            <div id="main-editor" data-input-id="body">{!! old('body') !!}</div>
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
                            <input type="text" class="form-control" id="box1_title" name="box1_title" value="{{old('box1_title')}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box1_value">مقدار باکس اول</label>
                            <input type="text" class="form-control" id="box1_value" name="box1_value" value="{{old('box1_value')}}">
                        </div>

                        {{-- box 2 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box2_title">عنوان باکس دوم</label>
                            <input type="text" class="form-control" id="box2_title" name="box2_title" value="{{old('box2_title')}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box2_value">مقدار باکس دوم</label>
                            <input type="text" class="form-control" id="box2_value" name="box2_value" value="{{old('box2_value')}}">
                        </div>

                        {{-- box 3 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box3_title">عنوان باکس سوم</label>
                            <input type="text" class="form-control" id="box3_title" name="box3_title" value="{{old('box3_title')}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="box3_value">مقدار باکس سوم</label>
                            <input type="text" class="form-control" id="box3_value" name="box3_value" value="{{old('box3_value')}}">
                        </div>
                    </div>


                    <hr>

                    <div class="row">
                        {{-- locale --}}
                        <div class="mb-3 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="locale">زبان نمونه کار</label>
                                <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                                    <option value="fa" {{ old('locale') == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                                    <option value="en" {{ old('locale') == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                                </select>
                            </div>
                        </div>

                        {{-- translation --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                            <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                                <option value="" selected>انتخاب نشده</option>
                            </select>
                        </div>
                    </div>

                    {{-- meta description --}}
                    <div class="mb-3">
                        <label class="form-label" for="meta_description">متای توضیحات</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description')}}</textarea>
                    </div>

                    {{-- canonical --}}
                    <div class="mb-3">
                        <label class="form-label" for="canonical">تگ canonical</label>
                        <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical')}}">
                    </div>

                    {{-- features --}}
                    <div class="mb-3">
                        <label for="features" class="form-label">لیست ویژگی ها</label>
                        <input id="features" class="form-control tagify-select" name="features" value="{{old('features')}}">
                        <small class="d-block text-muted mt-1">جمله را بنوسید و سپس اینتر بزنید</small>
                    </div>

                    {{-- order --}}
                    <div class="mb-3">
                        <label class="form-label" for="order">اولویت نمایش</label>
                        <input type="number" class="form-control" dir="ltr" id="order" name="order" value="{{old('order',0)}}">
                        <small class="d-block text-muted mt-1">اولویت بالاتر جلوتر نمایش داده میشود.</small>
                    </div>

                    {{-- featured --}}
                    <div class="mb-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" {{old('featured') == 'on' ? 'checked' :''}}>
                            <label class="form-check-label" for="featured">نمونه‌کار ویژه</label>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary submit-button">ذخیره نمونه‌کار</button>
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
