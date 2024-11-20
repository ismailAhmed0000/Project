<?php

namespace App\Http\Controllers;

use App\Models\Island;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    // Method to fetch all islands
    public function getIslands()
    {
        // Retrieve all islands from the database
        $islands = Island::all();

        // Return as JSON response
        return response()->json($islands);
    }
}
