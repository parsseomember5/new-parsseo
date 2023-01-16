@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">نمونه‌کارها /</span> زباله‌دان
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('portfolios.search.trash')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('portfolios.trash')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('portfolios.index')}}" class="btn btn-primary"><span><i class="bx bx-arrow-from-left me-sm-2"></i> <span class="d-none d-sm-inline-block">بازگشت به نمونه‌کارها</span></span></a>
                <form action="{{route('portfolios.trash.empty')}}" method="post" class="d-inline-block">
                    @csrf
                    <span class="btn btn-warning" id="btn-empty-trash"><span><i class="bx bx-trash-alt me-sm-2"></i> <span class="d-none d-sm-inline-block">خالی کردن زباله‌دان</span></span></span>
                </form>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            @if($portfolios->count() > 0)
                <table class="table table-striped table-hover" style="min-height: 200px">
                    <thead>
                    <tr>
                        <th>عملیات</th>
                        <th>تصویر</th>
                        <th>عنوان</th>
                        <th>نامک</th>
                        <th>اولویت نمایش</th>
                        <th>دسته بندی</th>
                        <th>زبان</th>
                        <th>تعداد بازدید</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>
                                <form action="{{route('portfolios.delete.force')}}" method="post" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$portfolio->id}}">
                                    <span class="btn btn-danger btn-sm btn-fore-delete" data-alert-message="این نمونه‌کار برای همیشه پاک خواهد شد!">حذف</span>
                                </form>
                                <form action="{{route('portfolios.restore',$portfolio->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-label-success btn-sm">بازگردانی</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{$portfolio->getImage()}}" target="_blank">
                                    <img src="{{$portfolio->getImage('thumb')}}" alt="image" class="rounded" style="width: 80px;">
                                </a>
                            </td>
                            <td>{{$portfolio->title}}</td>
                            <td>{{$portfolio->slug}}</td>
                            <td>{{$portfolio->order}}</td>

                            <td style="max-width: 150px;white-space: normal">
                                @if($portfolio->categories->count() > 0)
                                    @foreach($portfolio->categories as $cat)
                                        <a class="badge bg-label-primary" href="{{route('portfolio_category.show',$cat)}}">{{$cat->title}}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$portfolio->locale}}</td>
                            <td>{{views($portfolio)->count()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
            @endif
            {{$portfolios->links()}}
        </div>
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
