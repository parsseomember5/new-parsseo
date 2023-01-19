@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">کاربران /</span> ویرایش
        </h4>
        <div>
            <a href="{{route('users.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن کاربر جدید</span></span></a>
        </div>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="name">نام و نام خانوادگی (ضروری)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                        </div>

                        {{-- phone --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="phone">موبایل (ضروری)</label>
                            <input type="tel" class="form-control" id="phone" maxlength="11" name="phone" value="{{old('phone', $user->phone)}}">
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
                        {{-- email --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                        </div>

                        {{-- avatar --}}
                        <div class="mb-3 col-lg-6">
                            <label for="avatar" class="form-label">تصویر آواتار</label>
                            <input class="form-control" type="file" id="avatar" name="avatar">
                        </div>
                        @if($user->avatar)
                            <div class="col-lg-3 mb-3">
                                <input type="hidden" id="remove_image" name="remove_image">
                                <div class="pt-4">
                                    <a href="{{$user->getAvatar()}}" target="_blank">
                                        <img src="{{$user->getAvatar()}}" alt="image" class="w-px-40 h-auto rounded" id="users-image">
                                    </a>
                                    <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$user->avatar}}"
                                          input-id="remove_image" image-id="users-image"><i class="bx bx-trash"></i></span>
                                </div>
                            </div>
                        @endif
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
                                    <input class="form-check-input" type="checkbox" id="is_phone_verified" name="is_phone_verified" {{$user->phone_verified_at == 'on' ? 'checked' :''}}>
                                    <label class="form-check-label" for="is_phone_verified">تائید موبایل</label>
                                </div>
                            </div>
                        </div>

                        {{-- is email verified --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="is_email_verified" name="is_email_verified" {{$user->email_verified_at ? 'checked' :''}}>
                                    <label class="form-check-label" for="is_email_verified">تائید ایمیل</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-success submit-button">ذخیره تغییرات</button>


                        <button type="button" class="btn btn-label-danger" id="edit-page-delete"
                                data-alert-message="بعد از حذف به زباله‌دان منتقل میشود."
                                data-model-id="{{$user->id}}" data-model="userss">
                            حذف این کاربر
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
