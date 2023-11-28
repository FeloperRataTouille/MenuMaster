<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prato</title>
</head>
<body>
    <form action="{{route('store.prato')}}" method="POST">
    @csrf
    <input type="text" id="nome" name="nome" placeholder="Nome">
    <input type="text" id="preco" name="preco" placeholder="Preço">
    <input type="text" id="tipo" name="tipo" placeholder="Tipo">
    <button type="submit">Cadastrar</button>
    </form>
</body>
</html>