<?php
include_once "../BUSINESS/AutorService.php";
include_once "../MODEL/Autor.php";

$autorSelecionado = (new BUSINESS\AutorService())->SelectById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-nome'])) {

    $idade = $_POST['input-idade'];
    $nome = $_POST['input-nome'];

    (new BUSINESS\AutorService())->Update(
        MODEL\Autor::construtorComParametros($_GET['id'], $nome, $idade)
    );
    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/autores.php");

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {

    (new BUSINESS\AutorService())->Delete($_GET['id']);

    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/autores.php");
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
    <div class="w-80 row align-center" style="gap: 20px">
        <div style="width: 300px">
            <button onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/autores.php'" class="button w-80">Voltar</button>
        </div>
        <h2>Editar Autor</h2>
    </div>
    <form class="card w-80 h-80 row justify-center" style="gap: 20px" method="POST">
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col">
                <label for="input-nome">Nome</label>
                <input id="input-nome" name="input-nome" value="<?php echo $autorSelecionado->getNome() ?>" type="text">
            </div>
            <div class="col">
                <label for="input-idade">Idade</label>
                <input id="input-idade" name="input-idade" value="<?php echo $autorSelecionado->getIdade() ?>" type="number">
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