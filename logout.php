<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();
Sessao::destruir();

// Redirecionar para login com mensagem
header('Location: login.php');
exit();
?>