<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PagesController extends Controller
{

    public function index()
    {
        $pages = Page::latest()->paginate(20);
        return view('admin.views.pages.index',compact('pages'));
    }

    public function trash()
    {
        $pages = Page::onlyTrashed()->paginate(20);
        return view('admin.views.pages.trash', compact('pages'));
    }

    public function create()
    {
        return view('admin.views.pages.create');
    }

    public function store(CreatePageRequest $request)
    {

        $inputs = $request->all();

        // generate slug from user input
        if ($request->has('slug') && !empty($request->slug)){
            $inputs['slug'] = SlugService::createSlug(Page::class, 'slug', $request->slug);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'pages',['medium' => 350],80);
        }
        Page::create($inputs);
        session()->flash('success', 'برگه جدید با موفقیت ایجاد شد.');
        return redirect(route('pages.index'));
    }

    public function edit(Page $page)
    {
        return view('admin.views.pages.edit',compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {

        $inputs = $request->all();

        // update slug
        if ($request->slug != $page->slug){
            $inputs['slug'] = SlugService::createSlug(Page::class, 'slug', str_replace('/','',$request->slug));
        }

        // image
        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }else{
            $inputs['image'] = $page->image;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'pages',['medium' => 350],80);
        }

        $page->update($inputs);
        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('pages.index'));
    }

    public function destroy(Page $page)
    {
        $name = $page->title;
        $page->delete();
        session()->flash('success','برگه با عنوان ('.$name.') به زباله‌دان منتقل شد');
        return redirect(route('pages.index'));
    }

    public function restore($id)
    {
        $page = Page::withTrashed()->where('id',$id)->first();
        $name = $page->title;
        $page->restore();
        session()->flash('success', 'برگه با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('pages.trash'));
    }

    public function forceDelete()
    {
        $page = Page::withTrashed()->where('id',request('id'))->first();
        $name = $page->title;
        if ($page->image){
            $imageORG = $page->image['original'];
            $imageTHUMB = $page->image['thumb'];
            $imageMEDIUM = $page->image['medium'];
        }
        $page->forceDelete();
        if ($page->image){
            $this->removeStorageFile($imageTHUMB);
            $this->removeStorageFile($imageORG);
            $this->removeStorageFile($imageMEDIUM);
        }
        session()->flash('success', 'نمونه‌کار با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('pages.trash'));
    }

    public function emptyTrash()
    {
        Page::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('pages.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = Page::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','برگه با موفقیت حذف شد');
            return "success";
        }
        return "couldn't delete page";
    }

    public function search()
    {
        $query = request('query');
        $pages = Search::add(Page::class,['title','slug'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $pages->appends(array('query' => $query))->links();

        return view('admin.views.pages.index', compact('pages', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $pages = Page::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('slug', 'LIKE', '%' . $query . '%')
            ->paginate(20);
        $pages->appends(array('query' => $query))->links();
        return view('admin.views.pages.trash', compact('pages', 'query'));
    }

}
