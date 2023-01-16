@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">منو ها /</span> منو جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="location">محل نمایش</label>
                    <select class="form-select" name="location" id="location">
                        <option value="main_menu" {{old('location') == 'main_menu' ? 'selected' : ''}}>منوی اصلی</option>
                        <option value="footer_list1" {{old('location') == 'footer_list1' ? 'selected' : ''}}>لیست فوتر 1</option>
                        <option value="footer_list2" {{old('location') == 'footer_list2' ? 'selected' : ''}}>لیست فوتر 2</option>
                        <option value="footer_list3" {{old('location') == 'footer_list3' ? 'selected' : ''}}>لیست فوتر 3</option>
                        <option value="footer_list4" {{old('location') == 'footer_list4' ? 'selected' : ''}}>لیست فوتر 4</option>
                    </select>
                </div>
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="locale">زبان</label>
                    <select class="form-select" name="locale" id="locale">
                        <option value="fa" {{old('locale') == 'fa' ? 'selected' : ''}}>فارسی (FA)</option>
                        <option value="en" {{old('locale') == 'en' ? 'selected' : ''}}>انگلیسی (EN)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary submit-button">ارسال</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
@endsection
@section('scripts')
@endsection
