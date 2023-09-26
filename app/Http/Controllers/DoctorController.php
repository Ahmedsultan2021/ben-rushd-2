<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctors = Doctor::paginate(9);
        return view('dashboard.doctors.index', ["doctors" => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::pluck("id", "name");
        $departments = Department::pluck("id", "name");
        // dd($branches);

        return view('dashboard.doctors.create', ["branches" => $branches, "departments" => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Start a transaction
        DB::beginTransaction();

        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'qualifications' => 'required|json',
                'experiences' => 'required|json',
                'department_ids' => 'nullable|array', // Note the change to array type
                'department_ids.*' => 'exists:departments,id', // Ensure each department_id exists
                'branch_ids' => 'nullable|array',
                'branch_ids.*' => 'exists:branches,id',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'speciality' => 'required|string|max:255',
                'degree' => 'required|string|max:255',
                'brief' => 'required|string',
                'gender' => 'required|string|in:Male,Female,Other',
                'highligthed' => 'required|boolean|in:0,1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle the image
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/doctors'), $imageName);
            } else {
                $gender = $request->input('gender');
                if ($gender === 'Male') {
                    $imageName = 'man.jpg';
                } elseif ($gender === 'Female') {
                    $imageName = 'woman.jpg';
                }
            }

            // Create the doctor
            $doctor = Doctor::create([
                'fname' => $validatedData['fname'],
                'lname' => $validatedData['lname'],
                'qualifications' => $validatedData['qualifications'],
                'experience' => $validatedData['experiences'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'speciality' => $validatedData['speciality'],
                'Degrees' => $validatedData['degree'],
                'brief' => $validatedData['brief'],
                'gender' => $validatedData['gender'],
                'highligthed' => $validatedData['highligthed'],
                'image' => $imageName,
            ]);

            // Associate the doctor with branches
            if (isset($validatedData['branch_ids'])) {
                $doctor->branches()->sync($validatedData['branch_ids']);
            }

            // Associate the doctor with departments
            if (isset($validatedData['department_ids'])) {
                $doctor->departments()->sync($validatedData['department_ids']);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('doctor.index')->with('success', 'Doctor created successfully.');
        } catch (\Exception $e) {
            // An error occurred; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('dashboard.doctors.show', ["doctor" => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $branches = Branch::pluck("id", "name");
        $departments = Department::pluck("id", "name");
        // dd($doctor);
        return view('dashboard.doctors.edit', ["doctor" => $doctor, "branches" => $branches, "departments" => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Start a transaction
        DB::beginTransaction();
    
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'qualifications' => 'required|json',
                'experiences' => 'required|json',
                'department_ids' => 'nullable|array', // Note the change to array type
                'department_ids.*' => 'exists:departments,id', // Ensure each department_id exists
                'branch_ids' => 'nullable|array',
                'branch_ids.*' => 'exists:branches,id',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'speciality' => 'required|string|max:255',
                'degree' => 'required|string|max:255',
                'brief' => 'required|string',
                'gender' => 'required|string|in:Male,Female,Other',
                'highligthed' => 'required|boolean|in:0,1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // Fetch the existing doctor
            $doctor = Doctor::findOrFail($id);
    
            // Handle the image if there's one
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/doctors'), $imageName);
    
                // Optionally: remove the old image from storage if it's not a default image
                if ($doctor->image !== 'man.jpg' && $doctor->image !== 'woman.jpg') {
                    File::delete(public_path('images/doctors/' . $doctor->image));
                }
            } else {
                // If the doctor doesn't already have an image, set a default one
                if (!$doctor->image) {
                    $gender = $request->input('gender');
                    if ($gender === 'Male') {
                        $imageName = 'man.jpg';
                    } elseif ($gender === 'Female') {
                        $imageName = 'woman.jpg';
                    }
                } else {
                    $imageName = $doctor->image; // Use the existing image if not updated
                }
            }
    
            // Update the doctor's data
            $doctor->update([
                'fname' => $validatedData['fname'],
                'lname' => $validatedData['lname'],
                'qualifications' => $validatedData['qualifications'],
                'experience' => $validatedData['experiences'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'speciality' => $validatedData['speciality'],
                'Degrees' => $validatedData['degree'],
                'brief' => $validatedData['brief'],
                'gender' => $validatedData['gender'],
                'highligthed' => $validatedData['highligthed'],
                'image' => $imageName,
            ]);
    
            // Sync the doctor with branches
            if (isset($validatedData['branch_ids'])) {
                $doctor->branches()->sync($validatedData['branch_ids']);
            }
    
            // Sync the doctor with departments
            if (isset($validatedData['department_ids'])) {
                $doctor->departments()->sync($validatedData['department_ids']);
            }
    
            // Commit the transaction
            DB::commit();
    
            return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully.');
    
        } catch (\Exception $e) {
            // An error occurred; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }
    



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'doctor deleted successfully.');
    }
}
