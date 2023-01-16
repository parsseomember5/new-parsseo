<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.views.posts.index',compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(20);
        return view('admin.views.posts.trash', compact('posts'));
    }

    public function create()
    {
        return view('admin.views.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'posts',['medium' => 350],80,true);
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        // generate slug from user input
        if ($request->has('slug') && !empty($request->slug)){
            $inputs['slug'] = SlugService::createSlug(Post::class, 'slug', str_replace('/','',$request->slug));
        }

        $post = Post::create($inputs);

        // attach categories
        $post->categories()->attach($request->categories);

        // attach keywords
        if (!empty($request->keywords)){
            $keys = explode(',',$request->keywords);
            $post->attachTags($keys);
        }

        // update translation
        if ($post->translation_id != null){
            $translation = Post::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $post->id]);
            }
        }

        session()->flash('success', 'مقاله با موفقیت ذخیره شد.');
        return redirect(route('posts.edit',$post));
    }

    public function edit(Post $post)
    {
        return view('admin.views.posts.edit',compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $inputs = $request->all();

        // update slug
        if ($request->slug != $post->slug){
            $inputs['slug'] = SlugService::createSlug(Post::class, 'slug', str_replace('/','',$request->slug));
        }

        // image
        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }else{
            $inputs['image'] = $post->image;
        }

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $inputs['image'] = $this->uploadImage($image,'posts',['medium' => 350],80,true);
        }

        $inputs['featured'] = false;
        if ($request->has('featured') && $request->featured == 'on') {
            $inputs['featured'] = true;
        }

        $post->update($inputs);

        // sync categories
        $post->categories()->sync($request->categories);

        // sync keywords
        if (!empty($request->keywords)){
            $keys = explode(',',$request->keywords);
            $post->syncTags($keys);
        }

        // update translation model
        if ($post->translation_id != null){
            $translation = Post::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $post->id]);
            }
        }

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('posts.edit',$post));
    }

    public function destroy(Post $post)
    {
        $name = $post->title;
        $post->delete();
        session()->flash('success','مقاله با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('posts.index'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $name = $post->title;
        $post->restore();
        if (!$post->category){
            $newCat = PostCategory::first();
            if ($newCat){
                $post->update(['category_id' => $newCat->id]);
            }
        }
        session()->flash('success', 'مقاله با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('posts.trash'));
    }

    public function forceDelete()
    {
        $post = Post::withTrashed()->where('id',request('id'))->first();
        $name = $post->title;
        if ($post->image){
            $imageORG = $post->image['original'];
            $imageTHUMB = $post->image['thumb'];
            $imageMEDIUM = $post->image['medium'];
        }

        if ($post->translation){
            $post->translation()->update(['translation_id' => null]);
        }

        $post->update(['translation_id' => null]);
        $post->categories()->sync([]);
        $post->forceDelete();
        if (isset($imageORG)){
            $this->removeStorageFile($imageTHUMB);
            $this->removeStorageFile($imageORG);
            $this->removeStorageFile($imageMEDIUM);
        }
        session()->flash('success', 'مقاله با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('posts.trash'));
    }

    public function emptyTrash()
    {
        Post::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('posts.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = Post::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','مقاله به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete article";
    }

    public function search()
    {
        $query = request('query');
        $posts = Search::add(Post::class,['title','slug'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $posts->appends(array('query' => $query))->links();

        return view('admin.views.posts.index', compact('posts', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $posts = Post::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('slug', 'LIKE', '%' . $query . '%')
            ->paginate(20);

        $posts->appends(array('query' => $query))->links();
        return view('admin.views.posts.trash', compact('posts', 'query'));
    }

    public function getTranslations(){
        $locale = request('locale');
        return Post::where('locale','!=' , $locale)->latest()->get();
    }
}
