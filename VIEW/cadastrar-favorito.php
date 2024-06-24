<?php
include_once("../BUSINESS/UserMangaService.php");
include_once("../DATA/UserData.php");
include_once("../MODEL/UserManga.php");
include_once("../MODEL/User.php");

$userMangaData = new \DATA\UserMangaDATA();
$userMangaService = new \BUSINESS\UserMangaService();
$user = (new \DATA\UserDATA())->SelectByEmail($_COOKIE['email']);


if ($userMangaData->MangaIsCadastrado($user->getId(), $_GET['id']) == true) {
    echo "
        <div>
            <h2 style='color: red'><strong>Ocorreu um Erro!</strong></h2>
            <p>
                Esse mangá já está cadastrado como um mangá favorito, por favor selecione outro!
            </p>
            <button onclick='document.location.href = `mangas-favoritos-nao-selecionados.php`'>Voltar</button>
        </div>
        ";

}

$userMangaService->AdicionarAosFavoritos($user->getId(), $_GET['id']);

header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/favoritos.php");

?>