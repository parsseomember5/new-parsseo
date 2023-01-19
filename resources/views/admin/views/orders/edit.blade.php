@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">سفارش ها /</span> نمایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                {{-- order number --}}
                <div class="col-lg-3">
                    <label class="form-label" for="order_number">شماره سفارش</label>
                    <input type="text" class="form-control" value="{{ $order->order_number }}">
                </div>

                {{-- res number --}}
                <div class="col-lg-3">
                    <label class="form-label" for="res_number">شماره تراکنش</label>
                    <input type="text" class="form-control" value="{{ $order->res_number }}">
                </div>

                @if($order->discount)
                    {{-- discount --}}
                    <div class="col-lg-3">
                        <label class="form-label" for="discount">کد تخفیف</label>
                        <a class="btn btn-primary d-block" id="discount" href="{{ route('discounts.edit', $order->discount_id) }}">
                            {{ $order->discount->title }} <i class="bx bx-show me-1"></i>
                        </a>
                    </div>
                @endif

                {{-- status --}}
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label" for="status">وضعیت</label>
                        <select class="select2 form-select" id="status" name="status">
                            <option value="1" {{ $order->status ? 'selected' : '' }}>پرداخت موفق</option>
                            <option value="0" {{ !$order->status ? 'selected' : '' }}>پرداخت نشده</option>
                        </select>
                    </div>
                </div>

                {{-- notes --}}
                <div class="mb-3 col-12">
                    <label class="form-label" for="notes">توضیحات بیشتر</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3">{{$order->notes}}</textarea>
                </div>

                <div class="mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>اقلام سفارش</h2>
        </div>

        @if($order->items->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>محصول</th>
                    <th>تعداد</th>
                    <th>مبلغ نهایی (تومان)</th>
                    <th>تخفیف (تومان)</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($order->items as $k=>$item)
                    <tr>
                        <td style="max-width: 180px;white-space: normal">{{$k+1}}</td>
                        <td style="max-width: 180px;white-space: normal">
                            <a href="{{ route('products.edit', $item->product) }}" target="_blank">
                                <img src="{{ $item->product->getImage() }}" alt="image" class="rounded" style="width: 80px;">
                                <span>{{$item->product->title}}</span>
                            </a>
                        </td>
                        <td>x{{$item->count}}</td>
                        <td>{{number_format($item->total_price)}}</td>
                        <td>{{number_format($item->discount_price)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">بدون اقلام</div>
        @endif
</div>
@endsection

