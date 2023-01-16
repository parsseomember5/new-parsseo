<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class MenuItemsController extends Controller
{
    public function index()
    {
        $items = MenuItem::latest()->paginate(20);
        return view('admin.views.menu_items.index',compact('items'));
    }

    public function create()
    {
        return view('admin.views.menu_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'menu_id' => 'required|string|max:255',
            'parent_id' => 'nullable|string|max:255'
        ]);
        $inputs = $request->all();
        MenuItem::create($inputs);

        session()->flash('success','آیتم جدید با موفقیت ایجاد شد.');
        return redirect(route('menu-items.create'));
    }

    public function edit(MenuItem $menuItem)
    {
        return view('admin.views.menu_items.edit',compact('menuItem'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'menu_id' => 'required|string|max:255',
            'parent_id' => 'nullable|string|max:255'
        ]);

        $inputs = $request->all();
        $menuItem->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('menu-items.index'));
    }

    public function destroy(MenuItem $menuItem)
    {
        $name = $menuItem->title;
        $menuItem->delete();
        session()->flash('success','آیتم ('.$name.') با موفقیت حذف شد');
        return redirect(route('menu-items.index'));
    }

    public function search(){
        $query = request('query');
        $items = Search::add(MenuItem::class,['title','link'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $items->appends(array('query' => $query))->links();
        return view('admin.views.menu_items.index',compact('items','query'));
    }

    public function getItems(){
        $menuId = request('menu_id');
        $menu = Menu::find($menuId);
        return $menu->items;
    }
}
