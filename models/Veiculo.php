<?php

class Veiculo {
    public $conexao;
    public function __construct($db) {
        $this->conexao = $db;
    }

    public function cadastrar($nome, $modelo, $cor, $placa, $ano) {
        $sql = "INSERT INTO veiculos
            (nome, modelo, cor, placa, ano)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$nome, $modelo, $cor, $placa, $ano]);
    }

    public function listar() {
        $sql = "SELECT * FROM veiculos ORDER BY id DESC";
        $resultado = $this->conexao->query($sql);
        return $resultado->fetchAll();
    }
}