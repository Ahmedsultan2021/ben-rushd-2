<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
     
        return view('dashboard.branches.index',["branches"=>$branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'brief' => 'required|string',
            'address' => 'required|string',
            'coordinates' => 'required|string',
            'active' => 'required|boolean', // Add validation for the 'active' field

        ]);
    
        // Separate the coordinates into latitude and longitude
        [$latitude, $longitude] = explode(',', $request->input('coordinates'),20);
        
        $image = $request->file('image');
    
        // Create a new branch instance
        $branch = new Branch([
            'name' => $request->input('name'),
            'brief' => $request->input('brief'),
            'address' => $request->input('address'),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'active' => $request->input('active'), // Assign the 'active' field value
            'user_id' => Auth::user()->id,
        ]);
    
        // Handle and store the image
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/branches'), $imageName);
            $branch->image = $imageName;
        }
    
        // Store the worktimes array as is
        // dump($request->input('worktimes'));
         $worktimes =json_encode($request->input('worktimes'));
        $branch->worktimes = $worktimes;

        
        // dump($branch->worktimes);
        // dd(json_decode($branch->worktimes));
    
        // Save the branch to the database
        $branch->save();
    
        return redirect()->route('branches.index')->with('success', 'Branch added successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $branch->worktimes = json_decode($branch->worktimes);

        return view("dashboard.branches.show",["branch"=>$branch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
            // Decode the worktimes JSON for each branch
         $branch->worktimes = json_decode($branch->worktimes);
        //  dd($branch->worktimes);
        
        return view("dashboard.branches.edit",["branch"=>$branch]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the branch by its ID
        $branch = Branch::findOrFail($id);
    
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string',
            'image' => 'image',
            'brief' => 'required|string',
            'address' => 'required|string',
            'coordinates' => 'required|string',
            'active' => 'required|boolean',
        ]);
    
        // Separate the coordinates into latitude and longitude
        [$latitude, $longitude] = explode(',', $request->input('coordinates'), 20);
        
        // Update branch attributes
        $branch->name = $request->input('name');
        $branch->brief = $request->input('brief');
        $branch->address = $request->input('address');
        $branch->latitude = $latitude;
        $branch->longitude = $longitude;
        $branch->active = $request->input('active');
        $branch->user_id = Auth::user()->id;
    
        // Handle and store the image only if a new one has been uploaded
        if ($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/branches'), $imageName);
            
            // Optional: Delete the old image if required
    
            $branch->image = $imageName;
        }
    
        // Store the worktimes array as is
        $worktimes = json_encode($request->input('worktimes'));
        $branch->worktimes = $worktimes;
    
        // Save the branch to the database
        $branch->save();
        
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index');
    }
}
