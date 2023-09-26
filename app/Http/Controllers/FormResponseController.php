<?php

namespace App\Http\Controllers;

use App\Models\FieldResponse;
use App\Models\FormField;
use App\Models\FormResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FormResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formResponses = FormResponse::all();
        return view('formResponses.index', compact('formResponses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'form_id' => 'required|exists:forms,id',
            'field_responses.*.form_field_id' => 'required|exists:form_fields,id',
            'field_responses.*.value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 400);
        }

        return DB::transaction(function () use ($request) {
            try {
                $formResponse = FormResponse::create([
                    'form_id' => $request->form_id,
                ]);

                $fieldResponses = collect($request->field_responses)->map(function ($fieldObj) use ($formResponse) {
                    $form_field_id = $fieldObj['form_field_id'];
                    $value = $fieldObj['value'];

                    // Check the existence of form field
                    if (!FormField::find($form_field_id)) {
                        throw new \Exception("Invalid form_field_id: " . $form_field_id);
                    }

                    // Serialize the value if it is an array
                    $storedValue = is_array($value) ? serialize($value) : $value;

                    return [
                        'form_response_id' => $formResponse->id,
                        'form_field_id' => $form_field_id,
                        'value' => $storedValue,
                    ];
                });

                FieldResponse::insert($fieldResponses->toArray());

                return response()->json(['message' => 'Form response successfully submitted.'], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Error while submitting form response: ' . $e->getMessage()], 500);
            }
        });
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function show(FormResponse $formResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(FormResponse $formResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormResponse $formResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormResponse $formResponse)
    {
        $formResponse->delete();
        return redirect()->route('campaign.show')->with('success', 'Form response successfully deleted.');
    }
}
