@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">مدیریت کاربران /</span>ویرایش موجودی
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('users.balance_update')}}" method="post" class="row">
                @csrf

                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="user_id">انتخاب کاربر</label>
                    <select class="select2 form-select" id="user_id" name="user_id" data-allow-clear="true">
                        <option value="">choose</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{$user->id}}">{{$user->name . ' (' . $user->mobile .')'}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- amount --}}
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="amount">مبلغ (تومان)</label>
                    <input type="number" class="form-control" id="amount" name="amount">
                </div>

                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="type">نوع عملیات</label>
                    <select class="select2 form-select" id="type" name="type" data-allow-clear="true">
                        <option value="withdraw" selected>کسر از موجودی</option>
                        <option value="deposit">افزودن به موجودی</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <p>موجودی فعلی:
                            <span id="balance">
                                @if (isset($userId))
                                    @php $user = App\Models\User::find($userId);@endphp
                                        {{number_format($user->wallet->balance) . ' تومان'}}
                                    @else
                                        --
                                @endif
                            </span>
                            تومان
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ویرایش موجودی</button>
                    <a href="{{route('users.index')}}" class="btn btn-secondary">بازگشت</a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).on('change', '#user_id', function () {
            let data = new FormData();
            data.append('user_id', $(this).val());

            request = $.ajax({
                method: 'POST',
                processData: false,
                contentType: false,
                data: data,
                url: '/admin/users/get-balance',
                headers: {'X-CSRF-TOKEN': _token},
                error: function () {
                },
            }).done(function (data) {
                if (data['status'] === 'success'){
                    $('#balance').html(data['data']);
                }else{
                    swal({
                        icon:"error",
                        text: "مشکلی هنگام انتخاب کاربر رخ داد."
                    });
                }
            }).always(function () {
            });
        });
    </script>
@endsection
