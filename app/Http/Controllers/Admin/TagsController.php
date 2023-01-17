<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Spatie\Tags\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('order_column', 'desc')->paginate(20);
        return view('admin.views.tags.index',compact('tags'));
    }

    public function create()
    {
        return view('admin.views.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:191']);

        $tag = Tag::findOrCreateFromString($request->name);

        session()->flash('success', 'تگ با موفقیت ذخیره شد.');
        return redirect(route('tags.edit',$tag));
    }

    public function edit(Tag $tag)
    {
        return view('admin.views.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required|string|max:191']);

        $tag->name = $request->name;
        $tag->save();

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('tags.edit',$tag));
    }

    public function search()
    {
        $query = request('query');
        $tags = Search::add(Tag::class,['name','slug'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $tags->appends(array('query' => $query))->links();

        return view('admin.views.tags.index', compact('tags', 'query'));
    }

    public function destroy(Tag $tag)
    {
        $name = $tag->name;
        $tag->delete();
        session()->flash('success', 'تگ با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('tags.index'));
    }
}
