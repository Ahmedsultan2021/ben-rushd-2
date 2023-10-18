<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\FormField;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::paginate(9);
        return view('dashboard.forms.index', ["forms" => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'form_fields' => 'required|array',
            'form_fields.*.type' => 'required|in:text,email,number,date,textarea,select,checkbox,radio,file',
            'form_fields.*.label' => 'required|string|max:255',
            'form_fields.*.required' => 'required|boolean',
            'form_fields.*.options' => 'nullable|array',
        ]);


        $form = Form::find($request->form_id);
        if (!$form) {
            return response()->json(['message' => 'Form not found'], 404);
        }
    
        // Assuming a form can belong to multiple campaigns, let's check if there's any active campaign for this form.
        $activeCampaign = $form->campaigns()->where('startTime', '<=', now())
            ->where('endTime', '>=', now())
            ->first();
    
        if (!$activeCampaign) {
            return response()->json(['message' => 'No active campaign for this form'], 400);
        }

        // Begin Transaction
        DB::beginTransaction();

        try {
            // Create Form
            $form = Form::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description']
            ]);

            // Create Fields for the Form
            foreach ($validatedData['form_fields'] as $order => $field) {
                FormField::create([
                    'form_id' => $form->id,
                    'type' => $field['type'],
                    'label' => $field['label'],
                    'required' => $field['required'],
                    'order' => $order + 1, // Assuming 1-indexed order.
                    'options' => isset($field['options']) ? json_encode($field['options']) : null,
                ]);
            }

            // Commit Transaction
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Form saved successfully!']);
        } catch (\Exception $e) {
            // Rollback Transaction on Error
            DB::rollback();

            // Log the error (you can log more details about the error as required)
            Log::error('Error saving form: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        // $formFields = $form->fields;
        $formFields = FormField::where('form_id', $form->id)->get();
        foreach ($formFields as &$field) {
            if ($field->options) {
                $field->options = json_decode($field->options, true);
            }
        }

        return  view('dashboard.forms.show', ["form" => $form, "formFields" => $formFields]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        // $formFields = $form->fields;
        $formFields = FormField::where('form_id', $form->id)->get();
        foreach ($formFields as &$field) {
            if ($field->options) {
                $field->options = json_decode($field->options, true);
            }
        }


        return  view('dashboard.forms.edit', ["form" => $form, "formFields" => $formFields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return response()->json(['request' => $request->all()]);

        $form = Form::findOrFail($id);
        if (!$form) {
            return redirect()->back()->with('error', 'Form not found');
        }
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'form_fields' => 'required|array',
            'form_fields.*.type' => 'required|in:text,email,number,date,textarea,select,checkbox,radio,file',
            'form_fields.*.label' => 'required|string|max:255',
            'form_fields.*.required' => 'required|boolean',
            'form_fields.*.options' => 'nullable|array',
        ]);

        // Begin Transaction
        DB::beginTransaction();

        try {
            // Update Form
            $form->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description']
            ]);

            $form->fields()->delete();

            // Create Fields for the Form
            foreach ($validatedData['form_fields'] as $order => $field) {
                FormField::create([
                    'form_id' => $form->id,
                    'type' => $field['type'],
                    'label' => $field['label'],
                    'required' => $field['required'],
                    'order' => $order + 1, // Assuming 1-indexed order.
                    'options' => isset($field['options']) ? json_encode($field['options']) : null,
                ]);
            }

            // Commit Transaction
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Done']);
        } catch (\Exception $e) {
            // Rollback Transaction on Error
            DB::rollback();

            // Log the error
            Log::error('Error updating form: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
