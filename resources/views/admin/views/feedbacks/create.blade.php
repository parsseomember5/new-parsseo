@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">نظرات مشتریان /</span> مورد جدید
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('feedbacks.store')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <div class="mb-3 col-lg-3">
                    <label for="name" class="form-label">نام</label>
                    <input class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="stars" class="form-label">تعداد ستاره</label>
                    <select name="stars" id="stars" class="form-select">
                        <option value="1" {{old('stars') == '1' ? 'selected' : ''}}>1</option>
                        <option value="2" {{old('stars') == '2' ? 'selected' : ''}}>2</option>
                        <option value="3" {{old('stars') == '3' ? 'selected' : ''}}>3</option>
                        <option value="4" {{old('stars') == '4' ? 'selected' : ''}}>4</option>
                        <option value="5" {{old('stars') == '5' ? 'selected' : ''}}>5</option>
                    </select>
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">تصویر</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3 col-12">
                    <label class="form-label" for="text">متن</label>
                    <textarea type="text" class="form-control" id="text" name="text">{{old('text')}}</textarea>
                </div>

                {{-- locale --}}
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="locale">زبان</label>
                    <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                        <option value="fa" {{ old('locale') == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                        <option value="en" {{ old('locale') == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                    </select>
                </div>

                {{-- translation --}}
                <div class="mb-3 col-lg-5">
                    <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                    <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                        <option value="" selected>انتخاب نشده</option>
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
    <script>
        let localeSelect = $('#locale');
        let translationSelect = $('#translation_id');

        localeSelect.change(function () {
            getTranslations($(this).val());
        });
        function getTranslations(locale){
            let data = new FormData();
            data.append('locale',locale);

            $.ajax({
                method: 'POST',
                url: '/admin/feedbacks/get-translations',
                data: data,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': _token},
                error:function () {
                }
            }).done(function (data) {
                console.log(data);
                translationSelect.empty();
                translationSelect.append($('<option>', {
                    value: '',
                    text: 'انتخاب نشده'
                }));
                $(data).each(function (index,item) {
                    translationSelect.append($('<option>', {
                        value: item['id'],
                        text: item['name'] + ' - ' + item['title']
                    }));
                });

            }).always(function () {
            });
        }
    </script>
@endsection
