<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioRequest;
use App\Http\Requests\Admin\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PortfoliosController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(20);
        return view('admin.views.portfolios.index',compact('portfolios'));
    }

    public function trash()
    {
        $portfolios = Portfolio::onlyTrashed()->paginate(20);
        return view('admin.views.portfolios.trash', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.views.portfolios.create');
    }

    public function store(CreatePortfolioRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'portfolios',['medium' => 512],80);
        }

        if ($request->hasFile('scroll_image')) {
            $scrollImage = $request->file('scroll_image');
            $inputs['scroll_image'] = $this->uploadImage($scrollImage,'portfolios',['medium' => 400],80);
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        // generate slug from user input
        if ($request->has('slug') && !empty($request->slug)){
            $inputs['slug'] = SlugService::createSlug(Portfolio::class, 'slug', $request->slug);
        }

        $portfolio = Portfolio::create($inputs);

        // attach categories
        $portfolio->categories()->attach($request->categories);

        // update translation model
        if ($portfolio->translation_id != null){
            $translation = Portfolio::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $portfolio->id]);
            }
        }

        session()->flash('success', 'نمونه‌کار با موفقیت ذخیره شد.');
        return redirect(route('portfolios.edit',$portfolio));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.views.portfolios.edit',compact('portfolio'));
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {

        $inputs = $request->all();

        // update slug
        if ($request->slug != $portfolio->slug){
            $inputs['slug'] = SlugService::createSlug(Portfolio::class, 'slug', str_replace('/','',$request->slug));
        }

        // image
        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }else{
            $inputs['image'] = $portfolio->image;
        }
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'portfolios',['medium' => 512],80);
        }

        // scroll image
        if ($request->remove_scroll_image != null) {
            $fileUrl = request('remove_scroll_image');
            $this->removeStorageFile($fileUrl);
            $inputs['scroll_image'] = null;
        }else{
            $inputs['scroll_image'] = $portfolio->scroll_image;
        }

        if ($request->hasFile('scroll_image')) {
            $image      = $request->file('scroll_image');
            $inputs['scroll_image'] = $this->uploadImage($image,'portfolios',['medium' => 400],80);
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        $portfolio->update($inputs);

        // sync categories
        $portfolio->categories()->sync($request->categories);

        // update translation model
        if ($portfolio->translation_id != null){
            $translation = Portfolio::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $portfolio->id]);
            }
        }

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('portfolios.edit',$portfolio));
    }

    public function destroy(Portfolio $portfolio)
    {
        $name = $portfolio->title;
        $portfolio->delete();
        session()->flash('success','نمونه‌کار با عنوان ('.$name.') با موفقیت حذف شد');
        return redirect(route('portfolios.index'));
    }

    public function restore($id)
    {
        $portfolio = Portfolio::withTrashed()->where('id',$id)->first();
        $name = $portfolio->title;
        $portfolio->restore();
        if (!$portfolio->category){
            $newCat = PortfolioCategory::first();
            if ($newCat){
                $portfolio->update(['category_id' => $newCat->id]);
            }
        }
        session()->flash('success', 'نمونه‌کار با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('portfolios.trash'));
    }

    public function forceDelete()
    {
        $portfolio = Portfolio::withTrashed()->where('id',request('id'))->first();
        $name = $portfolio->title;
        if ($portfolio->image){
            $imageORG = $portfolio->image['original'];
            $imageTHUMB = $portfolio->image['thumb'];
            $imageMEDIUM = $portfolio->image['medium'];
        }

        if ($portfolio->translation){
            $portfolio->translation()->update(['translation_id' => null]);
        }
        $portfolio->update(['translation_id' => null]);
        $portfolio->categories()->sync([]);
        $portfolio->forceDelete();
        if ($portfolio->image){
            $this->removeStorageFile($imageTHUMB);
            $this->removeStorageFile($imageORG);
            $this->removeStorageFile($imageMEDIUM);
        }
        session()->flash('success', 'نمونه‌کار با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('portfolios.trash'));
    }

    public function emptyTrash()
    {
        Portfolio::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('portfolios.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = Portfolio::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','نمونه‌کار با موفقیت حذف شد');
            return "success";
        }
        return "couldn't delete article";
    }

    public function search()
    {
        $query = request('query');
        $portfolios = Search::add(Portfolio::class,['title','slug'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $portfolios->appends(array('query' => $query))->links();
        return view('admin.views.portfolios.index', compact('portfolios', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $portfolios = Portfolio::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('slug', 'LIKE', '%' . $query . '%')
            ->paginate(20);
        $portfolios->appends(array('query' => $query))->links();
        return view('admin.views.portfolios.trash', compact('portfolios', 'query'));
    }

    public function getTranslations(){
        $locale = request('locale');
        return Portfolio::where('locale','!=' , $locale)->latest()->get();
    }

}
