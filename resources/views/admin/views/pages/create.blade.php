@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">برگه ها /</span> افزودن برگه جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data" class="row">
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

                        {{-- image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">تصویر اصلی برگه</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body')}}">
                            <label for="body" class="form-label">محتوای برگه</label>
                            <div id="main-editor" data-input-id="body">{!! old('body') !!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row align-items-end">

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

                        {{-- submit--}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary submit-button">ذخیره برگه</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>


@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
