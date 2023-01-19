@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">ادمین ها /</span> افزودن ادمین جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="card mb-4">
            <!-- Account -->
            <h5 class="card-header">تصویر آواتار</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <div class="button-wrapper">
                        <label for="avatar" class="btn btn-secondary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">ارسال تصویر </span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="avatar" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg">
                        </label>
                        <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <h5 class="card-header">اطلاعات</h5>

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="name" class="form-label">نام</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" autofocus>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="email" class="form-label">ایمیل</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="mobile">شماره تلفن</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">IR (+98)</span>
                            <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}" class="form-control text-start" dir="ltr">
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password">رمز عبور </label>
                        <div class="input-group input-group-merge">
                            <input class="form-control text-start" dir="ltr" type="password" id="password" name="password" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password_confirmation">تایید رمز عبور </label>
                        <div class="input-group input-group-merge">
                            <input class="form-control text-start" dir="ltr" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="bio">بیوگرافی</label>
                        <textarea type="text" id="bio" name="bio" class="form-control text-start">{{old('bio')}}</textarea>
                    </div>
                </div>

            </div>
            <hr class="my-0">
            <h5 class="card-header">شبکه های اجتماعی</h5>

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="instagram" class="form-label">اینستاگرام</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="instagram" name="instagram" value="{{old('instagram')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="twitter" class="form-label">توییتر</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="twitter" name="twitter" value="{{old('twitter')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="facebook" class="form-label">فیس بوک</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="facebook" name="facebook" value="{{old('facebook')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="linkedin" name="linkedin" value="{{old('linkedin')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telegram" class="form-label">تلگرام</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="telegram" name="telegram" value="{{old('telegram')}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="dribbble" class="form-label">Dribbble</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="dribbble" name="dribbble" value="{{old('dribbble')}}">
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success me-2">ذخیره ادمین</button>
                </div>
            </div>
        </div>
    </form>
@endsection
