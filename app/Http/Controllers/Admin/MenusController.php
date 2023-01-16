<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Menu;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(20);
        return view('admin.views.menus.index',compact('menus'));
    }

    public function create()
    {
        return view('admin.views.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        $inputs = $request->all();

        // check menu location
        $exist = Menu::where('location',$request->location)->where('locale',$request->get('locale'))->first();
        if ($exist){
            session()->flash('error','قبلا یک منو با این زبان برای این جایگاه نمایش ساخته شده است!');
            return redirect()->back();
        }
        Menu::create($inputs);

        session()->flash('success','منو جدید با موفقیت ایجاد شد.');
        return redirect(route('menus.index'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.views.menus.edit',compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $inputs = $request->all();

        // check menu location
        if ($menu->location != $request->location){
            $exist = Menu::where('location',$request->location)->where('locale',$request->get('locale'))->first();
            if ($exist){
                session()->flash('error','قبلا یک منو با این زبان برای این جایگاه نمایش ساخته شده است!');
                return redirect()->back();
            }
        }


        $menu->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('menus.index'));
    }

    public function destroy(Menu $menu)
    {
        $name = $menu->title;
        $menu->delete();
        session()->flash('success','منو ('.$name.') با موفقیت حذف شد');
        return redirect(route('menus.index'));
    }

    public function search(){
        $query = request('query');
        $menus = Search::add(Menu::class,'title')
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $menus->appends(array('query' => $query))->links();
        return view('admin.views.menus.index',compact('menus','query'));
    }
}
