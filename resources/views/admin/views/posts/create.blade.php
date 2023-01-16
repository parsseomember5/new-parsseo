@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">مقالات /</span> افزودن مقاله جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">عنوان (ضروری)</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                        </div>

                        {{-- excerpt --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="excerpt">خلاصه</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{old('excerpt')}}</textarea>
                        </div>

                        {{-- image --}}
                        <div class="mb-3 col-lg-6">
                            <label for="image" class="form-label">تصویر اصلی مقاله</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>


                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body')}}">
                            <label for="body" class="form-label">محتوای مقاله</label>
                            <div id="main-editor" data-input-id="body">{!! old('body') !!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    {{-- category --}}
                    <div class="mb-3">
                        <label class="form-label" for="categories">دسته بندی ها</label>
                        <select class="select2 form-select" id="categories" name="categories[]" data-allow-clear="true" multiple>
                            @foreach(\App\Models\PostCategory::all() as $category)
                                <option value="{{$category->id}}" @if(old('categories')){{ in_array($category->id,old('categories')) ? 'selected' : '' }}@endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- keywords --}}
                    <div class="mb-3">
                        <label for="keywords" class="form-label">کلمات کلیدی</label>
                        <input id="keywords" class="form-control tagify-select" name="keywords" value="{{old('keywords')}}">
                        <small class="d-block text-muted mt-1">کلمه را بنوسید و سپس اینتر بزنید</small>
                    </div>

                    <div class="row">
                        {{-- locale --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="locale">زبان مقاله</label>
                            <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                                <option value="fa" {{ old('locale') == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                                <option value="en" {{ old('locale') == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                            </select>
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

                    {{-- author --}}
                    <div class="mb-3">
                        <label class="form-label" for="author_id">نویسنده</label>
                        <select class="select2 form-select" id="author_id" name="author_id" data-allow-clear="true">
                            @foreach(\App\Models\Admin::all() as $admin)
                                <option value="{{$admin->id}}" {{ old('author_id') == $admin->id ? 'selected' : '' }}>{{$admin->name . ' (' .$admin->email. ')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row align-items-end">
                        {{-- order --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="order">اولویت نمایش</label>
                                <input type="number" class="form-control" dir="ltr" id="order" name="order" value="{{old('order',0)}}">
                            </div>
                        </div>

                        {{-- status --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="status">وضعیت</label>
                                <select class="select2 form-select" id="status" name="status">
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>منتشر شده</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>پیش نویس</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>در انتظار تایید</option>
                                </select>
                            </div>
                        </div>

                        {{-- featured --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="featured" name="featured" {{old('featured') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="featured">مقاله ویژه</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary submit-button">ذخیره مقاله</button>
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
                url: '/admin/posts/get-translations',
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
