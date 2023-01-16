@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">لوگو مشتریان /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('logos.update',$logo)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-5">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$logo->title)}}">
                </div>
                <div class="mb-3 col-lg-5">
                    <label class="form-label" for="link">لینک</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{old('link')}}">
                </div>
                <div class="mb-3 col-lg-2">
                    <label for="order" class="form-label">ترتیب نمایش</label>
                    <input class="form-control" type="number" id="order" name="order" value="{{old('order',$logo->order)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="url" class="form-label">تصویر جدید</label>
                    <input class="form-control" type="file" id="url" name="url">
                </div>
                @if($logo->url)
                    <div class="col-lg-2 mb-3">
                        <input type="hidden" id="remove_url" name="remove_url">
                        <div class="pt-4">
                            <a href="{{$logo->getImage()}}" target="_blank">
                                <img src="{{$logo->getImage()}}" alt="image" class="w-px-40 h-auto rounded" id="logoImage">
                            </a>
                            <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$logo->url}}"
                                  input-id="remove_url" image-id="logoImage"><i class="bx bx-trash"></i></span>
                        </div>
                    </div>
                @endif
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
