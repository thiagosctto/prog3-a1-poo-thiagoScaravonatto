<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();
//Autenticador::debugUsuarios();

$mensagemSucesso = Sessao::get('mensagem_sucesso');
Sessao::set('mensagem_sucesso', null);

$mensagemErro = Sessao::get('mensagem_erro');
Sessao::set('mensagem_erro', null);

$emailCookie = $_COOKIE['lembrar_email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="email"], input[type="password"] {
            width: 100%; padding: 8px; box-sizing: border-box;
        }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        
        <?php if ($mensagemSucesso): ?>
            <p class="success"><?= $mensagemSucesso ?></p>
        <?php endif; ?>
        
        <?php if ($mensagemErro): ?>
            <p class="error"><?= $mensagemErro ?></p>
        <?php endif; ?>
        
        <form method="post" action="processa_login.php">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($emailCookie) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <div class="form-group">
                <input type="checkbox" id="lembrar" name="lembrar" <?= $emailCookie ? 'checked' : '' ?>>
                <label for="lembrar">Lembrar meu e-mail</label>
            </div>
            
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
        
        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>
</html>