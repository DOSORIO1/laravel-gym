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
    <form action="{{route('reset', ['token' => $token])}}" method="post" style="display: flex; flex-direction: column; align-items: center;">

        @csrf
        
        

      <label for="">Email</label>
        <input type="text" name="email" />
         <label for=""> New Password</label>
        <input type="password" name="password" />
       <label for="">Confirmation New Password</label>
        <input type="password" name="password_confirmation" />
        
        <br>
        <button type="submit">CAMBIAR CONTRASEÑA</button>

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