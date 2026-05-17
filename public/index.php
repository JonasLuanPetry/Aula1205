<?php

require_once "../config/Database.php";
require_once "../models/Veiculo.php";
require_once "../models/Cliente.php";

$database = new Database();
$db = $database->conectar();
$veiculo = new Veiculo($db);
$cliente = new Cliente($db);


if(isset($_POST['cadastro_veiculo'])) {
    $veiculo->cadastrar(
        $_POST['nome'],
        $_POST['modelo'],
        $_POST['cor'],
        $_POST['placa'],
        $_POST['ano']
    );

    header("Location: http://localhost/Aula1205/public/index.php");
    exit();
}


if(isset($_POST['cadastro_cliente'])) {
    $cliente->cadastrar(
        $_POST['nome_cliente'],
        $_POST['email'],
        $_POST['telefone']
    );

    header("Location: http://localhost/Aula1205/public/index.php");
    exit();
}

$veiculos = $veiculo->listar();
$clientes = $cliente->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Carrinhos da HotWhels</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
<main>
<header>
    <h1>Loja de Carrinhos da HotWhels</h1>
</header>
<div class="forms-container">
    <div class="form-box">
        <h2>Cadastro de Veículos</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="modelo" placeholder="Modelo" required>
            <input type="text" name="cor" placeholder="Cor" required>
            <input type="text" name="placa" placeholder="Placa" required>
            <input type="number" name="ano" placeholder="Ano" required>
            <button type="submit" name="cadastro_veiculo">
                Salvar Veículo
            </button>
        </form>
    </div>
    <div class="form-box">
        <h2>Cadastro de Clientes</h2>
        <form method="POST">
            <input type="text" name="nome_cliente" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="telefone" placeholder="Telefone" required>
            <button type="submit" name="cadastro_cliente">
                Salvar Cliente
            </button>
        </form>
    </div>
</div>

<hr>

<section>
    <h2>Veículos cadastrados</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Ano</th>
        </tr>

        <?php
foreach($veiculos as $v) {
    echo "<tr>";
    echo "<td>".$v['nome']."</td>";
    echo "<td>".$v['modelo']."</td>";
    echo "<td>".$v['cor']."</td>";
    echo "<td>".$v['placa']."</td>";
    echo "<td>".$v['ano']."</td>";
    echo "</tr>";
}
?>
    </table>
</section>

<section>
    <h2>Clientes cadastrados</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>

        <?php
        foreach($clientes as $c) {
        ?>

        <tr>
            <td><?php echo $c['nome']; ?></td>
            <td><?php echo $c['email']; ?></td>
            <td><?php echo $c['telefone']; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>
</section>
<footer>
    <p>Loja de Carros - Aula 1205</p>
</footer>
</main>
</body>
</html>