<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Form;
use Carbon\Carbon;
use App\Exports\FormExport;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::paginate(9);
        return view('dashboard.advertisingCamp.index', ["campaigns" => $campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms = Form::pluck("name", "id");
        return view('dashboard.advertisingCamp.create', ["forms" => $forms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'startTime' => 'required|date_format:Y-m-d\TH:i',
            'endTime' => 'required|date_format:Y-m-d\TH:i|after:startTime',
            'forms' => 'nullable|array',
            'forms.*' => 'exists:forms,id',
        ]);

        // Image upload
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/campaigns'), $imageName);

        // Create new campaign
        $campaign = new Campaign([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'user_id' => Auth::user()->id,  // Assuming the campaign belongs to a user
        ]);

        $campaign->save();

        if ($request->has('forms')) {
            $campaign->forms()->sync($request->forms);  // Sync the selected forms
        }

        return redirect()->route('campaign.index')->with('success', 'Campaign created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */

     public function show(Campaign $campaign)
     {
         $fromDate = request('from_date') ? Carbon::parse(request('from_date')) : null;
         $toDate = request('to_date') ? Carbon::parse(request('to_date'))->endOfDay() : null;
         $formId = request('form_id');
         $perPage = 3; // Number of items per page. Adjust as needed.
     
         // Load all the relationships first without any conditions.
         $campaign->load([
             'forms.fields',
             'forms.formResponses.fieldResponses',
         ]);
     
         $forms = $campaign->forms;
     
         foreach ($forms as $form) {
             $query = $form->formResponses();
     
             $page = request('page_' . $form->id);
     
             // If a form_id is provided in the request, apply the date filters only to the form that matches the provided form_id.
             if ($formId && $form->id == $formId) {
                 if ($fromDate && $toDate) {
                     $query->whereBetween('created_at', [$fromDate, $toDate]);
                 } elseif ($fromDate) {
                     $query->whereDate('created_at', '>=', $fromDate);
                 } elseif ($toDate) {
                     $query->whereDate('created_at', '<=', $toDate);
                 }
             }
     
             // If no form_id is provided in the request, just paginate all the form responses without any filters.
             $form->setRelation('formResponses', $query->paginate($perPage, ['*'], 'page_' . $form->id, $page));
         }
     
         return view('dashboard.advertisingCamp.show', compact('campaign', 'forms'));
     }
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('dashboard.advertisingCamp.edit', ["campaign" => $campaign]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        // Validation rules
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'startTime' => 'required|date_format:Y-m-d\TH:i',
            'endTime' => 'required|date_format:Y-m-d\TH:i|after:startTime',
        ]);

        // Optional: Image upload if an image file is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/campaigns'), $imageName);
            $campaign->image = $imageName;
        }

        // Update existing campaign
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->startTime = $request->input('startTime');
        $campaign->endTime = $request->input('endTime');

        // Save changes
        $campaign->save();

        // Update the associated forms
        if ($request->has('forms')) {
            $campaign->forms()->sync($request->forms);  // Sync the selected forms
        }

        return redirect()->route('campaign.index')->with('success', 'Campaign updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaign.index')->with('success', 'Campaign Deleted successfully.');
    }

    

    public function export(Form $form) {
        return Excel::download(new FormExport($form), 'form-data.xlsx');
    }
}
