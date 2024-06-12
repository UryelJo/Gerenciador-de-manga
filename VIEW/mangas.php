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
    <link rel="stylesheet" href="./CSS/shared.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
    <script>
        let urlParams = new URLSearchParams(window.location.search);

        document.addEventListener("DOMContentLoaded", function() {
            executarPaginaInicial();
        })

        function abrirDialog(idManga) {
            urlParams.set('dialog-aberto', true);
            urlParams.set('id-manga', idManga);
            window.location.search = urlParams;
            document.getElementById('dialog').style.display = 'flex';
        }

        function fecharDialog() {
            urlParams.delete('id-manga');
            urlParams.delete('dialog-aberto');
            window.location.search = urlParams;
            document.getElementById('dialog').style.display = 'none';
        }

        function fecharDialogDeManeiraLeve() {
            document.getElementById('dialog').style.display = 'none';
        }

        function executarPaginaInicial() {
            if (!(urlParams.get('dialog-aberto') == 'true')) {
                fecharDialogDeManeiraLeve();
            };
        }
    </script>
</head>
<body>
    <div class="w-80 p-10">
        <button class="button" onclick="window.location.replace('tela-principal.php')">Voltar</button> 
    </div>
    <div class="card w-80 col h-80" style="overflow-y: auto;">
        <div class="row">
            <button class="button"> Cadastrar Mangá </button>
        </div>
        <?php
        foreach($servicoManga->SelectAll() as $manga) {
            echo '
            <div class="row" style="height: 150px; justify-content: space-between">
            <img style="height: 100%" src="'. htmlspecialchars($manga->getUrlCapa()) . '" alt="Imagem não localizada">
            <div style="height: 100%" class="col justify-center p-10 ">

                <!-- Informações !-->
                <h2><strong>' . 
                htmlspecialchars($manga->getNome())
                . '</strong></h2>
                <div class="row g-10">';
                    
                    for ($index = 0; $index < $manga->getAvaliacao() + 1; $index++) {
                        echo "<i class='fa-solid fa-star fa-xs'></i>";
                    }

                echo '</div>
                <!-- Informações !-->

            </div>
            <div class="col justify-center p-10">
                <section class="card-categoria">
                    '. htmlspecialchars($manga->getGenero()) .'
                </section>
            </div>
            <div>
                '. htmlspecialchars($manga->getDescricao()) .'
            </div>
            <div class="col justify-center p-10">
                <button class="button" onclick="abrirDialog('. htmlspecialchars($manga->getId()) .')">
                    Visualizar
                </button>
            </div>
            </div>';
        }
        ?>
        <hr>
    </div>
    <div id="dialog" class="overflow col justify-center align-center" >
    <?php

        if (isset($_GET['id-manga'])) {
            mostrarManga();
        }

        function mostrarManga() {
            global $servicoManga;
            $mangaSelecionado = $servicoManga->SelectbyId($_GET['id-manga']);
            echo '
            <div class="card w-80 col h-80 align-center" style="overflow-y: auto; overflow-x: hidden">
                <button class="button" onclick="fecharDialog()">
                    Voltar
                </button>
                <button class="button" onclick="window.location.href = '."'"."http://localhost:8080/Gerenciador-de-manga/VIEW/editar.php?id=". htmlspecialchars($mangaSelecionado->getId()) ."'".'">
                    Editar
                </button>
                <h3>Visualizar</h3>
                <hr style="width: 100%">
                <div style="height:250px" class="w-80 col align-center p-10">
                    <img style="height: 100%" src="'. htmlspecialchars($mangaSelecionado->getUrlCapa()) .'" alt="Imagem não localizada">
                </div>
                <h3>'. htmlspecialchars($mangaSelecionado->getNome()) .'</h3>
                Avaliação:
                <div>
                    ';
                    for ($index = 0; $index < $mangaSelecionado->getAvaliacao() + 1; $index++) {
                        echo "<i class='fa-solid fa-star fa-xs'></i>";
                    };
                    echo '
                </div>
                Volume:'.htmlspecialchars($mangaSelecionado->getVolume()).'
                Gênero:'.htmlspecialchars($mangaSelecionado->getGenero()).'
                <h3>Resumo</h3>
                '.htmlspecialchars($mangaSelecionado->getDescricao()).'
                <hr style="width: 100%">
                <h1>Descrição</h1>
                '.$mangaSelecionado->getResumo().'
            </div>
            ';
            
        }
    ?>
    </div>
</body>
</html>