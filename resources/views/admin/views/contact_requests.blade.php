@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">درخواست های تماس /</span> لیست
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])

    <div class="card">
        <div class="card-header d-flex flex">
            <div class="d-flex align-items-center">
                <form action="{{route('contacts.search')}}">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="جستجو ..." aria-label="Search..." name="query" @if(isset($query)) value="{{$query}}" @endif>
                    </div>
                </form>
                @if(isset($query))
                    <a href="{{route('contacts.index')}}" class="btn btn-sm btn-secondary ms-3"><i class="bx bx-x"></i></a>
                @endif
            </div>

        </div>

        <div class="table-responsive text-nowrap">
            @if($requests->count() > 0)
                <table class="table table-striped table-hover" style="min-height: 200px">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>شماره</th>
                        <th>توضیحات</th>
                        <th>تاریخ ثبت</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($requests as $request)
                        <tr>
                            <td>{{$request->name}}</td>
                            <td>{{$request->phone}}</td>
                            <td style="max-width: 250px;white-space: normal;font-size: 14px">{{$request->message}}</td>
                            <td>{{verta($request->created_at)->format('%d %B، %Y ساعت H:i')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-secondary m-3">هیچ موردی پیدا نشد.</div>
            @endif
            {{$requests->links()}}
        </div>
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
