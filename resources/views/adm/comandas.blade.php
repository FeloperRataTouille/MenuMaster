<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandas</title>
</head>
<body>
    <!-- Supondo que 'comandas' seja o array de comandas que você passou do controlador para a view -->
@foreach($comandas as $comanda)
    <!-- Exibindo informações da comanda -->
    <p>ID: {{ $comanda->id }}</p>
    <p>Status: {{ $comanda->status }}</p>
    <!-- Adicione outras informações da comanda que deseja exibir -->
@endforeach

</body>
</html>