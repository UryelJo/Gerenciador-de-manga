<?php
    include '../BUSINESS/UserService.php';
    
    setcookie('nome', '', -1, '/'); 
    setcookie('email', '', -1, '/'); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-senha']) && isset($_POST['input-email'])) {
        $senha = $_POST['input-senha'];
        $email = $_POST['input-email'];

        if (\BUSINESS\UserService::ValidarUsuario($email, $senha)) {
            header('Location: http://localhost:8080/Gerenciador-de-manga/VIEW/tela-principal.php');
        };
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
    
    <h1>Gerenciador de Mangás</h1>
    <form 
    method="post" 
    action="" 
    class="card col align-center"

    >
        <h2>Login</h2>

        <div class="col">
            <label for="input-email">Email</label>
            <input id="input-email" name="input-email" type="email">
        </div>

        <div class="col">
            <label for="input-senha">Senha</label>
            <input id="input-senha" name="input-senha" type="password">
        </div>

        <button
        class="button"
        type="submit"
        > Logar </button>      

    </form>
</body>
</html>

