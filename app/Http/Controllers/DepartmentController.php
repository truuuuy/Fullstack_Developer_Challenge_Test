<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('Departements.index', compact('departments'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui');
    }

    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus');
    }
}
