<?php
    include_once "../BUSINESS/AutorService.php";
    include_once "../MODEL/Autor.php";

    $autorSelecionado = null;

    $autorService = new \BUSINESS\AutorService();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-secondary" onclick="window.location.replace('tela-principal.php')">Voltar</button>
            <h2>Autores</h2>
            <button class="btn btn-success" onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/cadastrar-editora.php'">Cadastrar Autor</button>
        </div>
        <div class="card p-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($autorService->SelectAll() as $autor) {
                        echo "
                        <tr>
                            <td>". htmlspecialchars($autor->getNome()) ."</td>
                            <td>". htmlspecialchars($autor->getIdade()) ."</td>
                            <td>
                                <button class='btn btn-primary' onclick=\"document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/editar-autores.php?id=". htmlspecialchars($autor->getId()) ."'\">Editar</button>
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