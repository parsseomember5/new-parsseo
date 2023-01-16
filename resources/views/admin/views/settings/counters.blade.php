@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="py-3 breadcrumb-wrapper m-0 pb-0">
            <span class="text-muted fw-light">تنظیمات /</span> شمارشگر ها
        </h4>
        @include('admin.includes.lang_switcher')
    </div>

    @include('admin.includes.alerts')
    <div class="row">
        <div class="col-md-12">
            @include('admin.views.settings.nav')
            <div class="card mb-4">
                <h5 class="card-header">تنظیمات باکس های شمارشگر</h5>
                <form action="{{route('settings.counters_update',$settings)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="counter_box1_title" class="form-label">عنوان شمارنده یک</label>
                                <input class="form-control" type="text" id="counter_box1_title" name="counter_box1_title"
                                       value="{{old('counter_box1_title',$settings->counter_box1_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="counter_box1_text" class="form-label">متن شمارنده یک</label>
                                <input class="form-control text-start" type="text" id="counter_box1_text" name="counter_box1_text"
                                       value="{{old('counter_box1_text',$settings->counter_box1_text)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box1_number" class="form-label">عدد شمارنده یک</label>
                                <input class="form-control text-start" type="text" id="counter_box1_number" name="counter_box1_number"
                                       value="{{old('counter_box1_number',$settings->counter_box1_number)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box1_icon" class="form-label">آیکن شمارنده یک</label>
                                <input class="form-control text-start" type="text" id="counter_box1_number" name="counter_box1_icon"
                                       value="{{old('counter_box1_icon',$settings->counter_box1_icon)}}">
                            </div>

                            <hr>

                            <div class="mb-3 col-md-3">
                                <label for="counter_box2_title" class="form-label">عنوان شمارنده دو</label>
                                <input class="form-control" type="text" id="counter_box2_title" name="counter_box2_title"
                                       value="{{old('counter_box2_title',$settings->counter_box2_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="counter_box2_text" class="form-label">متن شمارنده دو</label>
                                <input class="form-control text-start" type="text" id="counter_box1_text" name="counter_box2_text"
                                       value="{{old('counter_box2_text',$settings->counter_box2_text)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box2_number" class="form-label">عدد شمارنده دو</label>
                                <input class="form-control text-start" type="text" id="counter_box2_number" name="counter_box2_number"
                                       value="{{old('counter_box2_number',$settings->counter_box2_number)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box2_icon" class="form-label">آیکن شمارنده دو</label>
                                <input class="form-control text-start" type="text" id="counter_box2_number" name="counter_box2_icon"
                                       value="{{old('counter_box2_icon',$settings->counter_box2_icon)}}">
                            </div>

                            <hr>

                            <div class="mb-3 col-md-3">
                                <label for="counter_box3_title" class="form-label">عنوان شمارنده سه</label>
                                <input class="form-control" type="text" id="counter_box3_title" name="counter_box3_title"
                                       value="{{old('counter_box3_title',$settings->counter_box3_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="counter_box3_text" class="form-label">متن شمارنده سه</label>
                                <input class="form-control text-start" type="text" id="counter_box3_text" name="counter_box3_text"
                                       value="{{old('counter_box3_text',$settings->counter_box3_text)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box3_number" class="form-label">عدد شمارنده سه</label>
                                <input class="form-control text-start" type="text" id="counter_box3_number" name="counter_box3_number"
                                       value="{{old('counter_box3_number',$settings->counter_box3_number)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box3_icon" class="form-label">آیکن شمارنده سه</label>
                                <input class="form-control text-start" type="text" id="counter_box3_number" name="counter_box3_icon"
                                       value="{{old('counter_box3_icon',$settings->counter_box3_icon)}}">
                            </div>

                            <hr>

                            <div class="mb-3 col-md-3">
                                <label for="counter_box4_title" class="form-label">عنوان شمارنده چهار</label>
                                <input class="form-control" type="text" id="counter_box1_title" name="counter_box4_title"
                                       value="{{old('counter_box4_title',$settings->counter_box4_title)}}">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="counter_box4_text" class="form-label">متن شمارنده چهار</label>
                                <input class="form-control text-start" type="text" id="counter_box4_text" name="counter_box4_text"
                                       value="{{old('counter_box4_text',$settings->counter_box4_text)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box4_number" class="form-label">عدد شمارنده چهار</label>
                                <input class="form-control text-start" type="text" id="counter_box4_number" name="counter_box4_number"
                                       value="{{old('counter_box4_number',$settings->counter_box4_number)}}">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="counter_box4_icon" class="form-label">آیکن شمارنده چهار</label>
                                <input class="form-control text-start" type="text" id="counter_box4_number" name="counter_box4_icon"
                                       value="{{old('counter_box4_icon',$settings->counter_box4_icon)}}">
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
