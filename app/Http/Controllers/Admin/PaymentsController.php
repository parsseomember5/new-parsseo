<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserPayment;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = UserPayment::latest()->paginate(20);
        return view('admin.views.payments.index',compact('payments'));
    }

    public function edit(UserPayment $userPayment)
    {
        return view('admin.views.payments.edit',compact('userPayment'));
    }

    public function search()
    {
        $query = request('query');
        $payments = Search::add(UserPayment::class,['ref_id'])
            ->paginate(20)
            ->get($query);
        return view('admin.views.payments.index',compact('payments','query'));
    }
}
