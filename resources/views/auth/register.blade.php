<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <!-- auth/register.blade.php -->

<form method="POST" action="{{ route('register.register') }}">
    @csrf

    <div>
        <label for="usuario">Usuário</label>
        <input id="usuario" type="text" name="usuario" required autofocus>
    </div>

    <div>
        <label for="senha">Senha:</label>
        <input id="senha" type="text" name="senha" required autocomplete="new-password">
    </div>

    <div>
        <button type="submit">Registrar</button>
    </div>
</form>

</body>
</html>