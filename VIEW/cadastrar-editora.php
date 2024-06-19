<?php
include_once "../BUSINESS/EditoraService.php";
include_once "../MODEL/Editora.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-nome'])) {

    $cnpj = trim($_POST['input-cnpj']);
    $nome = trim($_POST['input-nome']);

    echo $nome;
    echo $cnpj;

    (new BUSINESS\EditoraService())->Insert(
        MODEL\Editora::construtorComParametrosSemId($nome, $cnpj)
    );
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/shared.css">
</head>
<body>
    <div class="w-80 row align-center" style="gap: 20px">
        <div style="width: 300px">
            <button onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/editora.php'" class="button w-80">Voltar</button>
        </div>
        <h2>Cadastrar Editora</h2>
    </div>
    <form class="card w-80 h-80 row justify-center" style="gap: 20px" method="POST">
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col">
                <label for="input-nome">Nome</label>
                <input id="input-nome" name="input-nome" type="text">
            </div>
            <div class="col">
                <label for="input-cnpj">CNPJ</label>
                <input id="input-cnpj" name="input-cnpj" type="text">
            </div>
            <button action="submit" class="button w-80">Cadastrar</button>
        </div>
    </form>
</body>
</html>