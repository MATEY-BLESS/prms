<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    public function store(Request $request)
    {
        // admin login logic
        if(!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))){
            throw ValidationException::withMessages([
                'email' => 'invalid email or password',
            ]);
        }

        return redirect()->intended(route('dashboard.admin'));

    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.user.login');
    }
}
