<?php
    namespace MODEL;

    class Manga{
        private ?int $id;
        private ?string $nome;
        private ?int $volume;
        private ?string $descricao;
        private ?string $resumo;
        private ?float $avaliacao;
        private ?string $genero;
        private ?int $quantidadesRequisitada;
        private ?string $url_capa;

        private Editora $editora;
        private Autor $autor;

        //Construtor
        public function __construct(){}

        public static function construtorComParametros( $id,  $nome,  $volume,  $descricao,  $resumo,  $avaliacao,  $genero,  $quantidadesRequisitada,  $url_capa){
            $manga = new Manga();
            $manga->setId($id);
            $manga->setNome($nome);
            $manga->setVolume($volume);
            $manga->setDescricao($descricao);
            $manga->setResumo($resumo);
            $manga->setAvaliacao($avaliacao);
            $manga->setGenero($genero);
            $manga->setQuantidadesRequisitada($quantidadesRequisitada);
            $manga->setUrlCapa($url_capa);
            return $manga;
        }


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

        public function getResumo(){
            return $this->resumo;
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

        public function getUrlCapa(){
            return $this->url_capa;
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

        public function setResumo(string $resumo){
            $this->resumo = $resumo;
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
        
        public function setUrlCapa(string $url_capa){
            $this->url_capa = $url_capa;
        }
    }
?>