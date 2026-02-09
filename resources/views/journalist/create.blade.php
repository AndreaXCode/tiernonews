<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new journalist</title>
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
    @include("components.header")   
    <!-- Formulario de creación de journalist:
     - nombre
     - apellidos
     - email
     - contraseña
     - repite la contraseña
    --> 
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><br><br>
                <div class="card card-colorichi p-4">
                    <div class="card-body">
                        <h2 class="text-center mb-4" style="color: #764ba2;">✨ Nuevo Journalist ✨</h2>
                        <p class="text-center text-muted mb-4">Crea tu perfil con todo el estilo</p>
                        
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif    

                        <form action="{{ route('journalist.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control border-primary" id="name" placeholder="Ej: Elena" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    <!-- old recupera el valor antiguo (si no pasó validación) -->
                                <!-- ARROBAerror('name') contiene el error (si lo había) de validación -->
                                @error('name') <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="surname" class="form-label">Apellidos</label>
                                    <input name="surname" type="text" class="form-control border-info" id="surname" placeholder="Ej: Garro">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label name="email" for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control border-success" id="email" placeholder="periodista@estilo.com">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input name="password" type="password" class="form-control border-warning" id="password" placeholder="••••••••">
                            </div>

                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Repite la contraseña</label>
                                <input name="confirmPassword" type="password" class="form-control border-danger" id="confirmPassword" placeholder="••••••••">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(to right, #ff0080, #ff8c00); border: none; border-radius: 10px;">
                                    ¡Registrar con Brillo! 🚀
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>