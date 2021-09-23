<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BackendDepartmentsController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('dashboard.departments.index', [
            'departments' => $departments,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Department $department, Request $request)
    {
        $this->addUpdate($department, $request);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    private function addUpdate(Department $department, Request $request)
    {
        // validated form data
        $input = $request->validate([
            'name' => 'required|unique:departments,name',
        ]);

        $department->name = $input['name'];
        $department->slug = Str::of($input['name'])->slug('-');

        auth('admin')->user()->departments()->save($department);
    }
}
