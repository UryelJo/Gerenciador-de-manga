<?php
    namespace BUSINESS;

    include_once '../DATA/MangaDATA.php';

    class MangaService{
        public function SelectAll(){
            $DataManga = new \DATA\MangaDATA;
            $listaDeMangas = $DataManga->Select();
            if(empty($listaDeMangas)){
                echo "nenhum manga cadastrado";
            } else {
                return $listaDeMangas;
            }
        }

        public function SelectbyId(int $id){
            $DataManga = new \DATA\MangaDATA;
            $mangaSelecionado = $DataManga->SelectById($id);
            if(empty($mangaSelecionado)){
                echo "manga não encontrado";
            } else {
                return $mangaSelecionado;
            }
        }

        public function Insert(\MODEL\Manga $manga){
            $dataManga = new \DATA\MangaDATA;
            $newManga = $dataManga->Insert($manga);
            if(empty($newManga)){
                echo "Não foi possivel cadastrar mangá";
            }
            return $newManga;
        }

        public function Update(\MODEL\Manga $manga){
            $dataManga = new \DATA\MangaDATA;
            $updatedManga = $dataManga->Update($manga);
            if(empty($updatedManga)){
                echo "Não foi possivel atualizar mangá";
            }
            return $updatedManga;
        }

        public function Delete(int $id){
            $dataManga = new \DATA\MangaDATA;
            return $dataManga->Delete($id);
        }
    }

?>