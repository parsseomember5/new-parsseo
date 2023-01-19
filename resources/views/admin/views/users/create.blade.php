@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کاربران /</span> افزودن کاربر جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="name">نام و نام خانوادگی (ضروری)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>

                        {{-- phone --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="phone">موبایل (ضروری)</label>
                            <input type="tel" class="form-control" id="phone" maxlength="11" name="phone" value="{{old('phone')}}">
                        </div>

                        <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password">رمز عبور (ضروری)</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control text-start" dir="ltr" type="password" id="password" name="password" placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password_confirmation">تایید رمز عبور (ضروری)</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control text-start" dir="ltr" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>

                        {{-- avatar --}}
                        <div class="mb-3 col-lg-6">
                            <label for="avatar" class="form-label">تصویر آواتار</label>
                            <input class="form-control" type="file" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        {{-- is phone verified --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="is_phone_verified" name="is_phone_verified" {{old('is_phone_verified') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="is_phone_verified">تائید موبایل</label>
                                </div>
                            </div>
                        </div>

                        {{-- is email verified --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="is_email_verified" name="is_email_verified" {{old('is_email_verified') == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="is_email_verified">تائید ایمیل</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary submit-button">ذخیره کاربر</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
