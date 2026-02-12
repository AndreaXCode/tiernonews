<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head> 

<style>
    body {
            background: #4facfe;
            background: linear-gradient(135deg, #4facfe 0%, #8e2de2 100%);
            min-height: 100vh;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
</style>

<body>
    @include("components.headerArticle")   
    <!-- Formulario de creación de article:
     - title
     - content
     - readers -->

     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><br><br>
                <div class="card card-colorichi p-4">
                    <div class="card-body">
                        <h2 class="text-center mb-4" style="color: #764ba2;">✨ Editar el Article ✨</h2>
                        <p class="text-center text-muted mb-4">Crea tu perfil con todo el estilo</p>
                        
                        <form action="{{ route('article.update', $article->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Titulo</label>
                                    <input value="{{$article->title}}" name="title" type="text" class="form-control border-primary" id="title">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="content" class="form-label">Contenido</label>
                                    <textarea 
                                        class="form-control border-info"
                                        value="{{$article->content}}" 
                                        id="content" 
                                        name="content" 
                                        rows="5" 
                                        placeholder="Escribe el contenido aquí..."></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label name="readers" for="readers" class="form-label">Lectores</label>
                                <input value="{{$article->readers}}" name="readers" type="text" class="form-control border-success" id="readers">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(to right, #ff0080, #ff8c00); border: none; border-radius: 10px;">
                                    Guardar los cambios del articulo 🚀
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>