<?php
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit();
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

$usuario = Autenticador::login($email, $senha);

if ($usuario) {
    // Configurar sessão
    Sessao::iniciar();
    Sessao::set('usuario_nome', $usuario->getNome());
    Sessao::set('usuario_email', $usuario->getEmail());
    
    // Configurar cookie se "Lembrar" estiver marcado
    if ($lembrar) {
        setcookie('lembrar_email', $email, time() + (30 * 24 * 60 * 60), '/');
    } else {
        setcookie('lembrar_email', '', time() - 3600, '/');
    }
    
    header('Location: dashboard.php');
} else {
    Sessao::set('mensagem_erro', 'E-mail ou senha incorretos.');
    header('Location: login.php');
}
exit();
?>