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
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))){

            if(Auth::guard('admin')->user()->role->name == 'doctor'){
                return redirect()->route('dashboard.doctor');
            }

            return redirect()->intended(route('dashboard.admin'));

        } else{
            throw ValidationException::withMessages([
                'email' => 'invalid email or password',
            ]);
        }

    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.user.login');
    }
}
