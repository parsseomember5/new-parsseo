<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.views.products.index',compact('products'));
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(20);
        return view('admin.views.products.trash', compact('products'));
    }

    public function create()
    {
        return view('admin.views.products.create');
    }

    public function store(CreateProductRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'products',['medium' => 350],80,true);
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('image');
            $inputs['cover'] = $this->uploadImage($cover,'products',['medium' => 350],80,true);
        }

        if ($request->hasFile('headlines_pdf')) {
            $headlines = $request->file('headlines_pdf');
            $inputs['headlines_pdf'] = $this->uploadImage($headlines,'products',['medium' => 350],80,true);
        }

        $inputs['isCopyright'] = false;
        if ($request->has('isCopyright') && $request->isCopyright == 'on') {
            $inputs['isCopyright'] = true;
        }

        $inputs['isFooter'] = false;
        if ($request->has('isFooter') && $request->isFooter == 'on') {
            $inputs['isFooter'] = true;
        }

        $inputs['isBest'] = false;
        if ($request->has('isBest') && $request->isBest == 'on') {
            $inputs['isBest'] = true;
        }

        $inputs['is_coming_soon'] = false;
        if ($request->has('isCopyright') && $request->is_coming_soon == 'on') {
            $inputs['is_coming_soon'] = true;
        }

        $inputs['isSpecial'] = false;
        if ($request->has('isCopyright') && $request->isSpecial == 'on') {
            $inputs['isSpecial'] = true;
        }

        $inputs['isNew'] = false;
        if ($request->has('isNew') && $request->isNew == 'on') {
            $inputs['isNew'] = true;
        }

        // generate slug from user input
        if ($request->has('slug') && !empty($request->slug)){
            $inputs['slug'] = SlugService::createSlug(Product::class, 'slug', str_replace('/','',$request->slug));
        }

        $product = Product::create($inputs);

        // attach tags
        if (!empty($request->tags)){
            $product->attachTags($request->tags);
        }

        // update translation
        if ($product->translation_id != null){
            $translation = Product::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $product->id]);
            }
        }

        session()->flash('success', 'محصول با موفقیت ذخیره شد.');
        return redirect(route('products.edit',$product));
    }

    public function edit(Product $product)
    {
        $otherProducts = Product::where('id', '!=', $product->id)->get();
        return view('admin.views.products.edit', compact('product', 'otherProducts'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $inputs = $request->all();

        // update slug
        if ($request->slug != $product->slug){
            $inputs['slug'] = SlugService::createSlug(Product::class, 'slug', str_replace('/','',$request->slug));
        }


        // image
        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }else{
            $inputs['image'] = $product->image;
        }

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'products',['medium' => 350],80,true);
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('image');
            $inputs['cover'] = $this->uploadImage($cover,'products',['medium' => 350],80,true);
        }

        if ($request->hasFile('headlines_pdf')) {
            $headlines = $request->file('headlines_pdf');
            $inputs['headlines_pdf'] = $this->uploadImage($headlines,'products',['medium' => 350],80,true);
        }


        $inputs['isCopyright'] = false;
        if ($request->has('isCopyright') && $request->isCopyright == 'on') {
            $inputs['isCopyright'] = true;
        }

        $inputs['isBest'] = false;
        if ($request->has('isBest') && $request->isBest == 'on') {
            $inputs['isBest'] = true;
        }

        $inputs['isNew'] = false;
        if ($request->has('isNew') && $request->isNew == 'on') {
            $inputs['isNew'] = true;
        }

        $inputs['isFooter'] = false;
        if ($request->has('isFooter') && $request->isFooter == 'on') {
            $inputs['isFooter'] = true;
        }

        $inputs['isSpecial'] = false;
        if ($request->has('isSpecial') && $request->isSpecial == 'on') {
            $inputs['isSpecial'] = true;
        }

        $inputs['is_coming_soon'] = false;
        if ($request->has('is_coming_soon') && $request->is_coming_soon == 'on') {
            $inputs['is_coming_soon'] = true;
        }

        $product->update($inputs);

        // attach tags
        if (!empty($request->tags)){
            $product->syncTags($request->tags);
        }

        // update translation model
        if ($product->translation_id != null){
            $translation = Product::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $product->id]);
            }
        }

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('products.edit',$product));
    }

    public function destroy(Product $product)
    {
        $name = $product->title;
        $product->delete();
        session()->flash('success','مقاله با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('products.index'));
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->where('id',$id)->first();
        $name = $product->title;
        $product->restore();

        session()->flash('success', 'محصول با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('products.trash'));
    }

    public function forceDelete()
    {
        $product = Product::withTrashed()->where('id',request('id'))->first();
        $name = $product->title;
        if ($product->image){
            $imageORG = $product->image['original'];
            $imageTHUMB = $product->image['thumb'];
            $imageMEDIUM = $product->image['medium'];
        }

        if ($product->translation){
            $product->translation()->update(['translation_id' => null]);
        }

        $product->update(['translation_id' => null]);
        $product->tags()->sync([]);
        $product->chapters()->delete();
        $product->forceDelete();
        if (isset($imageORG)){
            $this->removeStorageFile($imageTHUMB);
            $this->removeStorageFile($imageORG);
            $this->removeStorageFile($imageMEDIUM);
        }
        session()->flash('success', 'محصول با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('posts.trash'));
    }

    public function emptyTrash()
    {
        Product::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('products.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = Product::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','مقاله به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete product";
    }

    public function search()
    {
        $query = request('query');
        $products = Search::add(Product::class,['title','slug'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $products->appends(array('query' => $query))->links();

        return view('admin.views.products.index', compact('products', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $products = Product::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('slug', 'LIKE', '%' . $query . '%')
            ->paginate(20);

        $products->appends(array('query' => $query))->links();
        return view('admin.views.products.trash', compact('products', 'query'));
    }
}
