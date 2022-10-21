<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="{{route('forgot')}}" method="post" style="display: flex; flex-direction: column; align-items: center;">
    @csrf

        
        <label for="">Email</label>
        <input type="text" name="email" />
        <br>
        <button type="submit">RESTABLECER CONTRASEÑA</button>
        
        
        <br>


        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error) 
                    <li> {{ $error }} </li>
                @endforeach
            </ul>           
        @endif

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</html>