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
    <form action="{{route('login')}}" method="post" style="display: flex; flex-direction: column; align-items: center;">

        @csrf

        
        <label for="">Email</label>
        <input type="text" name="email" />
        <label for="">password</label>
        <input type="password" name="password" />        
        <button type="submit">login</button>
        <a href="{{route('viewforgot')}}">¿Olvidaste tu contraseña?</a>


        @if (session()->has('message'))
        <p>{{session('message')}}<p>            
        @endif

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</html>