<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','resetPassword','update']);
    }


    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }


    public function showLoginForm()
    {
        return view('admin.views.auth.login');
    }




}
