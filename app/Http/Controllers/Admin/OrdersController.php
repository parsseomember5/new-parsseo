<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(20);
        return view('admin.views.orders.index',compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.views.orders.edit',compact('order'));
    }

    /*
     public function edit(Order $order)
    {
        return view('admin.views.orders.edit',compact('order'));
    }

     public function update(Request $request, Order $order)
    {
        $this->validate($request , [
            'title' => 'required|string',
            'code' => 'required|string',
            'order' => 'required|numeric',
        ]);
        $inputs = $request->all();


        $order->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('orders.index'));
    }*/

    public function destroy(order $order)
    {
        $name = $order->order_number;
        $order->delete();
        session()->flash('success','سفارش ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('orders.index'));
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->where('id',$id)->first();
        $name = $order->order_number;
        $order->restore();

        session()->flash('success', 'سفارش (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('orders.trash'));
    }

    public function forceDelete()
    {
        $order = Order::withTrashed()->where('id',request('id'))->first();
        $name = $order->order_number;
        $order->items()->delete();
        $order->forceDelete();

        session()->flash('success', 'سفارش (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('orders.trash'));
    }

    public function emptyTrash()
    {
        order::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('orders.trash'));
    }

    public function ajaxDelete(Request $request)
    {
        $deleted = order::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','سفارش به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete order";
    }

    public function search(){
        $query = request('query');
        $orders = Order::where('title', 'LIKE', '%' . $query . '%')->paginate(20);
        $orders->appends(array('query' => $query))->links();
        return view('admin.views.orders.index',compact('orders','query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $orders = Order::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')->paginate(20);
        $orders->appends(array('query' => $query))->links();
        return view('admin.views.orders.trash', compact('orders', 'query'));
    }
}
