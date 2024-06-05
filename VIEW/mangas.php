<?php
    include_once "../BUSINESS/MangaService.php";

    $servicoManga = new \BUSINESS\MangaService();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/shared.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <script src="https://kit.fontawesome.com/41b970f52c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card w-80 col h-80" style="overflow-y: auto;">
        <div class="row">
            <button class="button"> Cadastrar Mangá </button>
        </div>
        <?php
        foreach($servicoManga->SelectAll() as $manga) {
            echo '
            <div class="row" style="height: 150px; justify-content: space-between">
            <img style="height: 100%" src="https://www.researchgate.net/profile/Marilurdes-Borges/publication/348637849/figure/fig5/AS:982232843948049@1611193967796/Figura-2-Capa-do-manga-Naruto-Shippuden.png" alt="Imagem não localizada">
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
                '. htmlspecialchars($manga->getResumo()) .'
            </div>
            <div class="col justify-center p-10">
                <button class="button">
                    Visualizar
                </button>
            </div>
            </div>';
        }
        ?>
        <hr>
    </div>
</body>
</html>