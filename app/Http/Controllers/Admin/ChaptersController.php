<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateChapterRequest;
use App\Models\Chapter;
use App\Models\Product;
use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    public function index()
    {
        $chapters = Chapter::latest()->paginate(20);
        return view('admin.views.chapters.index',compact('chapters'));
    }

    public function create()
    {
        return view('admin.views.chapters.create');
    }

    public function store(CreateChapterRequest $request)
    {
        $chapter = Chapter::create($request->all());

        session()->flash('success', 'سرفصل با موفقیت ذخیره شد.');
        return redirect(route('chapters.edit',$chapter));
    }

    public function edit(Chapter $chapter)
    {
        return view('admin.views.chapters.edit', compact('chapter'));
    }

    public function update(CreateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->all());

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('chapters.edit',$chapter));
    }

    public function destroy(Chapter $chapter)
    {
        if (is_null($chapter->parent_id)) {
            $chapter->childs()->delete();
        }

        $name = $chapter->title;
        $chapter->delete();
        session()->flash('success','سرفصل با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('products.index'));
    }

    public function getParents(Request $request)
    {
        $request->validate(['id' => 'required|numeric']);
        return Product::find($request->id)->headlines;
    }
}
