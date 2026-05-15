<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        // If admins are already logged in, they will be redirected to the post list.
        if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.post.indexB');
        }

        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');
    $remember = $request->boolean('remember');

    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        return redirect()->route('admin.post.indexB');
    }
    

    return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
