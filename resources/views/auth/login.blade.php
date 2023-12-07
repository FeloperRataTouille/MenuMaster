<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Adicione os estilos CSS necessários -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- Adicione o token CSRF -->
            
            <!-- Campo para o usuário -->
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}" required autofocus>
            </div>
            
            <!-- Campo para a senha -->
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <!-- Botão para enviar o formulário -->
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
        <!-- Exibir mensagens de erro, se houver -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- Adicione scripts ou links para arquivos JavaScript, se necessário -->
</body>
</html>
