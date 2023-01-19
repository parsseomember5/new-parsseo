<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.views.users.index',compact('users'));
    }

    public function trash()
    {
        $users = User::onlyTrashed()->paginate(20);
        return view('admin.views.users.trash', compact('users'));
    }

    public function create()
    {
        return view('admin.views.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $this->uploadRealFile($request->file('avatar'),'users');
        }

        $has_verified_email = $request->has('is_email_verified') && $request->is_email_verified == 'on'
            ? now()->toDateTimeString() : null;

        $has_verified_phone = $request->has('is_phone_verified') && $request->is_phone_verified == 'on'
            ? now()->toDateTimeString() : null;

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'email_verified_at' => $has_verified_email,
            'phone_verified_at' => $has_verified_phone,
            'password' => bcrypt($request->password),
            'avatar' => $avatar,
        ]);

        session()->flash('success', 'کاربر با موفقیت ذخیره شد.');
        return redirect(route('users.edit',$user));
    }

    public function edit(User $user)
    {
        return view('admin.views.users.edit',compact('user'));
    }

    public function showCart(User $user)
    {
        $carts = CartsController::get($user->id);
        return view('admin.views.users.cart',compact('user', 'carts'));
    }

    public function showWallet(User $user)
    {
        return view('admin.views.users.wallet',compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $inputs = $request->all();

        // avatar
        if ($request->remove_image != null) {
            $this->removeStorageFile(request('remove_image'));
            $inputs['avatar'] = null;
        }else{
            $inputs['avatar'] = $user->avatar;
        }

        if ($request->hasFile('avatar')) {
            $inputs['avatar'] = $this->uploadRealFile($request->file('avatar'),'users');
        }

        $inputs['phone_verified_at'] = false;
        if ($request->has('is_phone_verified') && $request->is_phone_verified == 'on') {
            $inputs['phone_verified_at'] = now()->toDateTimeString();
        }

        $inputs['email_verified_at'] = false;
        if ($request->has('is_email_verified') && $request->is_email_verified == 'on') {
            $inputs['email_verified_at'] = now()->toDateTimeString();
        }

        // update password
        if ($request->has('password') && $request->password != '') {
            $inputs['password'] = bcrypt($request->password);
        }

        $user->update($inputs);

        session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');
        return redirect(route('users.edit',$user));
    }

    public function destroy(User $user)
    {
        $name = $user->name;
        $user->delete();
        session()->flash('success','کاربر با عنوان ('.$name.') به سطل زبانه منتقل شد');
        return redirect(route('users.index'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $name = $user->name;
        $user->restore();

        session()->flash('success', 'کاربر با عنوان (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('users.trash'));
    }

    public function forceDelete()
    {
        $user = User::withTrashed()->where('id',request('id'))->first();
        $name = $user->name;
        if ($user->avatar){
            $imageAvatar = $name->avatar;
        }

        $user->payments()->delete();
        $user->mobileToken()->delete();
        $user->learnings()->delete();
        $user->comments()->delete();
        $user->tickets()->delete();
        $user->forceDelete();
        if (isset($imageAvatar)){
            $this->removeStorageFile($imageAvatar);
        }
        session()->flash('success', 'کاربر با عنوان (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('users.trash'));
    }

    public function emptyTrash()
    {
        User::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('users.trash'));
    }

    public function ajaxDelete(Request $request){
        $deleted = User::where('id',$request->id)->delete();
        if ($deleted){
            session()->flash('success','کاربر به زباله‌دان منتقل شد.');
            return "success";
        }
        return "couldn't delete user";
    }

    public function search()
    {
        $query = request('query');
        $users = User::add(User::class,['name','email', 'phone'])
            ->dontParseTerm()
            ->beginWithWildcard()
            ->paginate(20)->search($query);

        $users->appends(array('query' => $query))->links();

        return view('admin.views.users.index', compact('users', 'query'));
    }

    public function searchTrash()
    {
        $query = request('query');
        $users = User::onlyTrashed()->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->paginate(20);

        $users->appends(array('query' => $query))->links();
        return view('admin.views.users.trash', compact('users', 'query'));
    }

    public function balance($userId = null){
        return view('admin.views.users.balance',compact('userId'));
    }

    public function updateBalance(Request $request){
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);

        $user = User::find($request->user_id);
        if ($user) {

            if ($request->type == 'deposit') {
                $user->wallet->deposit($request->amount);
                session()->flash('success','مبلغ '.number_format($request->amount).' تومان به کیف پول ('.$user->name.' - ' .$user->phone.') اضافه شد. موجودی فعلی: '.number_format($user->wallet->balance).' تومان');
                return redirect()->back();

            }else if ($request->type == 'withdraw') {
                $user->wallet->withdraw($request->amount);
                session()->flash('success','مبلغ '.number_format($request->amount).' تومان از کیف پول ('.$user->name.' - ' .$user->phone.') کسر شد. موجودی فعلی: '.number_format($user->wallet->balance).' تومان');
                return redirect()->back();

            }else {
                session()->flash('error','کاربر انتخاب شده موجود نیست.');
                return redirect()->back();
            }
        }
        session()->flash('error','کاربر انتخاب شده موجود نیست.');
        return redirect()->back();
    }

    public function getBalance(){
        $user = User::find(request('user_id'));
        return response([
            'status' =>'success',
            'data' => number_format($user->wallet->balance)
        ]);
    }
}
