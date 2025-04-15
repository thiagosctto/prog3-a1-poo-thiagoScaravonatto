<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

// Proteção de rota - só acessa se estiver logado
if (!Sessao::existe('usuario_nome')) {
    header('Location: login.php');
    exit();
}

$nomeUsuario = Sessao::get('usuario_nome');
$emailUsuario = Sessao::get('usuario_email');
$emailCookie = $_COOKIE['lembrar_email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .info { background: #f0f0f0; padding: 15px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?= htmlspecialchars($nomeUsuario) ?>!</h1>
        <h2><?= htmlspecialchars($emailUsuario) ?></h2>
        <h2><a href="index.php ">voltar ao login</a></h2>
        <div class="info">
            <h2