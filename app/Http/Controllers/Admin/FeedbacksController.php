<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class FeedbacksController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(20);
        return view('admin.views.feedbacks.index',compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.views.feedbacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:1024',
            'stars' => 'required|string|between:1,5',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $inputs['image'] = $this->uploadRealFile($image,'feedbacks');
        }
        $feedback = Feedback::create($inputs);

        // update translation model
        if ($feedback->translation_id != null){
            $translation = Feedback::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $feedback->id]);
            }
        }

        session()->flash('success','آیتم جدید با موفقیت ایجاد شد.');
        return redirect(route('feedbacks.index'));
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.views.feedbacks.edit',compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:1024',
            'stars' => 'required|string|between:1,5',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

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

        $feedback->update($inputs);

        // update translation model
        if ($feedback->translation_id != null){
            $translation = Feedback::find($request->translation_id);
            if ($translation){
                $translation->update(['translation_id' => $feedback->id]);
            }
        }

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('feedbacks.index'));
    }

    public function destroy(Feedback $feedback)
    {
        $name = $feedback->title;
        $this->removeStorageFile($feedback->image);
        $feedback->delete();
        session()->flash('success','آیتم ('.$name.') با موفقیت حذف شد');
        return redirect(route('feedbacks.index'));
    }

    public function search(){
        $query = request('query');
        $feedbacks = Search::add(Feedback::class,['title','name'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $feedbacks->appends(array('query' => $query))->links();
        return view('admin.views.feedbacks.index',compact('feedbacks','query'));
    }

    public function getTranslations(){
        $locale = request('locale');
        return Feedback::where('locale','!=' , $locale)->latest()->get();
    }
}
