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
        
        //Log::channel('stderr')->debug("Variable Request: " , [$request->nombre, $request->password]);
        //todo $fillable
        

        //Antes de guardar en las bases de datos (DB) hacemos validaciones
        $request->validate([
            "name" => "min:4|max:8|required", 
            "surname" => "required",
            "password" => "min:4|required",
            "email" => "unique:journalists,email|required"
        ]);

        $j = new Journalist($request->all());
        Log::channel('stderr')->debug("Variable Request: " , [$j->email]);

        $j->save();
        //Para crear el index tengo que buscar todos los periodistas en DB
        //$journalists = Journalist::all();
        //return view('journalist.index', compact("journalists"));
        return redirect()->route('journalist.create');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //1. Busco en la Db a ese periodista
        $journalist = Journalist::find($id);

        //2. Devuelvo una vista con la info del periodista
        return view('journalist.show', compact("journalist"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //1. Busco el periodista en la DB
        $journalist = Journalist::find($id);

        //2. Devuelvo la con el formulario de edicion
        return view('journalist.edit', compact("journalist"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //1. Voy a actualizar todo menos la contraseña
        //Busco el la DB el journalist con ese id
        $journalist = Journalist::find($id);

        //2. Actualizo los campos correspondientes
        $journalist->name = $request->name;
        $journalist->surname = $request->surname;
        $journalist->email = $request->email;

        //3. Hago el update
        $journalist->update();

        //4. Devuelvo al show
        //Lo voy a buscar PERO SOLO PARA COMPROBAR QUE SE HA ACTUALIZADO
        //$jounalist = Journalist::find($id);

        return view('journalist.show', compact('journalist'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //1. Busco el journalist que voy a eliminar
        $j = Journalist::find($id);
        if($j == null) {
            $message = "El periodista no existe";
        }

        //2. Eliminamos si existe el id
        Journalist::destroy($id);
        $message = "Periodista " . $j->name . " eliminado";

        //3. Devolvemos al index
        $journalists = Journalist::all();
        return redirect()->route('journalist')->with('deleted', $message);
    }
}    