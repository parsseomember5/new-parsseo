<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PortfolioCategoriesController extends Controller
{

    public function index()
    {
        $categories = PortfolioCategory::latest()->paginate(20);
        return view('admin.views.portfolio_categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.views.portfolio_categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        $inputs = $request->all();

        // generate slug from user input
        if ($request->has('slug') && !empty($request->slug)){
            $inputs['slug'] = SlugService::createSlug(PortfolioCategory::class, 'slug', $request->slug);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadRealFile($image,'portfolio-categories');
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        PortfolioCategory::create($inputs);

        session()->flash('success','دسته بندی با موفقیت ایجاد شد.');
        return redirect(route('portfolio-categories.index'));
    }


    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.views.portfolio_categories.edit',compact('portfolioCategory'));
    }


    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:350',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

        // update slug
        if ($request->slug != $portfolioCategory->slug){
            $inputs['slug'] = SlugService::createSlug(PortfolioCategory::class, 'slug', str_replace('/','',$request->slug));
        }

        $inputs = $request->all();

        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $inputs['image'] = $this->uploadRealFile($image,'post-category');
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        $portfolioCategory->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('portfolio-categories.index'));
    }


    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $name = $portfolioCategory->title;
        $this->removeStorageFile($portfolioCategory->image);
        $portfolioCategory->delete();
        session()->flash('success','دسته بندی ('.$name.') با موفقیت حذف شد');
        return redirect(route('portfolio-categories.index'));
    }

    public function search(){
        $query = request('query');
        $categories = Search::add(PortfolioCategory::class,'title')
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $categories->appends(array('query' => $query))->links();
        return view('admin.views.portfolio_categories.index',compact('categories','query'));
    }
}
