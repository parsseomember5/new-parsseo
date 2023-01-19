@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کد های تخفیف /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('discounts.update',$discount)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-5">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$discount->title)}}">
                </div>

                {{-- code --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="code">کد</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{old('code', $discount->code)}}">
                </div>

                {{-- discount --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="discount">درصد تخفیف</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="{{old('discount', $discount->discount)}}">
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="type">انتخاب نوع</label>
                    <select class="form-select" id="type" name="type" data-allow-clear="true">
                        <option value="">انتخاب نوع</option>
                        @foreach(\App\Models\Discount::TYPE as $key => $item)
                            <option value="{{ $key }}" {{ $discount->type==$key ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="products">محصولات (اگر انتخاب نشود روی تمام محصولات اعمال میشود)</label>
                    <select class="select2 form-select" id="products" multiple name="products[]" data-allow-clear="true">
                        @if(!is_null($discount->products))
                            <option value="{{ $item->id }}" {{ in_array($item->id , $discount->products) ? 'selected' : '' }}>
                                {{ $item->fa_title }}
                            </option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->fa_title }}</option>
                        @endif
                    </select>
                </div>

                {{-- capacity --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="capacity">ظرفیت کل</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $discount->capacity) }}">
                </div>

                {{-- reserved --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="reserved">ظرفیت مصرف شده</label>
                    <input type="number" class="form-control" id="reserved" name="reserved" value="{{ old('reserved', $discount->reserved) }}">
                </div>

                {{-- start_date --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label">تاریخ آغاز</label>
                    <input type="text" class="form-control start_date" name="start_at" value="{{ $discount->start_at }}">
                </div>

                {{-- end_date --}}
                <div class="mb-3 col-lg-3">
                    <label class="form-label">تاریخ پایان</label>
                    <input type="text" class="form-control end_date" name="end_at" value="{{ $discount->end_at }}">
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="status">وضعیت</label>
                    <select class="form-select" id="status" name="status" data-allow-clear="true">
                        <option value="0" {{ $discount->status == '0' ? 'selected' : '' }}>غیر فعال</option>
                        <option value="1" {{ $discount->status == '1' ? 'selected' : '' }}>فعال</option>
                    </select>
                </div>

                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="forUser">چند بار مصرف</label>
                    <select class="form-select" id="forUser" name="forUser" data-allow-clear="true">
                        <option value="0" {{ $discount->forUser == '0' ? 'selected' : '' }}>غیر فعال</option>
                        <option value="1" {{ $discount->forUser == '1' ? 'selected' : '' }}>فعال</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره تغییرات</button>
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
            disableMobile: true
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
