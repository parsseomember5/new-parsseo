<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(20);
        return view('admin.views.admins.index',compact('admins'));
    }

    public function create()
    {
        return view('admin.views.admins.create');
    }

    public function edit(Admin $admin)
    {
        return view('admin.views.admins.edit',compact('admin'));
    }

    public function update(Admin $admin,Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|digits:11',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif',
            'email' => 'required|email|max:255|unique:admins,email,'.$admin->id,
            'instagram' => 'nullable|string|max:1024',
            'telegram' => 'nullable|string|max:1024',
            'facebook' => 'nullable|string|max:1024',
            'twitter' => 'nullable|string|max:1024',
            'linkedin' => 'nullable|string|max:1024',
            'dribbble' => 'nullable|string|max:1024',
            'password' => 'required|min:8|confirmed'
        ]);
        $inputs = request()->except('_token');

        // avatar image
        if ($request->remove_avatar_image != null) {
            $this->removeStorageFile(request('remove_avatar_image'));
            $inputs['avatar'] = null;
        }
        if ($request->hasFile('avatar')) {
            $inputs['avatar'] = $this->uploadRealFile($request->file('avatar'),'admins');
        }

        if ($request->has('password') && $request->password != ''){
            $inputs['password'] = Hash::make($request->password);
        }else{
            $inputs['password'] = $admin->password;
        }

        $admin->update($inputs);

        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect(route('admins.index'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|digits:11',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif',
            'email' => 'required|email|max:255|unique:admins',
            'instagram' => 'nullable|string|max:1024',
            'telegram' => 'nullable|string|max:1024',
            'facebook' => 'nullable|string|max:1024',
            'twitter' => 'nullable|string|max:1024',
            'linkedin' => 'nullable|string|max:1024',
            'dribbble' => 'nullable|string|max:1024',
            'password' => 'required|min:8|confirmed'
        ]);

        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $inputs['avatar'] = $this->uploadRealFile($request->file('avatar'),'admins');
        }

        Admin::create($inputs);

        session()->flash('success','ادمین جدید با موفقیت اضافه شد.');
        return redirect(route('admins.index'));
    }

    public function destroy(Admin $admin)
    {
        if ($this->isMine($admin)) {
            session()->flash('error', 'شما نمیتوانید حساب کاربری خود را حذف کنید.');
        }else{
            $admin->delete();
            session()->flash('success','ادمین با موفقیت حذف شد.');
        }
        return redirect(route('admins.index'));
    }

    protected function isMine(Admin $admin): bool
    {
        return $admin->id == auth()->guard('admin')->user()->id;
    }

    public function restore($id)
    {
        $admin = Admin::withTrashed()->where('id',$id)->first();
        $name = $admin->name;
        $admin->restore();

        session()->flash('success', 'ادمین (' . $name . '.) با موفقیت بازگردانی شد');
        return redirect(route('admins.trash'));
    }

    public function forceDelete()
    {
        $admin = Admin::withTrashed()->where('id',request('id'))->first();
        $name = $admin->name;

        $admin->posts()->delete();
        $admin->products()->delete();
        $admin->comments()->delete();
        $admin->teacherProducts()->delete();
        $admin->ticketReplies()->delete();
        $admin->forceDelete();

        if ($admin->avatar){
            $this->removeStorageFile($admin->avatar);
        }

        session()->flash('success', 'ادمین (' . $name . ') با موفقیت حذف شد.');
        return redirect(route('admins.trash'));
    }

    public function emptyTrash()
    {
        Admin::onlyTrashed()->forceDelete();
        session()->flash('success','زباله‌دان خالی شد.');
        return redirect(route('admins.trash'));
    }
}
