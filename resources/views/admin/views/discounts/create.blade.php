@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کد های تخفیف /</span> افزودن کد تخفیف جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('discounts.store')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf

                {{-- title --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">عنوان </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>

                {{-- code --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="code">کد</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}">
                </div>

                {{-- discount --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="discount">درصد تخفیف</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="{{old('discount')}}">
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="type">انتخاب نوع</label>
                    <select class="form-select" id="type" name="type" data-allow-clear="true">
                        <option value="">انتخاب نوع</option>
                        @foreach(\App\Models\Discount::TYPE as $key => $item)
                            <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="products">محصولات (اگر انتخاب نشود روی تمام محصولات اعمال میشود)</label>
                    <select class="select2 form-select" id="products" multiple name="products[]" data-allow-clear="true">
                        @foreach(\App\Models\Product::all() as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- capacity --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="capacity">ظرفیت کل</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') ?? 0 }}">
                </div>

                {{-- reserved --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="reserved">ظرفیت مصرف شده</label>
                    <input type="number" class="form-control" id="reserved" name="reserved" value="{{ old('reserved') ?? 0 }}">
                </div>

                {{-- start_date --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="discount">تاریخ آغاز</label>
                    <input type="text" class="form-control start_date" name="start_at">
                </div>

                {{-- end_date --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="discount">تاریخ پایان</label>
                    <input type="text" class="form-control end_date" name="end_at">
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="status">وضعیت</label>
                    <select class="form-select" id="status" name="status" data-allow-clear="true">
                        <option value="0">غیر فعال</option>
                        <option value="1">فعال</option>
                    </select>
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="forUser">چند بار مصرف</label>
                    <select class="form-select" id="forUser" name="forUser" data-allow-clear="true">
                        <option value="0">غیر فعال</option>
                        <option value="1">فعال</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.start_date').flatpickr({
            monthSelectorType: 'static',
            locale: 'fa',
            altInput: true,
            altFormat: 'Y/m/d',
            disableMobile: true,
        });

        $('.end_date').flatpickr({
            monthSelectorType: 'static',
            locale: 'fa',
            altInput: true,
            altFormat: 'Y/m/d',
            disableMobile: true
        });
    </script>
@endsection
