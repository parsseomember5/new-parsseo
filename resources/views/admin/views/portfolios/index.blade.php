@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">نمونه‌کارها /</span> لیست
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('portfolios.search')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('portfolios.index')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>
            <div class="ms-auto text-end primary-font pt-3 pt-md-0">
                <a href="{{route('portfolios.trash')}}" class="btn btn-label-secondary"><span><i class="bx bx-trash me-sm-2"></i> <span class="d-none d-sm-inline-block">زباله‌دان</span></span></a>
                <a href="{{route('portfolios.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن رکورد جدید</span></span></a>
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
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('portfolio.show',$portfolio)}}"><i class="bx bx-show me-1"></i> مشاهده</a>
                                        <a class="dropdown-item" href="{{route('portfolios.edit',$portfolio)}}"><i class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                        <a class="dropdown-item delete-row" href="javascript:void(0);" data-alert-message="بعد از حذف به زباله‌دان منتقل میشود."><i class="bx bx-trash me-1"></i>
                                            <form action="{{route('portfolios.destroy',$portfolio)}}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <span>حذف</span>
                                            </form>
                                        </a>
                                    </div>
                                </div>
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
