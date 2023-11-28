<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuMaster</title>
</head>
<body>
    <form action="{{route('store.comanda')}}" method="POST">
        @csrf   
        <button>Iniciar comanda</button>
    </form>
</body>
</html>