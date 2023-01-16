@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> نمونه‌کار ها
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات نمونه‌کار ها</h5>
                <form action="{{route('settings.portfolios_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="portfolios_uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="portfolios_uptitle" name="portfolios_uptitle"
                                       value="{{old('portfolios_uptitle',$settings->portfolios_uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="portfolios_title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="portfolios_title" name="portfolios_title"
                                       value="{{old('portfolios_title',$settings->portfolios_title)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="portfolios_count" class="form-label">تعداد نمایش</label>
                                <input class="form-control text-start" type="number" id="portfolios_count" name="portfolios_count"
                                       value="{{old('portfolios_count',$settings->portfolios_count)}}">
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
