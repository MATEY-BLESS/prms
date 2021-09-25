<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Http\Request;

class BackendDoctorsController extends Controller
{

    public function index()
    {
        $roles = Role::with('admins')->where('name', 'doctor')->get();

        // dd($roles);
        // return $roles;
        return view('dashboard.doctors.index', [
            'roles' => $roles,
        ]);
    }


    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('dashboard.doctors.create', [
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $adminRole = $admin->role;
        $roles = Role::all();

        $departments = department::all();
        return view('dashboard.doctors.edit', [
            'roles' => $roles,
            'departments' => $departments,
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function patients(){


        return view('dashboard.doctors.patients');
    }
}
