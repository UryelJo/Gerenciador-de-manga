<?php
    include '../BUSINESS/UserService.php';
    if ($_COOKIE['nome'] == NULL) {
        header('Location: http://localhost:8080/Gerenciador-de-manga/VIEW/login.php');
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
<body class="row">
    <div class="col justify-center w-50">
        <p>Olá</p>
        <h1>
            <?php echo $_COOKIE['nome'] ?>
        </h1>
    </div>
    <div class="col justify-center w-50" style="gap: 20px">
        <button class="button" onclick="window.location.replace('mangas.php')">
            Mangás
        </button>
        <button class="button" onclick="window.location.replace('')">
            Usuários
        </button>
        <button class="button" onclick="window.location.replace('')">
            Favoritos
        </button>
    </div>  
</body>
</html>