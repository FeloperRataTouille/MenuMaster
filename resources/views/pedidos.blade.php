<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
@foreach ($pedidos as $pedido)
            <li>
                {{$pedido->nome}} - R${{$prato->preco}}
                <input type="checkbox" name="prato_id" id="prato_id" value="{{ $prato->id }}">
                <input type="number" id="quantidade" name="quantidade">
            </li>   
        @endforeach
</body>
</html>