<?php
    namespace MODEL;

    class Manga{
        private ?int $id;
        private ?string $nome;
        private ?int $volume;
        private ?string $descricao;
        private ?float $avaliacao;
        private ?string $genero;
        private ?int $quantidadesRequisitada;

        //Construtor
        public function __construct(){}


        //Getters
        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getVolume(){
            return $this->volume;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getAvaliacao(){
            return $this->avaliacao;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function getQuantidadesRequisitada(){
            return $this->quantidadesRequisitada;
        }

        //Setters
        public function setId(int $id){
            $this->id = $id;
        }

        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function setVolume(int $volume){
            $this->volume = $volume;
        }

        public function setDescricao(string $descricao){
            $this->descricao = $descricao;
        }

        public function setAvaliacao(float $avaliacao){
            $this->avaliacao = $avaliacao;
        }

        public function setGenero(string $genero){
            $this->genero = $genero;
        }

        public function setQuantidadesRequisitada(int $quantidadesRequisitada){
            $this->quantidadesRequisitada = $quantidadesRequisitada;
        }


    }
?>