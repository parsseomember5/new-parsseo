@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">تگ ها /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('chapters.update',$chapter)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="fa_title">عنوان فارسی</label>
                    <input type="text" class="form-control" id="fa_title" name="fa_title" value="{{old('fa_title', $chapter->fa_title)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="en_title">عنوان En</label>
                    <input type="text" class="form-control" id="en_title" name="en_title" value="{{old('en_title', $chapter->en_title)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="has_children">دارای زیر سرفصل می باشد؟</label>
                    <select class="form-select" id="has_children" data-allow-clear="true">
                        <option value="">انتخاب کنید</option>
                        <option value="1" {{ !is_null($chapter->parent_id) ? 'selected' : '' }}>بله</option>
                        <option value="0" {{ is_null($chapter->parent_id) ? 'selected' : '' }}>خیر</option>
                    </select>
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="type">نوع سرفصل</label>
                    <select class="form-select" id="type" name="type" data-allow-clear="true">
                        @foreach(\App\Models\Chapter::TYPE as $key => $item)
                            <option value="{{ $key }}" {{ $chapter->type == $key ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="product_id">محصول مورد نظر</label>
                    <select class="form-select select2 select2-show-search" id="product_id" name="product_id" data-allow-clear="true">
                        <option value="">انتخاب کنید...</option>
                        @foreach(\App\Models\Product::all() as $item)
                            <option value="{{ $item->id }}" {{ $chapter->product_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-lg-3 parent-id-div" @if(is_null($chapter->parent_id)) style="display: none;" @endif>
                    <label class="form-label" for="parent_id">انتخاب سرفصل</label>
                    <select class="form-select" id="parent_id" name="parent_id" data-allow-clear="true">
                        <option value="">انتخاب کنید</option>
                        @foreach($chapter->product->headlines as $headline)
                            <option value="{{ $headline->id }}" {{ $chapter->parent_id == $headline->id }}>{{ $headline->order . '- ' . $headline->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="time">مدت زمان</label>
                    <input type="text" class="form-control" id="time" name="time" value="{{old('time', $chapter->time)}}">
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label" for="order">اولویت نمایش</label>
                        <input type="number" class="form-control" dir="ltr" id="order" name="order" value="{{old('order', $chapter->order)}}">
                    </div>
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="status">وضعیت</label>
                    <select class="select2 form-select" id="status" name="status">
                        <option value="published" {{ $chapter->status == 'published' ? 'selected' : '' }}>منتشر شده</option>
                        <option value="draft" {{ $chapter->status == 'draft' ? 'selected' : '' }}>پیش نویس</option>
                        <option value="pending" {{ $chapter->status == 'pending' ? 'selected' : '' }}>در انتظار تایید</option>
                    </select>
                </div>

                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label" for="url">آدرس ویدیو</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{old('url', $chapter->url)}}">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label" for="file">آدرس فایل</label>
                        <input type="text" class="form-control" id="file" name="file" value="{{old('file', $chapter->file)}}">
                    </div>
                </div>

                {{-- body --}}
                <div class="mb-3 col-lg-12">
                    <input type="hidden" name="body" id="body" value="{{old('body', $chapter->body)}}">
                    <label for="body" class="form-label">توضیحات اضافی</label>
                    <div id="main-editor" data-input-id="body">{!! $chapter->body !!}</div>
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
