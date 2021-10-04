<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackendDoctorsController extends Controller
{

    public function index()
    {
        // $roles = Role::with('admins')->where('name', 'doctor')->get();
        $doctors = Doctor::with('admin')->get();

        // dd($roles);
        // return $roles;
        return view('dashboard.doctors.index', [
            'doctors' => $doctors,
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

    public function store(Request $request)
    {
        // doctor is stored using RegisteredAdminController methods
    }

    public function show($id)
    {
        $doctor = Doctor::with('admin')->findOrFail($id);;
        return view('dashboard.doctors.show', [
            'doctor' => $doctor,
        ]);
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
        $input = $request->validate([
            'dob' => 'nullable',
            'age' => 'nullable|integer',
            'region' => 'nullable|string',
            'religion' => 'nullable|string',
            'mobile' => 'nullable|string',
            'next_of_kin' => 'nullable|string',
            'emergency_contact' => 'nullable|string',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        if(request('image')){
            $filename = $request->image->getClientOriginalName();
            $input['image'] = request('image')->move('profiles', $filename);
        }

        $doctor = Doctor::findOrFail($id);
        $doctor->dob = $input['dob'];
        $doctor->age = $input['age'];
        $doctor->region = $input['region'];
        $doctor->religion = $input['religion'];
        $doctor->mobile = $input['mobile'];
        $doctor->next_of_kin = $input['next_of_kin'];
        $doctor->emergency_contact = $input['emergency_contact'];

        if(request('image')){
            $doctor->image = $input['image'];
        }

        $doctor->save();

        return redirect()->route('dashboard.doctor.show', $doctor->id);
    }

    public function destroy($id)
    {
        //
    }

    public function change_password($id)
    {
        $doctor = Doctor::with('admin')->findOrFail($id);

        return view('doctors.change_password', [
            'doctor' => $doctor,
        ]);
    }

    public function password_update(Request $request, $id)
    {
        $input = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::findOrFail($id);
        $admin->password = Hash::make($input['password']);

        $admin->save();
        return redirect()->route('dashboard.doctor.show', $admin->doctor->id);
    }

    public function patients(){

        return view('dashboard.doctors.patients');
    }
}
