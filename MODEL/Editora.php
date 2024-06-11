<?php
    namespace MODEL;
    
    class Editora{
        private ?int $id;
        private ?string $nome;
        private ?string $cnpj;

        public function __construct(){}

        public static function construtorComParametros($id, $nome, $cnpj){
            $editora = new Editora();
            $editora->setId($id);
            $editora->setNome($nome);
            $editora->setCnpj($cnpj);
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

        public function getCnpj(){
            return $this->cnpj;
        }

        public function setCnpj(string $cnpj){
            $this->cnpj = $cnpj;
        }
    }