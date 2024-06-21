<?php
    namespace MODEL;

    class Autor{
        private ?int $id;
        private ?string $nome;
        private ?int $idade;

        private ?bool $deletado;

        public function __construct(){}

        public static function construtorComParametros($id, $nome, $idade){
            $autor = new Autor();
            $autor->setId($id);
            $autor->setNome($nome);
            $autor->setIdade($idade);
            return $autor;
        }

        public static function construtorComParametrosSemId( $nome, $idade){
            $autor = new Autor();
            $autor->setNome($nome);
            $autor->setIdade($idade);
            return $autor;
        }

        public function getId(){
            return $this->id;
        }

        public function setId(int $id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade(int $idade){
            $this->idade = $idade;
        }

        public function getDeletado(){
            return $this->deletado;
        }

        public function setDeletado(bool $deletado){
            $this->deletado = $deletado;
        }
    }
?>