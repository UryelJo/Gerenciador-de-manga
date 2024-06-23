<?php
include_once "../BUSINESS/MangaService.php";
include_once "../MODEL/Manga.php";

$mangaSelecionado = null;

$servicoManga = new \BUSINESS\MangaService();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4" style="height: 80%; overflow-y: auto">
        <button class="btn btn-primary mb-3" onclick="window.location.replace('tela-principal.php')">Voltar</button>
        <button class="btn btn-success mb-3" onclick="document.location.href='http://localhost:8080/Gerenciador-de-manga/VIEW/cadastrar-manga.php'">Cadastrar Mangá</button>
        
        <?php
        $mangas = $servicoManga->SelectAll();
        if ($mangas == null) {
            echo "<h1>NÃO EXISTEM MANGÁS</h1>";
        } else {
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Imagem</th><th>Nome</th><th>Avaliação</th><th>Gênero</th><th>Descrição</th><th>Ações</th></tr></thead>';
            echo '<tbody>';
            foreach($mangas as $manga) {
                echo '<tr>';
                echo '<td><img src="' . htmlspecialchars($manga->getUrlCapa()) . '" alt="Imagem não localizada" style="height: 150px;"></td>';
                echo '<td>' . htmlspecialchars($manga->getNome()) . '</td>';
                echo '<td>';
                for ($index = 0; $index < $manga->getAvaliacao(); $index++) {
                    echo "<i class='fa-solid fa-star fa-xs'></i>";
                }
                echo '</td>';
                echo '<td>' . htmlspecialchars($manga->getGenero()) . '</td>';
                echo '<td>' . htmlspecialchars($manga->getDescricao()) . '</td>';
                echo '<td><button class="btn btn-info" onclick="document.location.href=\'http://localhost:8080/Gerenciador-de-manga/VIEW/visualizar-manga.php?id=' . $manga->getId() . '\'">Visualizar</button></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>