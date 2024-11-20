<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all patients with their related addresses
        $patients = Patient::with('address')->get();

        // Return the data as a JSON response
        return response()->json($patients);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'national_id' => 'required|string|max:20',
        'city' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'selected_island' => 'required|integer|exists:islands,id',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Automatically create the address
    $address = \App\Models\Address::firstOrCreate([
        'city' => $request->input('city'),
        'street' => $request->input('street'),
        'island_id' => $request->input('selected_island'),
    ]);

    // Create the patient and associate with the newly created address
    $patient = \App\Models\Patient::create([
        'name' => $request->input('name'),
        'dob' => $request->input('dob'),
        'national_id' => $request->input('national_id'),
        'address_id' => $address->id, // Associate with created address
    ]);

    return response()->json(['message' => 'Patient registered successfully!', 'patient' => $patient], 201);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the patient by ID or fail with a 404 error
        $patient = Patient::with('address')->findOrFail($id);

        // Return the patient as a JSON response
        return response()->json($patient);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { // Validate the request data
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'dob' => 'sometimes|required|date',
            'national_id' => 'sometimes|required|string|unique:patients,national_id,' . $id,
            'address_id' => 'sometimes|required|exists:addresses,id',
        ]);

        // Find the patient by ID or fail with a 404 error
        $patient = Patient::findOrFail($id);

        // Update the patient record
        $patient->update($validated);

        // Return the updated patient as a JSON response
        return response()->json($patient);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);
        return response()->noContent();

    }
}
