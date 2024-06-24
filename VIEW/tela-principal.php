<?php
    include '../BUSINESS/UserService.php';
    if (!isset($_COOKIE['nome'])) {
        header('Location: http://localhost:8080/Gerenciador-de-manga/VIEW/login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center mb-3">
                <p>Olá</p>
                <h1>
                    <?php echo htmlspecialchars($_COOKIE['nome']); ?>
                </h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <button class="btn btn-primary btn-block mb-2" onclick="window.location.replace('mangas.php')">Mangás</button>
                <button class="btn btn-primary btn-block mb-2" onclick="window.location.replace('editora.php')">Editoras</button>
                <button class="btn btn-primary btn-block mb-2" onclick="window.location.replace('autores.php')">Autor</button>
                <button class="btn btn-primary btn-block mb-2" onclick="window.location.replace('favoritos.php')">Favoritos</button>
            </div>
        </div>
    </div>
</body>
</html>