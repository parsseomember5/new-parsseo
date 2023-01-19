<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(20);
        return view('admin.views.tickets.index',compact('tickets'));
    }

    public function trash()
    {
        $tickets = Ticket::onlyTrashed()->paginate(20);
        return view('admin.views.tickets.trash', compact('tickets'));
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.views.tickets.edit',compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $ticket->update([
            'status'           => $request->input('status'),
            'admin_id' => $request->input('admin_id')
        ]);

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('tickets.edit',$ticket));
    }

    public function destroy(Ticket $ticket)
    {
        $name = $ticket->title;
        $ticket->delete();
        session()->flash('success','تیکت با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('tickets.index'));
    }

    public function restore($id)
    {
        $ticket = Ticket::withTrashed()->where('id',$id)->first();
        $name = $ticket->title;
        $ticket->restore();

        session()->flash('success', 'تیکت با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('tickets.trash'));
    }

    public function forceDelete()
    {
        $ticket = Ticket::withTrashed()->where('id',request('id'))->first();
        $name = $ticket->title;
        if ($ticket->file){
            $file = $ticket->file;
        }

        $ticket->replies()->delete();
        $ticket->forceDelete();
        if (isset($file)){
            $this->removeStorageFile($file);
        }
        session()->flash('success', 'تیکت با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('tickets.trash'));
    }

    public function emptyTrash()
    {
        Ticket::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('tickets.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = Ticket::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','تیکت به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete ticket";
    }

    public function reply_store(Request $request)
    {
        $this->validate($request, [
            'text'   => 'required|string',
            'ticket' => 'required|numeric',
            'file'   => 'nullable|mimes:png,jpg,jpeg,zip'
        ]);
        $file = $request->file('file');

        $ticket = Ticket::find($request->ticket);
        $reply = $ticket->replies()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->text,
        ]);

        if ($request->hasFile('file') && isset($file)) {
            $reply->update(['file' => $this->uploadRealFile($file, 'tickets')]);
        }

        $ticket->update(['status' => 'answer']);

        //$this->notify($ticket, $request->input('text'));

        return redirect()->back()->with([
            'success' => true,
        ]);
    }

    protected function notify(Ticket $ticket, string $reply)
    {
        //$ticket->user->notify(new ReplyTicket($ticket, $reply));
    }

    public function search()
    {
        $query = request('query');
        $tickets = Ticket::add(Ticket::class,['title','tracking'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $tickets->appends(array('query' => $query))->links();
        return view('admin.views.tickets.index', compact('tickets', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $tickets = Ticket::onlyTrashed()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('tracking', $query)
            ->paginate(20);

        $tickets->appends(array('query' => $query))->links();
        return view('admin.views.tickets.trash', compact('tickets', 'query'));
    }
}
