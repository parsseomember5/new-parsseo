@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">دسترسی کاربر به محصول /</span> مورد جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('learnings.store')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf

                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="user_id">انتخاب کاربر</label>
                    <select class="select2 form-select" id="user_id" name="user_id" data-allow-clear="true">
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{$user->id}}" {{ old('user_id')==$user->id ? 'selected' : '' }}>
                                {{$user->name . ' - ' . $user->phone}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-lg-6">
                    <label class="form-label" for="products">انتخاب محصولات</label>
                    <select class="select2 form-select" id="products" multiple name="products[]" data-allow-clear="true">
                        @foreach(\App\Models\Product::all() as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
