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
        //Devuelvo la vista con un formulario de creación
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. Validar
        //Verificaciones
        //Antes de guardar en las bases de datos (DB) hacemos validaciones
        $request->validate([
            "title"=>"min:4|max:20|required",
            "content"=>"min:10|max:500|required",
            "readers"=>"required|integer|min:2|max:250"
        ]);

        //2. Guardar (Debo asegurarme de tener $fillable en el modelo de Article)
        $a = new Article($request->all());

        //Log para revisar
        //Log::channel('stderr')->debug("Variable Request HHHHHHHHH: " , [$a->title]);

        //Lo guardo
        $a->save();

        //other form:
        //--> Article::create($request->all()); ??

        //3. Redirigo
        return redirect()->route('article.create');

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
    
}
