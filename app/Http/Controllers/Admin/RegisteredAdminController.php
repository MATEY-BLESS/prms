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
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(request('image')){
            $filename = $request->image->getClientOriginalName();
            $input['image'] = request('image')->move('profiles', $filename);
        }

        // $admin = Admin::create([
        //     'name' => $request->name,
        //     'slug' => Str::of($request['name'])->slug('-'),
        //     'email' => $request->email,
        //     'role_id' => $request->role_id,
        //     'department_id' => $request->department_id,
        //     'image' => $input['image'],
        //     'password' => Hash::make($request->password),
        // ]);

        $admin->name = $input['name'];
        $admin->slug = Str::of($input['name'])->slug('-');
        $admin->email = $input['email'];
        $admin->role_id = $input['role_id'];
        $admin->department_id = $input['department_id'];
        $admin->password = Hash::make($input['password']);

        if(request('image')){
            $admin->image = $input['image'];
        }

        $admin->save();

        // event(new NewAdminUserEvent($admin));

        // Auth::login($admin);

        return redirect()->route('dashboard.admin.index');
    }
}
