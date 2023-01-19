@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کد های تخفیف /</span> زباله‌دان
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('discounts.search.trash')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('discounts.trash')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('discounts.index')}}" class="btn btn-primary"><span><i class="bx bx-arrow-from-left me-sm-2"></i> <span class="d-none d-sm-inline-block">بازگشت به تخفیفات</span></span></a>
                <form action="{{route('discounts.trash.empty')}}" method="post" class="d-inline-block">
                    @csrf
                    <span class="btn btn-warning" id="btn-empty-trash"><span><i class="bx bx-trash-alt me-sm-2"></i> <span class="d-none d-sm-inline-block">خالی کردن سطل زبانه</span></span></span>
                </form>
            </div>
        </div>

        @if($discounts->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>کد</th>
                    <th>درصد</th>
                    <th>ظرفیت کل</th>
                    <th>ظرفیت مصرف شده</th>
                    <th>میزان فروش</th>
                    <th>وضعیت</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($discounts as $discount)
                    <tr>
                        <td>
                            <form action="{{route('discounts.delete.force')}}" method="post" class="d-inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{$discount->id}}">
                                <span class="btn btn-danger btn-sm btn-fore-delete" data-alert-message="این کد تخفیف برای همیشه پاک خواهد شد!">حذف</span>
                            </form>
                            <form action="{{route('discounts.restore',$discount->id)}}" method="post" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-label-success btn-sm">بازگردانی</button>
                            </form>
                        </td>

                        <td style="max-width: 180px;white-space: normal">{{$discount->title}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$discount->code}}</td>
                        <td>{{$discount->discount}}</td>
                        <td>{{$discount->capacity}}</td>
                        <td>{{$discount->reserved}}</td>
                        <td>{{number_format($discount->total_sell_price)}}</td>
                        <td>
                            @if($discount->status)
                                <span class="badge bg-label-success">منتشر شده</span>
                            @else
                                <span class="badge bg-label-secondary">پیش نویس</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$discounts->links()}}
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
