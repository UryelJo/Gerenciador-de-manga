<?php
    include_once "../BUSINESS/MangaService.php";
    include_once "../MODEL/Manga.php";
    
    $mangaSelecionado = (new BUSINESS\MangaService())->SelectbyId($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/shared.css">
</head>
<body>
    <form class="card w-80 h-80 row" method="POST">
        <div class="col" style="width: 50%; justify-content: space-evenly">
            <!-- Parte de Cima esquerda !-->
            <div class="row justify-center" style="width: 100%; height: 250px; gap:20px">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIhCMSx-gnjCBglMaI2yrfo8tqPUfzdnQBRw&s" style="height: 100%" alt="">
                <div class="col" style="gap: 10px">
                    <div class="col">
                        <label for="input-a">Link Foto</label>
                        <input id="input-a" value="<?php echo $mangaSelecionado->getUrlCapa() ?>" name="input-a" type="url">
                    </div>
                    <div class="col">
                        <label for="input-a">Nome Anime</label>
                        <input id="input-a" value="<?php echo $mangaSelecionado->getNome() ?>" name="input-a" type="text">
                    </div>
                    <div class="col">
                        <label for="input-a">Volume</label>
                        <input id="input-a" value="<?php echo $mangaSelecionado->getVolume() ?>" name="input-a" type="number">
                    </div>
                </div>
            </div>
            <!-- Parte de Cima esquerda !-->
            <!-- Parte de Baixo esquerda !-->
            <div class="col justify-center" style="width: 100%; height: 250px; gap:20px">
                <div class="col">
                    <label for="input-a">Genero</label>
                    <input id="input-a" value="<?php echo $mangaSelecionado->getGenero() ?>" name="input-a" type="text">
                </div>
                <div class="col">
                    <label for="input-a">Quantidade Requisitada</label>
                    <input id="input-a" value="<?php echo $mangaSelecionado->getQuantidadesRequisitada() ?>" name="input-a" type="number">
                </div>
                <div class="col">
                    <label for="input-a">Avaliação</label>
                    <input id="input-a" value="<?php echo $mangaSelecionado->getAvaliacao() ?>" name="input-a" type="number">
                </div>
            </div>
            <!-- Parte de Baixo esquerda !-->
            <!-- Direita !-->
            
            
        </div>
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col justify-center" style="width: 100%; height: 400px; gap:20px">
                <div class="col">
                    <label for="input-a">Resumo</label>
                    <input id="input-a" value="<?php echo $mangaSelecionado->getDescricao() ?>" name="input-a" type="text">
                </div>
                <div class="col" style="height:100%">
                    <label for="input-a">Descrição</label>
                    <textarea id="input-a" name="input-a" style="height: 100%" type="text"><?php echo $mangaSelecionado->getResumo() ?></textarea>
                </div>
            </div>
            <button action="submit" class="button w-80">Salvar</button>
        </div>
    </form>
</body>
</html>