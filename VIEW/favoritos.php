<?php
include_once("../BUSINESS/UserMangaService.php");
include_once("../DATA/UserData.php");
include_once("../DATA/UserMangaDATA.php");
include_once("../MODEL/UserManga.php");
include_once("../MODEL/User.php");

$userMangaService = new \BUSINESS\UserMangaService();
$user = (new \DATA\UserDATA())->SelectByEmail($_COOKIE['email']);
$userMangas = $userMangaService->SelectAllByIdUser($user->getId());

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    (new \DATA\UserMangaDATA())->RemoverDosFavoritos($user->getId(), $_POST['manga_id']);

    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/favoritos.php");
    exit;
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
        <h2>Favoritos</h2>
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
                        <a type="submit" name="adicionar" class="btn btn-success m-2" href="mangas-favoritos-nao-selecionados.php">Adicionar</a>
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
                            <?php if (empty($userMangas)): ?>
                                <tr>
                                    <td colspan="3">Nenhum mangá favorito selecionado!</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($userMangas as $manga): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($manga->getNome(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($manga->getAvaliacao(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="delete" value="true">
                                                <input type="hidden" name="manga_id" value="<?= htmlspecialchars($manga->getId(), ENT_QUOTES, 'UTF-8') ?>">
                                                <button type="submit" class="btn btn-danger">Remover</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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