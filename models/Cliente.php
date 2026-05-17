<?php

class Cliente {
    public $conexao;
    public function __construct($db) {
        $this->conexao = $db;
    }

    public function cadastrar($nome, $email, $telefone) {
        $sql = "INSERT INTO clientes
                (nome, email, telefone)
                VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$nome, $email, $telefone]);
    }

    public function listar() {
        $sql = "SELECT * FROM clientes ORDER BY id DESC";
        $resultado = $this->conexao->query($sql);
        return $resultado->fetchAll();
    }
}