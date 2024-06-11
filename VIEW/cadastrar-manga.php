<?php
include_once "../BUSINESS/MangaService.php";
include_once "../MODEL/Manga.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-url'])) {

    $urlFoto = $_POST['input-url'];
    $nome = $_POST['input-nome'];
    $volume = $_POST['input-volume'];
    $genero = $_POST['input-genero'];
    $quantidade = $_POST['input-quantidade'];
    $avaliacao = $_POST['input-avaliacao'];
    $resumo = $_POST['input-resumo'];
    $descricao = $_POST['input-descricao'];

    (new BUSINESS\MangaService())->Insert(
        MODEL\Manga::construtorComParametros($nome, $volume, $resumo, $descricao, $avaliacao,
        $genero, $quantidade, $urlFoto)
    );
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Mangá</title>
    <link rel="stylesheet" href="./CSS/shared.css">
</head>
<body>
    <h2>Cadastrar Mangá</h2>
    <form class="card w-80 h-80 row" style="gap: 20px" method="POST">
        <div class="col" style="width: 50%; justify-content: space-evenly">
            <!-- Parte de Cima esquerda !-->
            <div class="row justify-center" style="width: 100%; height: 250px; gap:20px">
                <div class="col" style="gap: 10px">
                    <div class="col">
                        <label for="input-url">Link Foto</label>
                        <input id="input-url" name="input-url" type="url">
                    </div>
                    <div class="col">
                        <label for="input-nome">Nome Anime</label>
                        <input id="input-nome" name="input-nome" type="text">
                    </div>
                    <div class="col">
                        <label for="input-volume">Volume</label>
                        <input id="input-volume" name="input-volume" type="number">
                    </div>
                </div>
            </div>
            <!-- Parte de Cima esquerda !-->
            <!-- Parte de Baixo esquerda !-->
            <div class="col justify-center" style="width: 100%; height: 250px; gap:20px">
                <div class="col">
                    <label for="input-genero">Genero</label>
                    <input id="input-genero" name="input-genero" type="text">
                </div>
                <div class="col">
                    <label for="input-quantidade">Quantidade Requisitada</label>
                    <input id="input-quantidade" name="input-quantidade" type="number">
                </div>
                <div class="col">
                    <label for="input-avaliacao">Avaliação</label>
                    <input id="input-avaliacao" name="input-avaliacao" type="number">
                </div>
            </div>
            <!-- Parte de Baixo esquerda !-->
            <!-- Direita !-->
            
            
        </div>
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col justify-center" style="width: 100%; height: 400px; gap:20px">
                <div class="col">
                    <label for="input-resumo">Resumo</label>
                    <input id="input-resumo" name="input-resumo" type="text">
                </div>
                <div class="col" style="height:100%">
                    <label for="input-descricao">Descrição</label>
                    <textarea id="input-descricao" name="input-descricao" style="height: 100%" type="text"></textarea>
                </div>
            </div>
            <button action="submit" class="button w-80">Cadastrar</button>
        </div>
    </form>
</body>
</html>