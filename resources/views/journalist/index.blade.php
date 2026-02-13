<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head> 
<body>
    @include("components.header")
    <div class="container my-4 text-center">
        <h2 class="mb-3">Journalists</h2>
        <p class="bg-info text-white py-2 rounded">Estos son las o los periodistas de mi DB</p>
        
        <!-- Este mensaje es si llega después de eliminar un journalist y tiene en la sesión el campo "deleted" -->
        @if (@session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        <!-- este mensaje es si llega después de crear un journalist y tiene en la sesión el campo "success" -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
        {{ session('success')  }}</div>
        @endif


    </div>

    <div class="container">
      <div class="row">

        @foreach ($journalists as $j)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-warning h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $j->name }} {{ $j->surname }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $j->email }}</p>
                    <p class="card-text"><strong>Contraseña:</strong> {{ $j->password }}</p>
                
                    <!-- Botones -->
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('journalist.edit', $j->id) }}" class="btn btn-info">Editar</a>
                    </div><br> 

                    <form action="{{ route('journalist.destroy', $j->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach

      </div>
    </div>


</body>
</html>