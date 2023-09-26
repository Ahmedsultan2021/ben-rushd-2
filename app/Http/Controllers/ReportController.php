<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $reportsQuery = Report::query();

        // Date filtering
        if ($request->has('from_date') && $request->input('from_date') != '') {
            $reportsQuery->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->input('to_date') != '') {
            $reportsQuery->whereDate('created_at', '<=', $request->input('to_date'));
        }

        // Search functionality
        if ($request->has('report_search') && $request->input('report_search') != '') {
            $searchTerm = $request->input('report_search');
            $reportsQuery->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('FileNumber', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $reports = $reportsQuery->paginate(20);

        return view('dashboard.askForReport.index', ["reports" => $reports]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'FileNumber' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        // Create the report
        $report = Report::create($validatedData);

        return redirect()->route('reportpage', ["branch_id" => $validatedData["branch_id"]])->with('success', 'Report created successfully.');
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('report.index')->with('success', 'تم ازالة التقرير بنجاح');
    }
}
