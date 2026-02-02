<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalist</title>
</head>
<body>
    @include("components.header")

    <p>Nombre: {{$journalist->name}}</p>
    <p>Apellido: {{$journalist->surname}}</p>
    <p>Email: {{$journalist->email}}</p>
    <p>Contraseña: {{$journalist->password}}</p>

</body>
</html>