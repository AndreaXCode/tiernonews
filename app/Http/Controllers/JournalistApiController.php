<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;

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
        $j = new Journalist($request->all());
        $j->save();
        return response()->json($j);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //1. Busco el journalist con ese id
        $j = Journalist::find($id);

        if ($j != null) {
            //2. Lo devuelvo en formato JSON
            return response()->json([
                "message" => "Journalist found",
                "data" => $j
            ]);  //Código 200
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //1. Busco por id
        $j = Journalist::find($id);
        if ($j != null) {
            $j->name = $request->name;
            $j->surname = $request->surname;
            $j->email = $request->email;
            $j->update();
            return response()->json([
                "message" => "Updated",
                "data" => $j
            ]);  //200 OK
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1. Busco por id
        $j = Journalist::find($id);
        if ($j != null) {
            $j->delete();

            return response()->json([
                "message" => "Deleted",
                "data" => $j
            ]);  //200 OK
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }

    }
}
