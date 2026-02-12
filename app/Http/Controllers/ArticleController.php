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
        //1. Buscar todos los articles de la DB
        //Dentro de una variaable guardo  todos los articles
        $articles = Article::all();

        //2. Devolver una vista que los contenga (articles  == selectAll());
        return view("article.index", compact("articles"));
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
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editquestion(Article $article)
    {
        //DUDAAA
    }

    public function edit(string $id)
    {
        //1. Encontrar el articulo por el id (Buscar Article en la DB por id)
        $article = Article::find($id);

        //2. Devuelvo la vista con el formulario de edicion
        return view("article.edit", compact('article'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //1. Voy a actualizar todo menos la contraseña
        //Busco el la DB el journalist con ese id  --> Encontrar por id
        //$article = Article::find($article->$id);
            //--> Ya no se necesita Article::find, $article ya es el objeto correcto.

        //2. Actualizo los campos correspondientes
        $article->title = $request->title;
        $article->content = $request->content;
        $article->readers = $request->readers;

        //3. Hago el update
        //$article->update();

        //LO HICE ASI:
        $article->save();

        //4. Devuelvo al show
        //Lo voy a buscar PERO SOLO PARA COMPROBAR QUE SE HA ACTUALIZADO
        //$jounalist = Journalist::find($id);

        return view('article.show', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //1. Busco el article que voy a eliminar
        //$a = Article::

        //1. Elimino el articulo
        $article->delete();

        return redirect()->route('article')->with('success', 'Articulo eliminado corresctamente');
    }
    
}
