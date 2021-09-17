<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;

class BackendAdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admins.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Role $role, Request $request)
    {
        $this->addUpdate($role, $request);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('admins.roles.edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $this->addUpdate($role, $request);
        return redirect()->route('dashboard.admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('dashboard.admin.role.index');
    }

    private function addUpdate(Role $role, Request $request)
    {
         // validated form data
         $input = $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role->name = $input['name'];
        $role->slug = Str::of($input['name'])->slug('-');

        auth('admin')->user()->roles()->save($role);
    }
}
