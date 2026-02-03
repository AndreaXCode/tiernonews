<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Journalist;

class JournalistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //1. Busco el journalist con ese id
        $j = Journalist::find($id);

        //2. Lo devuelvo en formato JSON
        return response()->json($j);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
