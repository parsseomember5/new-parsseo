@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span>سامانه پیامکی
        </h4>
        @include('admin.includes.lang_switcher')
    </div>
    @include('admin.views.settings.nav')
    @include('admin.includes.alerts')
    <form action="{{route('settings.sms_update',$settings)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">عمومی</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="description" class="form-label">سامانه پیشفرض</label>
                            <select name="default_gateway" id="default_gateway" class="form-control">
                                <option value="">هیچکدام</option>
                                @foreach(\App\Models\SmsSetting::GATEWAYS as $k=>$item)
                                    <option value="{{ $k }}" {{ $settings->default == $k ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <hr class="my-0">
                <h5 class="card-header">سامانه کاوه نگار</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label for="kavenegar_token" class="form-label">توکن</label>
                            <input class="form-control" type="text" id="kavenegar_token" name="kavenegar_token"
                                   value="{{old('kavenegar_token',$settings->kavenegar_token)}}">
                        </div>

                        <div class="mb-3 col-lg-4">
                            <label for="kavenegar_pattern" class="form-label">عنوان پترن</label>
                            <input class="form-control" type="text" id="kavenegar_pattern" name="kavenegar_pattern"
                                   value="{{old('kavenegar_pattern',$settings->kavenegar_pattern)}}">
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
