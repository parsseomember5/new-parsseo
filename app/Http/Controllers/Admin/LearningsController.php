<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Learning;
use App\Models\Product;
use Illuminate\Http\Request;

class LearningsController extends Controller
{
    public function index()
    {
        $learnings = Learning::latest()->paginate(20);
        return view('admin.views.learnings.index',compact('learnings'));
    }

    public function create()
    {
        return view('admin.views.learnings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'numeric',
        ]);

        foreach ($request->input('products') as $product) {
            // Check the user does not have access to each product
            if (! Learning::where('user_id', $request->user_id)->where('product_id', $product)->exists()) {
                Learning::create([
                    'user_id' => $request->user_id,
                    'product_id' => $product,
                    'support_at' => now()->addDays(Product::find($product)->support)->toDateTimeString(),   // support
                ]);
            }
        }

        session()->flash('success','دسترسی کاربر به محصول با موفقیت ایجاد شد.');
        return redirect(route('learnings.index'));
    }

    public function destroy(Learning $learning)
    {
        $name = $learning->user->name;
        $product = $learning->product->title;
        $learning->delete();
        session()->flash('success',"دسترسی کاربر($name) به محصول($product) با موفقیت حذف شد");
        return redirect(route('learnings.index'));
    }

    public function search(){
        $query = request('query');
        $product = request('product_id');

        $learnings = Learning::latest();

        if (isset($query) and $query != '') {
            $learnings->whereHas('user', function ($q) use($query){
                $q->where('name', 'LIKE', '%' . $query . '%')->orWhere('email', 'LIKE', '%' . $query . '%');
            });
        }

        if (isset($product) and $product != 'all') {
            $learnings->where('product_id', $product);
        }

        $learnings->paginate(20);
        $learnings->appends(array('query' => $query, 'product_id' => $product))->links();
        return view('admin.views.learnings.index',compact('learnings','query'));
    }
}
