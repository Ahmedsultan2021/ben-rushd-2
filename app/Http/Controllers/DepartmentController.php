<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(10);
        return view('dashboard.department.index', ["departments" => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::pluck('id', 'name'); // Pluck branch IDs with names
        return view('dashboard.department.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'brief' => 'required|string',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/departments'), $imageName);

        $department = new Department([
            'name' => $request->input('name'),
            'image' => $imageName,
            'brief' => $request->input('brief'),
            'branch_id' => $request->input('branch_id'),
        ]);

        $department->save();

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $branches = Branch::pluck('name', 'id'); // Modify this according to your actual structure

        return view('dashboard.department.show', ["department" => $department, "branches" => $branches]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $branches = Branch::pluck('name', 'id'); // Modify this according to your actual structure
        // dd($branches);
        return view('dashboard.department.edit', compact('department', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image', // Update image only if provided
            'brief' => 'required|string',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/departments'), $imageName);
            $department->image = $imageName;
        }

        $department->name = $request->input('name');
        $department->brief = $request->input('brief');
        $department->branch_id = $request->input('branch_id');
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success', 'department deleted successfully.');
    }
}
