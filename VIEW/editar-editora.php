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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <div class="header">
        <h2>Editar Editora</h2>
    </div>
    <div class="col justify-content-center">
        <div class="card">
            <div class="card-header">
                Editando : <?php echo $editoraSelecionada->getNome() ?>
            </div>
            <div class="card-body row justify-content-center">
                <form class="col-6" method="POST">
                    <div class="mb-3">
                        <label for="input-nome" class="form-label"><strong>Nome</strong></label>
                        <input
                            type="text"
                            class="form-control"
                            name="input-nome"
                            id="input-nome"
                            aria-describedby="helpId"
                            placeholder="Nome"
                            required
                            value=" <?php echo $editoraSelecionada->getNome() ?>"
                        />
                        <small id="helpId" class="form-text text-muted">O nome da Editora</small>
                    </div>
                    <div class="mb-3">
                        <label for="input-cnpj" class="form-label"><strong>CNPJ</strong></label>
                        <input
                            type="text"
                            class="form-control"
                            name="input-cnpj"
                            id="input-cnpj"
                            aria-describedby="helpId"
                            placeholder="CNPJ"
                            required
                            value=" <?php echo $editoraSelecionada->getCnpj() ?>"
                        />
                        <small id="helpId" class="form-text text-muted">O cnpj da editora</small>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center mt-3">
                    <form method="POST" class="me-2">
                        <input type="hidden" name="delete" value="true">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                    <a class="btn btn-secondary me-2" href="editora.php">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>