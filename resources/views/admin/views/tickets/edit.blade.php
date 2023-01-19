@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">تیکت ها /</span> ویرایش
        </h4>
        <div>
            <a href="{{route('users.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن کاربر جدید</span></span></a>
        </div>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('tickets.update',$ticket)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        @if(count($ticket->replies) > 0)
                            @foreach($ticket->replies as $item)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bg-light rounded px-4 py-3 mb-3 {{ auth()->user()->id != $item->user->id ? 'bg-light' : 'bg-white'}}">
                                            <div class="row">
                                                <div class="col-12 col-md-1 text-center">
                                                    <img width="70px" src="{{ asset($item->user->avatar) }}"
                                                         class="rounded-circle shadow">
                                                </div>
                                                <div class="col-12 col-md-11">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <p class="text-dark font-16 mb-2">{{$item->user->name}}</p>
                                                            <span class="d-block text-black-50 font-12">{{ verta($item->created_at)->format('%d %B ، %Y H:i') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 pb-1">
                                                        <div class="col-12">
                                                            <div class="text-justify font-14 line-height markdown">@markdown(str_replace('}}', '} }', $item->content))</div>

                                                            @if($item->user->type == 'admin' and $signature)
                                                                <div class="text-justify font-14 line-height">
                                                                    <hr />
                                                                    {!! $signature !!}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!is_null($item->file))
                                                    <div class="col-12">
                                                        <a href="{{ asset($item->file) }}"
                                                           class="btn btn-primary font-1 iransans-bold font-12 mt-3" target="_blank">دانلود
                                                            فایل پیوست</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                هنوز هیچ پاسخی ثبت نشده است.
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        {{-- Status --}}
                        <div class="mb-3 col-lg-12">
                            <label class="form-label" for="status">وضعیت</label>
                            <select class="form-select" id="status" name="status" data-allow-clear="true" required>
                                @foreach(\App\Models\Ticket::STATUS as $key => $item)
                                    <option value="{{ $key }}" {{ $key == $ticket->status ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Assign to Admin --}}
                        <div class="mb-3 col-lg-12">
                            <label class="form-label" for="admin_id">ارجاع به پشتیبان</label>
                            <select class="form-select" id="admin_id" name="admin_id" data-allow-clear="true" required>
                                <option value="">هیچکدام</option>
                                @foreach(\App\Models\Admin::all() as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $teacher->id == $ticket->admin_id ? 'selected' : '' }}>{{ $teacher->name }} - {{ $teacher->email }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success submit-button">ذخیره تغییرات</button>

                        <button type="button" class="btn btn-label-danger" id="edit-page-delete"
                                data-alert-message="بعد از حذف به زباله‌دان منتقل میشود."
                                data-model-id="{{$ticket->id}}" data-model="tickets">
                            حذف این تیکت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
