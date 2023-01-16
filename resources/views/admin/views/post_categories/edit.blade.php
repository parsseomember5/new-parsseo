@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">دسته بندی مقالات /</span> ویرایش
    </h4>
    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-body">
            <form action="{{route('post-categories.update',$postCategory)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$postCategory->title)}}">
                </div>
                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="slug">نامک</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$postCategory->slug)}}">
                </div>

                <div class="mb-3 col-lg-4">
                    <label for="image" class="form-label">تصویر جدید</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                @if($postCategory->image)
                    <div class="col-lg-3 mb-3">
                        <input type="hidden" id="remove_image" name="remove_image">
                        <div class="pt-4">
                            <a href="{{$postCategory->getImage()}}" target="_blank">
                                <img src="{{$postCategory->getImage()}}" alt="image" class="w-px-40 h-auto rounded" id="cat-image">
                            </a>
                            <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$postCategory->image}}"
                                  input-id="remove_image" image-id="cat-image"><i class="bx bx-trash"></i></span>
                        </div>
                    </div>
                @endif

                {{-- description --}}
                <div class="mb-3">
                    <input type="hidden" name="description" id="description" value="{{old('description',$postCategory->description)}}">
                    <label for="body" class="form-label">توضیحات</label>
                    <div id="main-editor" data-input-id="description">{!! old('description',$postCategory->description) !!}</div>
                </div>

                {{-- meta description --}}
                <div class="mb-3">
                    <label class="form-label" for="meta_description">متای توضیحات</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description',$postCategory->meta_description)}}</textarea>
                </div>

                {{-- canonical --}}
                <div class="mb-3">
                    <label class="form-label" for="canonical">تگ canonical</label>
                    <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical',$postCategory->canonical)}}">
                </div>

                <div class="mb-3 mb-3">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured" {{$postCategory->featured ? 'checked' : ''}}>
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
