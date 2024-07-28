<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']
        ]);
        $data = Department::create([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        return response()->json('success');
    }

    public function getDepartment()
    {
        return response()->json(Department::latest()->get());
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']
        ]);
        $data = Department::where('id', $id)->update([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        return response()->json('success');
    }

    public function deleteDepartment($id)
    {
        Department::where('id', $id)->delete();
        return response()->json('success');
    }
    

    public function index()
    {
        $department = Department::all();
        return view('management.department.index', compact('department'));
    }

    public function create()
    {
        return view('management.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']
        ]);
        $data = Department::create([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        Session::flash('success-message', 'Department Created Successfully');
        return redirect()->route('department.index');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('management.department.edit', compact('department'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']
        ]);
        $data = Department::where('id', $id)->update([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        Session::flash('success-message', 'Department Updated Successfully');

        return redirect()->route('department.index');
    }

    public function delete($id)
    {
        Department::where('id', $id)->delete();
        Session::flash('success-message', 'Department Deleted Successfully');

        return redirect()->route('department.index');
    }
}
