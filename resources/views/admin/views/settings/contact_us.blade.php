@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> لندینگ تماس باما
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">لندینگ تماس با ما</h5>
                <form action="{{route('settings.contact_us_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="page_title" class="form-label">عنوان اصلی بالا</label>
                                <input class="form-control" type="text" id="page_title" name="page_title"
                                       value="{{old('page_title',$settings->page_title)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="uptitle" class="form-label">عنوان کوچک</label>
                                <input class="form-control" type="text" id="uptitle" name="uptitle"
                                       value="{{old('uptitle',$settings->uptitle)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="title" class="form-label">عنوان</label>
                                <input class="form-control text-start" type="text" id="title" name="title"
                                       value="{{old('title',$settings->title)}}">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="description" class="form-label">متن توضیحات</label>
                                <textarea class="form-control" type="text" rows="4" id="description" name="description">{{old('description',$settings->description)}}</textarea>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="address" class="form-label">آدرس</label>
                                <input class="form-control" type="text" id="address" name="address"
                                       value="{{old('address',$settings->address)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="support" class="form-label">پشتیبانی</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="support" name="support"
                                       value="{{old('support',$settings->support)}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">ایمیل</label>
                                <input class="form-control text-start" dir="ltr" type="text" id="email" name="email"
                                       value="{{old('email',$settings->email)}}">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="map" class="form-label">کد html نقشه</label>
                                <textarea class="form-control" type="text" rows="4" id="map" name="map">{{old('map',$settings->map)}}</textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="form_title" class="form-label">عنوان فرم</label>
                                <input class="form-control text-start" type="text" id="form_title" name="form_title"
                                       value="{{old('form_title',$settings->form_title)}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="form_description" class="form-label">توضیحات فرم</label>
                                <input class="form-control text-start" type="text" id="form_description" name="form_description"
                                       value="{{old('form_description',$settings->form_description)}}">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success me-2 submit-button">ذخیره تغییرات</button>
                            <a href="{{route('admin.dashboard')}}" class="btn btn-label-secondary">انصراف</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
