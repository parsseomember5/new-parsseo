<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(20);
        return view('admin.views.comments.index',compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:191']);

        $tag = Tag::findOrCreateFromString($request->name);

        session()->flash('success', 'تگ با موفقیت ذخیره شد.');
        return redirect(route('comments.edit',$tag));
    }

    public function edit(Comment $comment)
    {
        $replies = $comment->replies(false)->get();
        return view('admin.views.comments.edit', compact('replies', 'comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'status'    => 'required|string',
            'comment'    => 'required|string',
        ]);

        $comment->update($request->all());

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('comments.edit',$comment));
    }

    public function reply(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'comment'    => 'required|string',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        Comment::create([
            'user_id'          => auth()->guard('admin')->user()->id,
            'comment'          => $request->input('comment'),
            'status'           => true,
            'commentable_type' => 'comments',
            'commentable_id'   => $comment->id,
            'created_at'       => $request->input('created_at'),
        ]);

        //$this->notify($comment, $request->input('comment'));

        return redirect(route('comments.index'))->with([
            'success' => true,
        ]);
    }

    public function search()
    {
        $query = request('query');
        $comments = Search::add(Comment::class,['comment'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $comments->appends(array('query' => $query))->links();

        return view('admin.views.comments.index', compact('comments', 'query'));
    }

    public function destroy(Comment $comment)
    {
        $comment->likes()->delete();
        $comment->delete();
        session()->flash('success', 'کامنت با موفقیت حذف شد.');
        return redirect(route('comments.index'));
    }
}
