<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
</head>
<body>
    <h1>Cardápio</h1>
    <form action="{{ route('store.pedido') }}" method="POST">
    @csrf
    <input type="hidden" name="comanda_id" value="{{ Session::get('comanda_id') }}" id="comanda_id">
    <ul>
        @foreach ($pratos as $prato)
            <li>
                {{$prato->nome}} - R${{$prato->preco}}
                <input type="checkbox" name="prato_id" id="prato_id" value="{{ $prato->id }}">
                <input type="number" id="quantidade" name="quantidade">
            </li>   
        @endforeach
        <input type="text" name="observacao" id="observacao" placeholder="Observação:">
    </ul>
    <button type="submit">Fazer pedido</button>
</form>

    
</body>
</html>