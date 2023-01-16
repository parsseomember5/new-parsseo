<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogosController extends Controller
{
    public function index()
    {
        $logos = Logo::latest()->paginate(20);
        return view('admin.views.logos.index',compact('logos'));
    }

    public function create()
    {
        return view('admin.views.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'integer|nullable',
            'url' => 'required|mimes:jpeg,jpg,png,gif'
        ]);
        $inputs = $request->all();
        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $inputs['url'] = $this->uploadRealFile($image,'logos');
        }
        Logo::create($inputs);

        session()->flash('success','لوگو جدید با موفقیت ایجاد شد.');
        return redirect(route('logos.index'));
    }

    public function edit(Logo $logo)
    {
        return view('admin.views.logos.edit',compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'integer|nullable',
            'url' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

        $inputs = $request->all();

        if ($request->remove_url != null && !$request->hasFile('url')){
            session()->flash('error','تصویر لوگو الزامی است.');
            return redirect()->back();
        }

        if ($request->remove_url != null) {
            $fileUrl = request('remove_url');
            $this->removeStorageFile($fileUrl);
            $inputs['url'] = null;
        }

        if ($request->hasFile('url')) {
            $image      = $request->file('url');
            $inputs['url'] = $this->uploadRealFile($image,'logos');
        }

        $logo->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('logos.index'));
    }

    public function destroy(Logo $logo)
    {
        $name = $logo->title;
        $this->removeStorageFile($logo->image);
        $logo->delete();
        session()->flash('success','لوگو ('.$name.') با موفقیت حذف شد');
        return redirect(route('logos.index'));
    }

    public function search(){
        $query = request('query');
        $logos = Logo::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('link', 'LIKE', '%' . $query . '%')
            ->paginate(20);
        $logos->appends(array('query' => $query))->links();
        return view('admin.views.logos.index',compact('logos','query'));
    }
}
