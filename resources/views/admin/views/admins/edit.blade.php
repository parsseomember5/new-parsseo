@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">ادمین /</span> ویرایش
        </h4>
        <div>
            <a href="{{route('admins.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن کاربر جدید</span></span></a>
        </div>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('admins.update', $admin)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')

        <div class="card mb-4">
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <input type="hidden" name="remove_avatar_image" id="remove_avatar_image">
                    <img src="{{$admin->getAvatar()}}" alt="{{$admin->name}}" class="d-block rounded" height="100" width="100" id="avatarImage">
                    <div class="button-wrapper">
                        <label for="avatar" class="btn btn-secondary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="avatar" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg">
                        </label>
                        @if($admin->avatar != null)
                            <button type="button" class="btn btn-label-secondary account-image-reset mb-4 remove-image-file" data-url="{{$admin->avatar}}" image-id="avatarImage" input-id="remove_avatar_image">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">بازنشانی</span>
                            </button>
                        @endif
                        <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 5MB.</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="name" class="form-label">نام</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{old('name',$admin->name)}}" autofocus>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="email" class="form-label">ایمیل</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="email" name="email" value="{{old('email',$admin->email)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="mobile">شماره تلفن</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">IR (+98)</span>
                            <input type="text" id="mobile" name="mobile" value="{{old('mobile',$admin->mobile)}}" class="form-control text-start" dir="ltr">
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password">رمز عبور جدید</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control text-start" dir="ltr" type="password" id="password" name="password" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password_confirmation">تایید رمز عبور جدید</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control text-start" dir="ltr" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="bio">بیوگرافی</label>
                        <textarea type="text" id="bio" name="bio" class="form-control text-start">{{old('bio',$admin->bio)}}</textarea>
                    </div>
                </div>

            </div>
            <hr class="my-0">
            <h5 class="card-header">شبکه های اجتماعی</h5>

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="instagram" class="form-label">اینستاگرام</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="instagram" name="instagram" value="{{old('instagram',$admin->instagram)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="twitter" class="form-label">توییتر</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="twitter" name="twitter" value="{{old('twitter',$admin->twitter)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="facebook" class="form-label">فیس بوک</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="facebook" name="facebook" value="{{old('facebook',$admin->facebook)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="linkedin" name="linkedin" value="{{old('linkedin',$admin->linkedin)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telegram" class="form-label">تلگرام</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="telegram" name="telegram" value="{{old('telegram',$admin->telegram)}}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="dribbble" class="form-label">Dribbble</label>
                        <input class="form-control text-start" dir="ltr" type="text" id="dribbble" name="dribbble" value="{{old('dribbble',$admin->dribbble)}}">
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success me-2">ذخیره تغییرات</button>
                    <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">بازگشت</a>
                </div>
            </div>
        </div>
    </form>
@endsection
