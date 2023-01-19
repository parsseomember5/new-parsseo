@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">تراکنش های کیف پول کاربر ({{ $user->name }}) /</span> نمایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        @if($user->wallet->transactions->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نوع</th>
                    <th>مبلغ (تومان)</th>
                    <th>زمان تراکنش</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($user->wallet->transactions as $k=>$item)
                    <tr>
                        <td style="max-width: 180px;white-space: normal">{{$k+1}}</td>
                        <td>
                            @if($item->type=='deposit')
                                <span class="badge bg-label-success"><i class="bx bx-up-arrow-alt me-1"></i> افزایش موجودی </span>
                            @else
                                <span class="badge bg-label-danger"><i class="bx bxs-down-arrow-alt me-1"></i> برداشت </span>
                            @endif
                        </td>
                        <td>{{number_format($item->amount)}}</td>
                        <td>{{verta($item->created_at)->format('Y/m/d - (H:i)')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">خالی !</div>
        @endif

        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>

                <h6 class="mt-4">موجودی فعلی (تومان) : {{ number_format($user->wallet->balance) }}</h6>
            </div>
        </div>
    </div>
</div>
@endsection

