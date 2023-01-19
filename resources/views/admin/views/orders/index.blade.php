@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">سفارش ها /</span> لیست
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('orders.search')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('orders.index')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
        </div>

        @if($orders->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>کاربر</th>
                    <th>شماره سفارش</th>
                    <th>ترمینال</th>
                    <th>مبلغ نهایی (تومان)</th>
                    <th>اقلام سفارش</th>
                    <th>وضعیت</th>
                    <th>زمان</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('orders.show',$order)}}"><i class="bx bx-show-alt me-1"></i> نمایش</a>
                                    <a class="dropdown-item delete-row" href="javascript:void(0);" data-alert-message="سفارش برای همیشه حذف میشود."><i class="bx bx-trash me-1"></i>
                                        <form action="{{route('orders.destroy',$order)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <span>حذف</span>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td style="max-width: 180px;white-space: normal">{{$order->user->name . ' - ' . $order->user->phone}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$order->order_number}}</td>
                        <td>{{\App\Models\Order::TERMINAL[$order->terminal]}}</td>
                        <td>{{number_format($order->total_price)}}</td>
                        <td>
                            @if($order->items->count() > 0)
                                @foreach($order->items as $item)
                                    <a class="badge bg-label-primary" href="{{route('products.edit',$item->product)}}">{{$item->product->title}}</a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($order->status)
                                <span class="badge bg-label-success">پرداخت موفق!</span>
                            @else
                                <span class="badge bg-label-danger">پرداخت نشده</span>
                            @endif
                        </td>
                        <td>{{verta($order->created_at)->format('Y/m/d - (H:i)')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$orders->links()}}
    </div>
@endsection
