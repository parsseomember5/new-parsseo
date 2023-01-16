<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PanelController extends Controller
{
    public function dashboard(){
        return view('admin.views.dashboard');
    }

    public function contactRequest(){
        $requests = ContactRequest::latest()->paginate(20);
        return view('admin.views.contact_requests',compact('requests'));
    }

    public function searchContacts(){
        $query = request('query');
        $requests = Search::add(ContactRequest::class,['name','phone'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);
        $requests->appends(array('query' => $query))->links();
        return view('admin.views.contact_requests',compact('requests','query'));
    }
}
