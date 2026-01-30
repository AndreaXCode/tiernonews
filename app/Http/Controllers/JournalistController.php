<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $journalists = Journalist::all();
        //return $jounalists;

        //2. Devolver una vista que los contenga (journalists  == selectAll());
        return view("journalist.index", compact("journalists"));
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
        //devuelvo una vista con un formulario de creación
        return view("journalist.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return "Ahora te lo guardo";
        Log::channel('stderr')->debug("Variable Request: " , [$request->nombre, $request->password]);
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
