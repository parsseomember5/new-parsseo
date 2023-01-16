@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> مقالات
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات مقالات</h5>
                <form action="{{route('settings.articles_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="articles_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="articles_uptitle" name="articles_uptitle"
                                       value="{{old('articles_uptitle',$settings->articles_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="articles_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="articles_title" name="articles_title"
                                       value="{{old('articles_title',$settings->articles_title)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="articles_count" class="form-label">تعداد نمایش</label>
                                <input class="form-control text-start" type="number" id="articles_count" name="articles_count"
                                       value="{{old('articles_count',$settings->articles_count)}}">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success me-2 submit-button">ذخیره تغییرات</button>
                            <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">انصراف</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
