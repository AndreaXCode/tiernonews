<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    //eliminar los artículos que tengan entre min y max readers
    // para eliminiar quiero hacer un HTTP DELETE, xej: http://127.0.0.1:8000/api/delete?minReaders=5&maxReaders=9
    // o esto: http://127.0.0.1:8000/api/delete?maxReaders=5, en este caso, se eliminan todos los artículos de menos de los readers indicados en maxReaders
    public function deleteByReaders(Request $request)
    {
        //1. compruebo si existen los parámetros de la url: maxReaders es obligatorio, minReaders no.
        if (isset($request->maxReaders)) {
            $minReaders = -1;
            if (isset($request->minReaders)) {
                $minReaders = $request->minReaders;
            }

            //2. creo y lanzo la consulta sql con where (primero tengo que hacer un count, luego un delete)
            $number = Article::where('readers', '>=', $minReaders)
                ->where('readers', '<=', $request->maxReaders)
                ->count();
            Article::where('readers', '>=', $minReaders)
                ->where('readers', '<=', $request->maxReaders)
                ->delete();

            //3. devuelvo un json con la cantidad de artículos eliminados en un JSON tipo:
            /*  {
                    "message": "deleted",
                    "data": "3"
                }  */
            return response()->json([
                "message" => "deleted",
                "data" => $number
            ]);
        }
    }
}
