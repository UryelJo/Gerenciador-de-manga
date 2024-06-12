<?php
include_once "../BUSINESS/EditoraService.php";
include_once "../MODEL/Editora.php";

$editoraSelecionada = (new BUSINESS\EditoraService())->SelectbyId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-nome'])) {

    $cnpj = $_POST['input-cnpj'];
    $nome = $_POST['input-nome'];

    (new BUSINESS\EditoraService())->Update(
        MODEL\Editora::construtorComParametros($_GET['id'], $nome, $cnpj)
    );

    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/editora.php");

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    (new BUSINESS\EditoraService())->Delete($_GET['id']);

    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/editora.php");
    exit;
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
    <h2>Editar Editora</h2>
    <form class="card w-80 h-80 row justify-center" style="gap: 20px" method="POST">
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col">
                <label for="input-nome">Nome</label>
                <input id="input-nome" value="<?php echo $editoraSelecionada->getNome() ?>" name="input-nome" type="text">
            </div>
            <div class="col">
                <label for="input-cnpj">CNPJ</label>
                <input id="input-cnpj" value="<?php echo $editoraSelecionada->getCnpj() ?>" name="input-cnpj" type="text">
            </div>
            <button action="submit" class="button w-80">Salvar</button>
        </div>
    </form>
    <form method="POST" class="w-80 p-10">
        <input type="hidden" name="delete" value="true">
        <button type="submit" class="button w-80">Deletar</button>
    </form>
</body>
</html>