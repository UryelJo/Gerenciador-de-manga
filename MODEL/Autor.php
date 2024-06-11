<?php
    namespace MODEL;

    class Autor{
        private ?int $id;
        private ?string $nome;
        private ?int $idade;

        public function __construct(){}

        public static function construtorComParametros($id, $nome, $idade){
            $autor = new Autor();
            $autor->setId($id);
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
    }
?>