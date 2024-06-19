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
    <link rel="stylesheet" href="./CSS/shared.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-80 p-10">
        <button class="button" onclick="window.location.replace('tela-principal.php')">Voltar</button> 
    </div>
    <div class="card w-80 col h-80 align-center" style="overflow-y: auto;">
        <div class="row">
            <button class="button" onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/cadastrar-autores.php'">
                Cadastrar Autor(a)
            </button>
        </div>
        <?php
        foreach ($autorService->SelectAll() as $autor) {
            echo "
            <div class='w-80 row align-center' style='justify-content: space-between; text-align: center'>
                <div>
                    <p>Nome</p>
                    <h2>
                    ". $autor->getNome() ."
                    </h2>
                </div>
                <div>
                    <p>Idade</p>
                    <h2>
                    ". $autor->getIdade() ."
                    </h2>
                </div>
                <button class='button' onclick=".'"'. "document.location.href = ". "'"."http://localhost:8080/Gerenciador-de-manga/VIEW/editar-autores.php?id=". $autor->getId() ."'"  .'"'."> Editar </button>
            </div>
            ";
        }
        ?>
        <hr>
    </div>
</body>
</html>