@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">نظرات مشتریان /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('feedbacks.update',$feedback)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-2">
                    <label for="name" class="form-label">نام</label>
                    <input class="form-control" id="name" name="name" value="{{old('name',$feedback->name)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$feedback->title)}}">
                </div>
                <div class="mb-3 col-lg-2">
                    <label for="stars" class="form-label">تعداد ستاره</label>
                    <select name="stars" id="stars" class="form-select">
                        <option value="1" {{$feedback->stars == '1' ? 'selected' : ''}}>1</option>
                        <option value="2" {{$feedback->stars == '2' ? 'selected' : ''}}>2</option>
                        <option value="3" {{$feedback->stars == '3' ? 'selected' : ''}}>3</option>
                        <option value="4" {{$feedback->stars == '4' ? 'selected' : ''}}>4</option>
                        <option value="5" {{$feedback->stars == '5' ? 'selected' : ''}}>5</option>
                    </select>
                </div>

                <div class="mb-3 col-lg-3">
                    <label for="image" class="form-label">تصویر جدید</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                @if($feedback->image)
                    <div class="col-lg-2 mb-3">
                        <input type="hidden" id="remove_image" name="remove_image">
                        <div class="pt-4">
                            <a href="{{$feedback->getImage()}}" target="_blank">
                                <img src="{{$feedback->getImage()}}" alt="image" class="w-px-40 h-auto rounded" id="cat-image">
                            </a>
                            <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$feedback->image}}"
                                  input-id="remove_image" image-id="cat-image"><i class="bx bx-trash"></i></span>
                        </div>
                    </div>
                @endif

                <div class="mb-3 col-12">
                    <label class="form-label" for="text">متن</label>
                    <textarea type="text" class="form-control" id="text" name="text">{{old('text',$feedback->text)}}</textarea>
                </div>

                {{-- locale --}}
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="locale">زبان</label>
                    <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                        <option value="fa" {{ $feedback->locale == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                        <option value="en" {{ $feedback->locale == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                    </select>
                </div>

                {{-- translation --}}
                <div class="mb-3 col-lg-5">
                    <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                    <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                        <option value="" selected>انتخاب نشده</option>
                        @foreach(\App\Models\Feedback::where('locale','!=',$feedback->locale)->latest()->get() as $translation)
                            <option value="{{$translation->id}}" {{$feedback->translation_id == $translation->id ? 'selected' : ''}}>{{$translation->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره تغییرات</button>
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
