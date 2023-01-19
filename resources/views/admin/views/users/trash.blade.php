@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کاربران /</span> زباله‌دان
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('users.search.trash')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('users.trash')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('users.index')}}" class="btn btn-primary"><span><i class="bx bx-arrow-from-left me-sm-2"></i> <span class="d-none d-sm-inline-block">بازگشت به کاربران</span></span></a>
                <form action="{{route('users.trash.empty')}}" method="post" class="d-inline-block">
                    @csrf
                    <span class="btn btn-warning" id="btn-empty-trash"><span><i class="bx bx-trash-alt me-sm-2"></i> <span class="d-none d-sm-inline-block">خالی کردن سطل زبانه</span></span></span>
                </form>
            </div>
        </div>

        @if($users->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>آواتار</th>
                    <th>نام</th>
                    <th>موبایل</th>
                    <th>ایمیل</th>
                    <th>وضعیت موبایل</th>
                    <th>وضعیت ایمیل</th>
                    <th>موجودی کیف پول (تومان)</th>
                    <th>تاریخ ثبت نام</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($users as $user)
                    <tr>
                        <td>
                            <form action="{{route('users.delete.force')}}" method="post" class="d-inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <span class="btn btn-danger btn-sm btn-fore-delete" data-alert-message="این کاربر برای همیشه پاک خواهد شد!">حذف</span>
                            </form>
                            <form action="{{route('users.restore',$user->id)}}" method="post" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-label-success btn-sm">بازگردانی</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{$user->getAvatar()}}" target="_blank">
                                <img src="{{$user->getAvatar()}}" alt="image" class="rounded" style="width: 80px;">
                            </a>
                        </td>
                        <td style="max-width: 180px;white-space: normal">{{$user->name}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$user->phone}}</td>
                        <td>{{$user->email ?? '-'}}</td>
                        <td>
                            @if($user->phone_verified_at)
                                <span class="badge bg-label-success">تائید شده</span>
                            @else
                                <span class="badge bg-label-danger">تائید نشده</span>
                            @endif
                        </td>
                        <td>
                            @if($user->email_verified_at)
                                <span class="badge bg-label-success">تائید شده</span>
                            @else
                                <span class="badge bg-label-danger">تائید نشده</span>
                            @endif
                        </td>
                        <td>{{number_format($user->wallet->balance)}}</td>
                        <td>{{verta($user->created_at)->format('Y/m/d')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$users->links()}}
    </div>
@endsection
