@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">برگه ها /</span> ویرایش
        </h4>
        <a href="{{route('pages.create')}}" class="dt-button create-new btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن برگه جدید</span></span></a>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('pages.update',$page)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">عنوان (ضروری)</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title',$page->title)}}">
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$page->slug)}}">
                        </div>


                        {{-- image --}}
                        <div class="mb-3 col-lg-4">
                            <label for="image" class="form-label">تصویر جدید</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        @if($page->image)
                            <div class="col-lg-3 mb-3">
                                <input type="hidden" id="remove_image" name="remove_image">
                                <div class="pt-4">
                                    <a href="{{$page->getImage()}}" target="_blank">
                                        <img src="{{$page->getImage('thumb')}}" alt="image" class="w-px-40 h-auto rounded" id="post-image">
                                    </a>
                                    <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$page->image['original']}}"
                                          input-id="remove_image" image-id="post-image"><i class="bx bx-trash"></i></span>
                                </div>
                            </div>
                        @endif


                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body',$page->body)}}">
                            <label for="body" class="form-label">محتوای برگه</label>
                            <div id="main-editor" data-input-id="body">{!! old('body',$page->body) !!}</div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    {{-- meta description --}}
                    <div class="mb-3">
                        <label class="form-label" for="meta_description">متای توضیحات</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description',$page->meta_description)}}</textarea>
                    </div>

                    {{-- canonical --}}
                    <div class="mb-3">
                        <label class="form-label" for="canonical">تگ canonical</label>
                        <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical',$page->canonical)}}">
                    </div>

                    {{-- status --}}
                    <div class="mb-3">
                        <label class="form-label" for="status">وضعیت</label>
                        <select class="select2 form-select" id="status" name="status">
                            <option value="published" {{ $page->status == 'published' ? 'selected' : '' }}>منتشر شده</option>
                            <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>پیش نویس</option>
                            <option value="pending" {{ $page->status == 'pending' ? 'selected' : '' }}>در انتظار تایید</option>
                        </select>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-success submit-button">ذخیره تغییرات</button>
                        <button type="button" class="btn btn-label-danger"
                                id="edit-page-delete" data-model-id="{{$page->id}}" data-model="pages">
                            حذف این برگه
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
@endsection
