<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Artículo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #ff4ecd, #2575fc);
            background-attachment: fixed;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Crear Nuevo Artículo</h3>

                        <form action="{{ route('article.store') }}" method="POST">
                            @csrf
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    value="{{ old('title') }}" 
                                    id="title" 
                                    name="title" 
                                    placeholder="Introduce el título del artículo">
                                    @error('title') <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido</label>
                                <textarea 
                                class="form-control @error('content') is-invalid @enderror" 
                                value="{{ old('content') }}" 
                                id="content" 
                                name="content" 
                                rows="5" 
                                placeholder="Escribe el contenido aquí..."></textarea>
                                @error('content') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Readers -->
                            <div class="mb-4">
                                <label for="readers" class="form-label">Número de Lectores</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('readers') is-invalid @enderror" 
                                    value="{{ old('readers') }}" 
                                    id="readers" 
                                    name="readers" 
                                    min="0" 
                                    placeholder="Ej: 100">
                                @error('readers') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Publicar Artículo
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
