@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">محصولات /</span> زباله‌دان
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('products.search.trash')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('products.trash')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('products.index')}}" class="btn btn-primary"><span><i class="bx bx-arrow-from-left me-sm-2"></i> <span class="d-none d-sm-inline-block">بازگشت به محصولات</span></span></a>
                <form action="{{route('products.trash.empty')}}" method="post" class="d-inline-block">
                    @csrf
                    <span class="btn btn-warning" id="btn-empty-trash"><span><i class="bx bx-trash-alt me-sm-2"></i> <span class="d-none d-sm-inline-block">خالی کردن سطل زبانه</span></span></span>
                </form>
            </div>
        </div>

        @if($products->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>نامک</th>
                    <th>اولویت نمایش</th>
                    <th>وضعیت</th>
                    <th>نویسنده</th>
                    <th>تگ ها</th>
                    <th>زبان</th>
                    <th>تعداد بازدید</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($products as $product)
                    <tr>
                        <td>
                            <form action="{{route('products.delete.force')}}" method="post" class="d-inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <span class="btn btn-danger btn-sm btn-fore-delete" data-alert-message="این محصول برای همیشه پاک خواهد شد!">حذف</span>
                            </form>
                            <form action="{{route('products.restore',$product->id)}}" method="post" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-label-success btn-sm">بازگردانی</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{$product->getImage()}}" target="_blank">
                                <img src="{{ $product->getImage() }}" alt="image" class="rounded" style="width: 80px;">
                            </a>
                        </td>
                        <td style="max-width: 180px;white-space: normal">{{$product->title}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$product->slug}}</td>
                        <td>{{$product->order}}</td>
                        <td>
                            @switch($product->status)
                                @case('published')
                                <span class="badge bg-label-success">منتشر شده</span>
                                @break
                                @case('pending')
                                <span class="badge bg-label-warning">در انتظار تایید</span>
                                @break
                                @case('draft')
                                <span class="badge bg-label-secondary">پیش نویس</span>
                                @break
                            @endswitch
                        </td>
                        <td>{{$product->author->name}}</td>
                        <td style="max-width: 150px;white-space: normal">
                            @if($product->tags->count() > 0)
                                @foreach($product->tags as $tag)
                                    <a class="badge bg-label-primary" href="#">{{$tag->title}}</a>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$product->locale}}</td>
                        <td>{{views($product)->count()}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$products->links()}}
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
