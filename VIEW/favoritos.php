<?php
include_once("../BUSINESS/MangaService.php");
include_once("../MODEL/Manga.php");

function adicionarManga() {
    echo "<script>alert('Função adicionarManga() foi acionada!');</script>";
}

function removerManga() {
    echo "<script>alert('Função removerManga() foi acionada!');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
    adicionarManga();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remover'])) {
    removerManga();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangás Favoritos</title>
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-3">
    <div class="header">
        <h2>Gerenciador de Mangás</h2>
        <a href="tela-principal.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Mangás Favoritos</h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mb-3">
                        <button type="submit" name="adicionar" class="btn btn-success m-2">Adicionar</button>
                    </form>
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Avaliação</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach((new \BUSINESS\MangaService())->SelectAll() as $manga): ?>
                                <tr>
                                    <td><?= htmlspecialchars($manga->getNome(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($manga->getAvaliacao(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td>
                                        <form method="POST">
                                            <button type="submit" name="remover" class="btn btn-danger">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>