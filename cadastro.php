<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

$mensagemErro = '';
$emailCookie = $_COOKIE['lembrar_email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: processa_cadastro.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 8px; box-sizing: border-box;
        }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        
        <?php if ($mensagemErro): ?>
            <p class="error"><?= $mensagemErro ?></p>
        <?php endif; ?>
        
        <form method="post" action="processa_cadastro.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($emailCookie) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>
            </div>
            
            <div class="form-group">
                <input type="checkbox" id="lembrar" name="lembrar">
                <label for="lembrar">Lembrar meu e-mail</label>
            </div>
            
            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>
</body>
</html>