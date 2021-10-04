<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewAdminUserEvent;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredAdminController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admins.register', compact('roles'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admins.edit', compact('roles', 'admin'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Admin $admin, Request $request)
    {
        // return $request;
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'nullable',
            'department_id' => 'nullable',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => 'nullable',
            'age' => 'nullable|integer',
            'region' => 'nullable|string',
            'religion' => 'nullable|string',
            'mobile' => 'nullable|string',
            'next_of_kin' => 'nullable|string',
            'emergency_contact' => 'nullable|string',
        ]);

        $admin->name = $input['name'];
        $admin->slug = Str::of($input['name'])->slug('-');
        $admin->email = $input['email'];
        $admin->role_id = $input['role_id'];
        $admin->department_id = $input['department_id'];
        $admin->password = Hash::make($input['password']);

        $admin->save();

        $doctor = $admin->doctor()->create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'dob' => $request->dob,
            'age' => $request->age,
            'region' => $request->region,
            'religion' => $request->religion,
            'mobile' => $request->mobile,
            'next_of_kin' => $request->next_of_kin,
            'emergency_contact' => $request->emergenccy_contact,
        ]);

        // event(new NewAdminUserEvent($admin));

        // Auth::login($admin);

        return redirect()->route('dashboard.admin.index');
    }

    public function update(Request $request, $id)
    {
        return "it will work";
    }
}
