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
    <title>Gerenciador de Mangás</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/path/to/your/image.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="card p-4">
            <h1 class="text-center">Gerenciador de Mangás</h1>
            <form method="post" action="">
                <h2 class="text-center">Login</h2>
                <div class="form-group">
                    <label for="input-email">Email</label>
                    <input id="input-email" name="input-email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="input-senha">Senha</label>
                    <input id="input-senha" name="input-senha" type="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Logar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>