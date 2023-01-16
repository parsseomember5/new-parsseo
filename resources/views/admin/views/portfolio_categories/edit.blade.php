@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">دسته بندی نمونه کار ها /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('portfolio-categories.update',$portfolioCategory)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$portfolioCategory->title)}}">
                </div>
                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="slug">نامک</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$portfolioCategory->slug)}}">
                </div>

                {{-- description --}}
                <div class="mb-3">
                    <input type="hidden" name="description" id="description" value="{{old('description',$portfolioCategory->description)}}">
                    <label for="body" class="form-label">توضیحات</label>
                    <div id="main-editor" data-input-id="description">{!! old('description',$portfolioCategory->description) !!}</div>
                </div>

                {{-- meta description --}}
                <div class="mb-3">
                    <label class="form-label" for="meta_description">متای توضیحات</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description',$portfolioCategory->meta_description)}}</textarea>
                </div>

                {{-- canonical --}}
                <div class="mb-3">
                    <label class="form-label" for="canonical">تگ canonical</label>
                    <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical',$portfolioCategory->canonical)}}">
                </div>

                <div class="mb-3 mb-3">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured" {{$portfolioCategory->featured ? 'checked' : ''}}>
                        <label class="form-check-label" for="featured">دسته ویژه</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
