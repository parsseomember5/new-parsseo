@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span>درگاه پرداخت
        </h4>
        @include('admin.includes.lang_switcher')
    </div>
    @include('admin.views.settings.nav')
    @include('admin.includes.alerts')
    <form action="{{route('settings.gateways_update',$settings)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">عمومی</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="description" class="form-label">درگاه پیشفرض</label>
                            <select name="default_gateway" id="default_gateway" class="form-control">
                                <option value="">هیچکدام</option>
                                @foreach(\App\Models\GatewaySetting::GATEWAYS as $k=>$item)
                                    <option value="{{ $k }}" {{ $settings->default_gateway == $k ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-9">
                            <label for="description" class="form-label">توضیحات</label>
                            <input class="form-control" type="text" id="description" name="description"
                                   value="{{old('description',$settings->description)}}">
                        </div>
                    </div>
                </div>


                <hr class="my-0">
                <h5 class="card-header">درگاه زرین پال</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label for="zarinpal_merchant" class="form-label">مرچنت آیدی</label>
                            <input class="form-control" type="text" id="zarinpal_merchant" name="zarinpal_merchant"
                                   value="{{old('zarinpal_merchant',$settings->zarinpal_merchant)}}">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success me-2 submit-button">ذخیره تغییرات</button>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">انصراف</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
