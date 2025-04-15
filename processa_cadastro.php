<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastro.php');
    exit();
}

//chamada de teste do autenticador
//Autenticador::debugUsuarios();

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$confirmarSenha = $_POST['confirmar_senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

// Validações de usuário

if (Autenticador::registrar($nome, $email, $senha)) {
    if ($lembrar) {
        setcookie('lembrar_email', $email, time() + (30 * 24 * 60 * 60), '/');
    }
    Sessao::set('mensagem_sucesso', 'Cadastro realizado! Faça login.');
    header('Location: login.php');
} else {
    Sessao::set('mensagem_erro', 'E-mail já cadastrado.');
    header('Location: cadastro.php');
}
exit();
?>