@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">کامنت ها /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('comments.update',$comment)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')

                {{-- status --}}
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label" for="status">وضعیت</label>
                        <select class="select2 form-select" id="status" name="status">
                            <option value="1" {{ $comment->status ? 'selected' : '' }}>منتشر شده</option>
                            <option value="0" {{ !$comment->status ? 'selected' : '' }}>پیش نویس</option>
                        </select>
                    </div>
                </div>

                {{-- comment --}}
                <div class="mb-3 col-12">
                    <label class="form-label" for="comment">متن کامنت</label>
                    <textarea class="form-control" id="comment" name="comment" rows="6">{{$comment->comment}}</textarea>
                </div>



                <div class="mt-4">
                    <button type="submit" class="btn btn-primary submit-button">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    </div>

@endsection

