@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">لوگوی مشتریان /</span> مورد جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('logos.store')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="link">لینک</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{old('link')}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="url">تصویر</label>
                    <input type="file" class="form-control" id="url" name="url">
                </div>
                <div class="mb-3 col-lg-2">
                    <label for="order" class="form-label">ترتیب نمایش</label>
                    <input class="form-control" type="number" id="order" name="order" value="{{old('order')}}">
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
