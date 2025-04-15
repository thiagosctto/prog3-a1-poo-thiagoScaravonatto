<?php
require_once 'Usuario.php';

class Autenticador {

    //FUNCAO PARA VISUALIZAR ARRAY DE USER DA SESAO(fins de debbug)
    //public static function debugUsuarios() {
       // Sessao::iniciar();
      //  echo '<pre>';
      //  print_r($_SESSION['usuarios']);
     //   echo '</pre>';
    //}
    
    public static function registrar($nome, $email, $senha) {
        Sessao::iniciar();
        
        // Verifica se já existe array de usuários na sessão
        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }
        
        // Verifica se email já existe
        foreach ($_SESSION['usuarios'] as $usuario) {
            if ($usuario->getEmail() === $email) {
                return false;
            }
        }
        
        // Cria e armazena novo usuário
        $novoUsuario = new Usuario($nome, $email, $senha);
        $_SESSION['usuarios'][] = $novoUsuario;
        return true;
    }

    public static function login($email, $senha) {
        Sessao::iniciar();
        
        if (!isset($_SESSION['usuarios'])) {
            return null;
        }
        
        foreach ($_SESSION['usuarios'] as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                return $usuario;
            }
        }
        return null;
    }
}
?>