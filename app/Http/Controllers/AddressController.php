<?php

namespace App\Http\Controllers;

use App\Models\Address;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::with('island')->get();
        return response()->json($addresses);
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
    {// Validate the request data
        $validated = $request->validate([
            'street' => 'required|string',
            'city' => 'required|string',
            'island_id' => 'required|exists:islands,id',
        ]);

        // Create a new address record using the validated data
        $address = Address::create($validated);

        // Return the created address as a JSON response with a 201 status code
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the address with the related island, or fail with a 404 error
        $address = Address::with('island')->findOrFail($id);

        // Return the address as a JSON response
        return response()->json($address);
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
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'street' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'island_id' => 'sometimes|required|exists:islands,id',
        ]);

        // Find the address record or fail with a 404 error
        $address = Address::findOrFail($id);

        // Update the address record with the validated data
        $address->update($validated);

        // Return the updated address as a JSON response
        return response()->json($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::destroy($id);
        return response()->noContent();
    }
}
