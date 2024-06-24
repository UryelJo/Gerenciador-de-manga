<?php
    namespace BUSINESS;

    include_once '../DATA/UserMangaDATA.php';

    class UserMangaService{

        public function SelectAllByIdUser(int $idUser){
            $UserMangaData = new \DATA\UserMangaDATA;
            $mangasRetornadosPorUsuario = $UserMangaData->SelectByIdUser($idUser);
            if(empty($mangasRetornadosPorUsuario)){
                echo "mangás não encontrados";
            } else {
                return $mangasRetornadosPorUsuario;
            }
        }

        public function AdicionarAosFavoritos(int $idUsuario, int $idManga){
            $UserMangaData = new \DATA\UserMangaDATA;
            $retornoDaAdicao = $UserMangaData->AdicionarAosFavoritos($idUsuario, $idManga);
            return $retornoDaAdicao;
        }

    }
?>