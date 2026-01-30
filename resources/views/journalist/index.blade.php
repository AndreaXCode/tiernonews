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
    <h2>Journalists</h2>
    <p class="bg-info">Estos son las o los periodistas de mi DB</p>

    @foreach ($journalists as $j)
    <div class ="card bg-warning">
        <br>
        <p>Nombre: {{ $j->name }}</p>
        <p>Apellido: {{ $j->surname }}</p>
        <p>Email: {{ $j->email }}</p>
        <p>Contraseña: {{ $j->password }}</p>
    </div>
    <br><br>    
    @endforeach


</body>
</html>