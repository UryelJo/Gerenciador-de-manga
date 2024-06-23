<?php
    include_once "../BUSINESS/EditoraService.php";
    include_once "../MODEL/Editora.php";

    $editoraService = new \BUSINESS\EditoraService();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editoras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-secondary" onclick="window.location.replace('tela-principal.php')">Voltar</button>
            <h2>Editoras</h2>
            <button class="btn btn-success" onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/cadastrar-editora.php'">Cadastrar Editora</button>
        </div>
        <div class="card p-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($editoraService->SelectAll() as $editora) {
                        echo "
                        <tr>
                            <td>". htmlspecialchars($editora->getNome()) ."</td>
                            <td>". htmlspecialchars($editora->getCnpj()) ."</td>
                            <td>
                                <button class='btn btn-primary' onclick=\"document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/editar-editora.php?id=". htmlspecialchars($editora->getId()) ."'\">Editar</button>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>