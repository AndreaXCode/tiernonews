<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journalist;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return "Estoy en el index de JournalistController";
        //1. Buscar todos los journalist de la DB
        $jounalists = Journalist::all();
        return $jounalists;
            
        //2. Devolver una vista que los contenga


    }


    public function sayName($name)
    {
        return "Hola $name";
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
