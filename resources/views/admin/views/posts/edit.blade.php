@extends('admin.layouts.panel')
@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="m-0 breadcrumb-wrapper">
            <span class="text-muted fw-light">مقالات /</span> ویرایش
        </h4>
        <div>
            <a href="{{route('post.show',$post)}}" class="btn btn-label-secondary" target="_blank"><span><i class="bx bx-show me-sm-2"></i> <span class="d-none d-sm-inline-block">مشاهده</span></span></a>
            <a href="{{route('posts.create')}}" class="btn btn-primary"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">افزودن مقاله جدید</span></span></a>
        </div>
    </div>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        {{-- title --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">عنوان (ضروری)</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title',$post->title)}}">
                        </div>

                        {{-- slug --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="slug">نامک</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$post->slug)}}">
                        </div>

                        {{-- excerpt --}}
                        <div class="mb-3 col-12">
                            <label class="form-label" for="excerpt">خلاصه</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{old('excerpt',$post->excerpt)}}</textarea>
                        </div>

                        {{-- image --}}
                        <div class="mb-3 col-lg-4">
                            <label for="image" class="form-label">تصویر جدید</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        @if($post->image)
                            <div class="col-lg-3 mb-3">
                                <input type="hidden" id="remove_image" name="remove_image">
                                <div class="pt-4">
                                    <a href="{{$post->getImage()}}" target="_blank">
                                        <img src="{{$post->getImage('thumb')}}" alt="image" class="w-px-40 h-auto rounded" id="post-image">
                                    </a>
                                    <span class="btn btn-sm btn-danger remove-image-file" data-url="{{$post->image['original']}}"
                                          input-id="remove_image" image-id="post-image"><i class="bx bx-trash"></i></span>
                                </div>
                            </div>
                        @endif


                        {{-- body --}}
                        <div class="mb-3">
                            <input type="hidden" name="body" id="body" value="{{old('body',$post->body)}}">
                            <label for="body" class="form-label">محتوای مقاله</label>
                            <div id="main-editor" data-input-id="body">{!! old('body',$post->body) !!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    {{-- categories --}}
                    <div class="mb-3">
                        <label class="form-label" for="categories">دسته بندی ها</label>
                        <select class="select2 form-select" id="categories" name="categories[]" data-allow-clear="true" multiple>
                            @foreach(\App\Models\PostCategory::all() as $category)
                                <option value="{{$category->id}}" {{ in_array($category->id,$post->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        {{-- locale --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="locale">زبان مقاله</label>
                            <select class="form-select" id="locale" name="locale" data-allow-clear="true">
                                <option value="fa" {{ $post->locale == 'fa' ? 'selected' : '' }}>فارسی (FA)</option>
                                <option value="en" {{ $post->locale == 'en' ? 'selected' : '' }}>انگلیسی (EN)</option>
                            </select>
                        </div>
                        {{-- translation --}}
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="translation_id">انتخاب ترجمه</label>
                            <select class="select2 form-select" id="translation_id" name="translation_id" data-allow-clear="true">
                                <option value="" selected>انتخاب نشده</option>
                                @foreach(\App\Models\Post::where('locale','!=',$post->locale)->latest()->get() as $translation)
                                    <option value="{{$translation->id}}" {{$post->translation_id == $translation->id ? 'selected' : ''}}>{{$translation->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    {{-- keywords --}}
                    <div class="mb-3">
                        <label for="keywords" class="form-label">کلمات کلیدی</label>
                        <input id="keywords" class="form-control tagify-select" name="keywords" value="{{old('keywords',$post->tags->pluck('name'))}}">
                        <small class="d-block text-muted mt-1">کلمه را بنوسید و سپس اینتر بزنید</small>
                    </div>

                    {{-- meta description --}}
                    <div class="mb-3">
                        <label class="form-label" for="meta_description">متای توضیحات</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{old('meta_description',$post->meta_description)}}</textarea>
                    </div>

                    {{-- canonical --}}
                    <div class="mb-3">
                        <label class="form-label" for="canonical">تگ canonical</label>
                        <input type="text" class="form-control" dir="ltr" id="canonical" name="canonical" value="{{old('canonical',$post->canonical)}}">
                    </div>

                    {{-- author --}}
                    <div class="mb-3">
                        <label class="form-label" for="author_id">نویسنده</label>
                        <select class="select2 form-select" id="author_id" name="author_id" data-allow-clear="true">
                            @foreach(\App\Models\Admin::all() as $admin)
                                <option value="{{$admin->id}}" {{ $post->author_id == $admin->id ? 'selected' : '' }}>{{$admin->name . ' (' .$admin->email. ')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row align-items-end">
                        {{-- order --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="order">اولویت نمایش</label>
                                <input type="number" class="form-control" dir="ltr" id="order" name="order" value="{{old('order',$post->order)}}">
                            </div>
                        </div>

                        {{-- status --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="status">وضعیت</label>
                                <select class="select2 form-select" id="status" name="status">
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>منتشر شده</option>
                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>پیش نویس</option>
                                    <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>در انتظار تایید</option>
                                </select>
                            </div>
                        </div>

                        {{-- featured --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="featured" name="featured" {{$post->featured ? 'checked' :''}}>
                                    <label class="form-check-label" for="featured">مقاله ویژه</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-success submit-button">ذخیره تغییرات</button>


                        <button type="button" class="btn btn-label-danger" id="edit-page-delete"
                                data-alert-message="بعد از حذف به زباله‌دان منتقل میشود."
                                data-model-id="{{$post->id}}" data-model="posts">
                            حذف این مقاله
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                url: '/admin/posts/get-translations',
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
                        text: item['title']
                    }));
                });

            }).always(function () {
            });
        }
    </script>
@endsection
