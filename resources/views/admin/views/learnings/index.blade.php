@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">دسترسی کاربر به محصول /</span> لیست
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <form class="d-flex align-items-center col-6 justify-content-between" action="{{route('learnings.search')}}">
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                </div>
                &nbsp;
                <div class="mr-4 w-100" title="انتخاب محصول">
                    <select class="select2 form-control" id="product_id" name="product_id" data-allow-clear="true">
                        <option value="all">محصول (همه)</option>
                        @foreach(\App\Models\Product::all() as $item)
                            <option value="{{$item->id}}" {{ isset($product_id)  && $product_id==$item->id ? 'selected' : '' }}>
                                {{$item->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
            @if(isset($query))
                <a href="{{route('learnings.index')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
            @endif

            <div class="ms-auto text-end primary-font pt-3 pt-md-0 col-6">
                <a href="{{route('learnings.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن رکورد جدید</span></span></a>
            </div>
        </div>

        @if($learnings->count() > 0)
            <table class="table table-striped table-hover" style="min-height: 200px">
                <thead>
                <tr>
                    <th>عملیات</th>
                    <th>کاربر</th>
                    <th>محصول</th>
                    <th>پشتیبانی باقی مانده</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($learnings as $learning)
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item delete-row" href="javascript:void(0);" data-alert-message="دسترسی کاربر به محصول برای همیشه از بین میرود."><i class="bx bx-trash me-1"></i>
                                        <form action="{{route('learnings.destroy',$learning)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <span>حذف</span>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td style="max-width: 180px;white-space: normal">{{$learning->user->name . ' - ' . $learning->user->phone}}</td>
                        <td style="max-width: 180px;white-space: normal">{{$learning->product->title}}</td>
                        <td>{{number_format($learning->daysLeft())}} روز </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
        @endif
        {{$learnings->links()}}
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
