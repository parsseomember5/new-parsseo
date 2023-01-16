@extends('admin.layouts.panel')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">آیتم های منو /</span> ویرایش
    </h4>

    @include('admin.includes.alerts',['class' => 'mb-3'])
    <div class="card">
        <div class="card-body">
            <form action="{{route('menu-items.update',$menuItem)}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$menuItem->title)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="link">لینک</label>
                    <input type="text" class="form-control" dir="ltr" id="link" name="link" value="{{old('link',$menuItem->link)}}">
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="menu_id">منو</label>
                    <select class="form-select" name="menu_id" id="menu_id">
                        @foreach(\App\Models\Menu::all() as $menu)
                            <option value="{{$menu->id}}" {{$menuItem->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-lg-3">
                    <label class="form-label" for="parent_id">پدر (اختیاری)</label>
                    <select class="form-select" name="parent_id" id="parent_id">
                        <option value="" selected>انتخاب نشده</option>
                        @foreach(\App\Models\MenuItem::where('id','!=',$menuItem->id)->where('menu_id',$menuItem->menu_id)->get() as $menuItem)
                            <option value="{{$menuItem->id}}" {{$menuItem->parent_id == $menuItem->id ? 'selected' : ''}}>{{$menuItem->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
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
        let menuSelect = $('#menu_id');
        let itemsSelect = $('#parent_id');

        menuSelect.change(function () {
            getMenuItems($(this).val());
        });
        function getMenuItems(menuId){
            let data = new FormData();
            data.append('menu_id',menuId);

            $.ajax({
                method: 'POST',
                url: '/admin/menus/get-items',
                data: data,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': _token},
                error:function () {
                }
            }).done(function (data) {
                console.log(data);
                itemsSelect.empty();
                itemsSelect.append($('<option>', {
                    value: '',
                    text: 'انتخاب نشده'
                }));
                $(data).each(function (index,item) {
                    itemsSelect.append($('<option>', {
                        value: item['id'],
                        text: item['title']
                    }));
                });

            }).always(function () {
            });
        }
    </script>
@endsection
