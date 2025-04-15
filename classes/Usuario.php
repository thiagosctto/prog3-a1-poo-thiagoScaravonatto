<?php
class Usuario {
    private $nome;
    private $email;
    private $senhaHash;

    public function __construct($nome, $email, $senha) {
        $this->nome = $this->sanitizar($nome);
        $this->email = $this->sanitizar($email);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senhaHash);
    }

    private function sanitizar($dado) {
        return htmlspecialchars(trim($dado), ENT_QUOTES, 'UTF-8');
    }
}
?>