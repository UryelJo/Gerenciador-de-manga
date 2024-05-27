<?php
    namespace BUSINESS;

    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\MangaDATA.php';
    use DATA;

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




    }

?>