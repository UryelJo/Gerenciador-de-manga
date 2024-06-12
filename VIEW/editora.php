<?php
    include_once "../BUSINESS/EditoraService.php";
    include_once "../MODEL/Editora.php";

    $editoraSelecionada = null;

    $editoraService = new \BUSINESS\EditoraService();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/shared.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
    <script>
    </script>
</head>
<body>
    <div class="w-80 p-10">
        <button class="button" onclick="window.location.replace('tela-principal.php')">Voltar</button> 
    </div>
    <div class="card w-80 col h-80 align-center" style="overflow-y: auto;">
        <div class="row">
            <button class="button" onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/cadastrar-editora.php'">
                Cadastrar Editora 
            </button>
        </div>
        <?php
        foreach ($editoraService->SelectAll() as $editora) {
            echo "
            <div class='w-80 row align-center' style='justify-content: space-between; text-align: center'>
                <h2>
                    ". $editora->getNome() ."
                </h2>
                <p>
                    ". $editora->getCnpj() ."
                </p>
                <button class='button' onclick=".'"'. "document.location.href = ". "'"."http://localhost:8080/Gerenciador-de-manga/VIEW/editar-editora.php?id=". $editora->getId() ."'"  .'"'."> Editar </button>
            </div>
            ";
        }
        ?>
        <hr>
    </div>
</body>
</html>