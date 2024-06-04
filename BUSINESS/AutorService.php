<?php

    namespace BUSINESS;

    include_once '../DATA/AutorDATA.php';

    class AutorService{
        public function SelectAll(){
            $DataAutor = new \DATA\AutorDATA;
            $listaDeAutores = $DataAutor->Select();
            if(empty($listaDeAutores)){
                echo "nenhum autor cadastrado";
            } else {
                return $listaDeAutores;
            }
        }

        public function SelectbyId(int $id){
            $DataAutor = new \DATA\AutorData;
            $AutorSelecionado = $DataAutor->SelectById($id);
            if(empty($AutorSelecionado)){
                echo "Autor não encontrado";
            } else {
                return $AutorSelecionado;
            }
        }

        public function Insert(\MODEL\Autor $autor){
            $DataAutor = new \DATA\AutorData;
            $newAutor = $DataAutor->Insert($autor);
            if(empty($newAutor)){
                echo "Não foi possivel cadastrar autor";
            }
            return $newAutor;
        }

        public function Update(\MODEL\Autor $autor){
            $DataAutor = new \DATA\AutorData;
            $updatedAutor = $DataAutor->Update($autor);
            if(empty($updatedAutor)){
                echo "Não foi possivel atualizar autor";
            }
            return $updatedAutor;
        }

        public function Delete(int $id){
            $DataAutor = new \DATA\AutorData;
            return $DataAutor->Delete($id);
        }
    }

?>