<?php

class Database {
    public function conectar() {
        $host = "localhost";
        $porta = "5432";
        $database = "Aula1205";
        $usuario = "postgres";
        $senha = "postgres";

        $dsn = "pgsql:host=$host;port=$porta;dbname=$database";
        $conexao = new PDO($dsn, $usuario, $senha);
        return $conexao;
    }
}