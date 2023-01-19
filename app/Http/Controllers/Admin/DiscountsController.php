<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    public function index()
    {
        $discounts = Discount::latest()->paginate(20);
        return view('admin.views.discounts.index',compact('discounts'));
    }

    public function create()
    {
        return view('admin.views.discounts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required|string',
            'code' => 'required|string',
            'type' => 'required|string',
            'discount' => 'required|numeric',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        $inputs = $request->all();

        $start_at = explode('-', $request->start_at);
        $inputs['start_at'] = implode('-', Verta::jalaliToGregorian($start_at[0], $start_at[1], $start_at[2])) . " 00:00:00";

        $end_at = explode('-', $request->end_at);
        $inputs['end_at'] = implode('-', Verta::jalaliToGregorian($end_at[0], $end_at[1], $end_at[2])) . " 00:00:00";

        Discount::create($inputs);

        session()->flash('success','کد تخفیف جدید با موفقیت ایجاد شد.');
        return redirect(route('discounts.index'));
    }

    public function edit(Discount $discount)
    {
        return view('admin.views.discounts.edit',compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $this->validate($request , [
            'title' => 'required|string',
            'code' => 'required|string',
            'discount' => 'required|numeric',
        ]);
        $inputs = $request->all();
        unset($inputs['start_at']);
        unset($inputs['end_at']);

        if ($request->start_at){
            $discount->update([
                'start_at' => Carbon::createFromTimestamp($request->start_at / 1000)->toDateTimeString(),
            ]);
        }
        if ($request->end_at){
            $discount->update([
                'end_at' => Carbon::createFromTimestamp($request->end_at / 1000)->toDateTimeString(),
            ]);
        }

        $discount->update(array_merge($inputs , ['products' => $request->exists('products') ? $request->products : null]));

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('discounts.index'));
    }

    public function destroy(Discount $discount)
    {
        $name = $discount->title;
        $discount->delete();
        session()->flash('success','کد تخفیف با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('discounts.index'));
    }

    public function restore($id)
    {
        $discount = Discount::withTrashed()->where('id',$id)->first();
        $name = $discount->title;
        $discount->restore();

        session()->flash('success', 'کد تخفیف با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('discounts.trash'));
    }

    public function forceDelete()
    {
        $discount = Discount::withTrashed()->where('id',request('id'))->first();
        $name = $discount->title;
        $discount->forceDelete();

        session()->flash('success', 'کد تخفیف با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('discounts.trash'));
    }

    public function emptyTrash()
    {
        Discount::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('discounts.trash'));
    }

    public function ajaxDelete(Request $request)
    {
        $deleted = Discount::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','کد تخفیف به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete discount";
    }

    public function search(){
        $query = request('query');
        $discounts = Discount::where('title', 'LIKE', '%' . $query . '%')->paginate(20);
        $discounts->appends(array('query' => $query))->links();
        return view('admin.views.discounts.index',compact('discounts','query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $discounts = Discount::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')->paginate(20);
        $discounts->appends(array('query' => $query))->links();
        return view('admin.views.discounts.trash', compact('discounts', 'query'));
    }
}
