@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کامنت ها /</span> لیست
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('comments.search')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('comments.index')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('comments.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن رکورد جدید</span></span></a>
            </div>
        </div>

        @if($comments->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>کاربر</th>
                    <th>ادمین</th>
                    <th>نوع</th>
                    <th>آیتم مربوطه</th>
                    <th>وضعیت</th>
                    <th>زمان</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($comments as $comment)
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('comments.edit',$comment)}}"><i class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    <a class="dropdown-item delete-row" href="javascript:void(0);" data-alert-message="کامنت برای همیشه حذف میشود."><i class="bx bx-trash me-1"></i>
                                        <form action="{{route('comments.destroy',$comment)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <span>حذف</span>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td style="max-width: 180px;white-space: normal">{{$comment->user ? $comment->user->name : '-'}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$comment->admin ? $comment->admin->name : '-'}}</td>
                        <td>{{$comment->getType()}}</td>
                        <td>{{$comment->getItem()}}</td>
                        <td>
                            @if($comment->status)
                                <span class="badge bg-label-success">تائید شده</span>
                            @else
                                <span class="badge bg-label-danger">تائید نشده</span>
                            @endif
                        </td>
                        <td>{{verta($comment->created_at)->format('Y/m/d - (H:i)')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$comments->links()}}
    </div>
@endsection
