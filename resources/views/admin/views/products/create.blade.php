@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">محصولات /</span> افزودن محصول جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="row">
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

                        {{-- Spotplayer Course Id --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="spotplayer_course_id">آی‌دی دوره در اسپات‌پلیر (اختیاری)</label>
                            <input type="text" class="form-control" id="spotplayer_course_id" name="spotplayer_course_id" value="{{old('spotplayer_course_id')}}">
                        </div>

                        {{-- Kind --}}
                        <div class="mb-3 col-lg-3">
                            <label class="form-label" for="kind">نوع محصول</label>
                            <select class="form-select" id="kind" name="kind" data-allow-clear="true">
                                @foreach(\App\Models\Product::KIND as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- State --}}
                        <div class="mb-3 col-lg-3">
                            <label class="form-label" for="state">وضعیت برگزاری</label>
                            <select class="form-select" id="state" name="state" data-allow-clear="true">
                                @foreach(\App\Models\Product::STATE as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Level --}}
                        <div class="mb-3 col-lg-3">
                            <label class="form-label" for="level">سطح</label>
                            <select class="form-select" id="level" name="level" data-allow-clear="true" required>
                                <option value="">انتخاب نمائید</option>
                                @foreach(\App\Models\Product::getLevels() as $levelKey => $levelValue)
                                    <option value="{!!$levelKey!!}" {{ old('level')==$levelKey ? 'selected' : '' }}>{!!$levelValue!!}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Time --}}
                        <div class="mb-3 col-lg-3">
                            <label class="form-label" for="time">مدت زمان</label>
                            <input type="text" class="form-control" id="time" name="time" value="{{old('time')}}">
                        </div>

                        {{-- excerpt --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="excerpt">خلاصه</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{old('excerpt')}}</textarea>
                        </div>

                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body')}}">
                            <label for="body" class="form-label">محتوای محصول</label>
                            <div id="main-editor" data-input-id="body">{!! old('body') !!}</div>
                        </div>

                        {{-- Child --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="child">محصولات فرزند (در صورت تبدیل به پکیج جامع)</label>
                            <select class="form-select select2 select2-show-search" id="child" multiple name="child[]" data-allow-clear="true">
                                @foreach(\App\Models\Product::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- offPrice --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="video">آدرس ویدئو (اختیاری)</label>
                            <input type="text" class="form-control" id="video" name="video" value="{{old('video')}}">
                        </div>

                        {{-- Script --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="script">جاواسکریپت اضافی</label>
                            <textarea class="form-control" id="script" name="script">{{old('script')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            {{-- price --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h4>قیمت گذاری</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Type --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="type">نوع فروش</label>
                            <select class="form-select" id="type" name="type" data-allow-clear="true">
                                @foreach(\App\Models\Product::TYPE as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Support --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="support">تعداد روز پشتبانی</label>
                            <input type="number" class="form-control" dir="ltr" id="support" name="support" value="{{old('support',0)}}">
                        </div>

                        {{-- Price --}}
                        <div class="mb-3">
                            <label class="form-label" for="price">قیمت اصلی (تومان)</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}">
                        </div>

                        {{-- offPrice --}}
                        <div class="mb-3">
                            <label class="form-label" for="offPrice">قیمت تخفیف خورده (تومان)</label>
                            <input type="number" class="form-control" id="offPrice" name="offPrice" value="{{old('offPrice')}}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- files --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h4>فایل ها</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">تصویر اصلی محصول</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        {{-- cover --}}
                        <div class="mb-3">
                            <label for="cover" class="form-label">کاور ویدئو معرفی (اختیاری)</label>
                            <input class="form-control" type="file" id="cover" name="cover" accept="image/*">
                        </div>

                        {{-- headlines_pdf --}}
                        <div class="mb-3">
                            <label for="headlines_pdf" class="form-label">فایل سرفصل ها (اختیاری)</label>
                            <input class="form-control" type="file" id="headlines_pdf" name="headlines_pdf" accept="">
                        </div>
                    </div>
                </div>
            </div>

            {{-- seo --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h4>سئو</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- H1 --}}
                        <div class="mb-3 col-lg-12">
                            <label class="form-label" for="h1">عنوان H1</label>
                            <input type="text" class="form-control" id="h1" name="h1" value="{{old('h1')}}">
                        </div>

                        {{-- canonical --}}
                        <div class="mb-3">
                            <label class="form-label" for="canonical">تگ canonical</label>
                            <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical')}}">
                        </div>

                        {{-- H2 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="h2">عنوان H2 (اختیاری)</label>
                            <input type="text" class="form-control" id="h2" name="h2" value="{{old('h2')}}">
                        </div>

                        {{-- H3 --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="h3">عنوان H3 (اختیاری)</label>
                            <input type="text" class="form-control" id="h3" name="h3" value="{{old('h3')}}">
                        </div>

                        {{-- sitemap_priority --}}
                        <div class="mb-3 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="sitemap_priority">اولویت در sitemap</label>
                                <input type="number" step="0.1" min="0.5" max="1" class="form-control" dir="ltr" id="sitemap_priority" name="sitemap_priority" value="{{old('sitemap_priority')}}">
                            </div>
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                        </div>

                        {{-- meta description --}}
                        <div class="mb-3">
                            <label class="form-label" for="meta_description">متای توضیحات</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- Tags --}}
                        <div class="mb-3">
                            <label class="form-label" for="tags">تگ ها</label>
                            <select class="form-select select2 select2-show-search" id="tags" multiple name="tags[]" data-allow-clear="true">
                                @foreach(\Spatie\Tags\Tag::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>


                    {{-- modal
                    <div class="mb-3">
                        <label class="form-label" for="modal_id">انتخاب مدال (اختیاری)</label>
                        <select class="select2 form-select" id="modal_id" name="modal_id" data-allow-clear="true">
                            @foreach(\App\Models\Modal::all() as $modal)
                                <option value="{{$modal->id}}" {{ old('modal_id')==$modal->id ? 'selected' : '' }}>{{$modal->title}}</option>
                            @endforeach
                        </select>
                    </div>--}}

                    {{-- Recommendeds --}}
                    <div class="mb-3">
                        <label class="form-label" for="recommendeds">محصولات پیشنهادی</label>
                        <select class="select2 form-select" id="recommendeds" multiple name="recommendeds[]" data-allow-clear="true">
                            @if(old('recommendeds'))
                                @foreach(\App\Models\Product::all() as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        {!! in_array($item->id, old('recommendeds')) ? 'selected' : '' !!}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            @else
                                @foreach(\App\Models\Product::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    {{--
                    <div class="row">
                         locale
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="locale">زبان محصول</label>
                            <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                                <option value="fa" {{ old('locale') == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                                <option value="en" {{ old('locale') == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                            </select>
                        </div>

                         translation
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                            <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                                <option value="" selected>انتخاب نشده</option>
                            </select>
                        </div>
                    </div>
                  --}}

                    {{-- author --}}
                    <div class="mb-3">
                        <label class="form-label" for="author_id">نویسنده</label>
                        <select class="select2 form-select" id="author_id" name="author_id" data-allow-clear="true">
                            @foreach(\App\Models\Admin::all() as $admin)
                                <option value="{{$admin->id}}" {{ old('author_id') == $admin->id ? 'selected' : '' }}>{{$admin->name . ' (' .$admin->email. ')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Teacher --}}
                    <div class="mb-3 col-lg-6">
                        <label class="form-label" for="admin_id">صاحب اثر (مدرس)</label>
                        <select class="form-select select2 select2-show-search" id="admin_id" name="admin_id" data-allow-clear="true" required>
                            <option value="">انتخاب نمائید</option>
                            @foreach(\App\Models\Admin::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->email . ' - ' . $item->name }}</option>
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

                        {{-- isSpecial --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="isSpecial" name="isSpecial" {{old('isSpecial') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="isSpecial">ویژه</label>
                                </div>
                            </div>
                        </div>

                        {{-- isNew --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="isNew" name="isNew" {{old('isNew') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="isNew">جدید</label>
                                </div>
                            </div>
                        </div>

                        {{-- is_coming_soon --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="is_coming_soon" name="is_coming_soon" {{old('is_coming_soon') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="is_coming_soon">به‌زودی</label>
                                </div>
                            </div>
                        </div>

                        {{-- isBest --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="isBest" name="isBest" {{old('isBest') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="isBest">نمایش در سایدبار</label>
                                </div>
                            </div>
                        </div>

                        {{-- is_coming_soon --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="isFooter" name="isFooter" {{old('isFooter') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="isFooter">پر فروش</label>
                                </div>
                            </div>
                        </div>

                        {{-- is_coming_soon --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="isCopyright" name="isCopyright" {{old('isCopyright') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="isCopyright">کپی رایت</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary submit-button">ذخیره محصول</button>
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
                url: '/admin/products/get-translations',
                data: data,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': _token},
                error:function () {
                }
            }).done(function (data) {
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
