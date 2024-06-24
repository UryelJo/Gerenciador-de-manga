<?php
    namespace MODEL;

    include_once '../MODEL/Manga.php';

    class UserManga{
        private ?int $id_user;
        private ?int $id_manga;
        private ?int $id;
        private ?string $nome;
        private ?int $volume;
        private ?string $descricao;
        private ?string $resumo;
        private ?float $avaliacao;
        private ?string $genero;
        private ?int $quantidadesRequisitada;
        private ?string $url_capa;
        private ?int $editoraId;
        private ?int $autorId;

        //Construtor
        public function __construct(){}

        public static function construtorComParametros( $id_user,  $id_manga){
            $userManga = new UserManga();
            $userManga->setIdUser($id_user);
            $userManga->setIdManga($id_manga);
            return $userManga;
        }

        //Getters
        public function getIdUser(){
            return $this->id_user;
        }
        public function setIdUser(int $id_user){
            $this->id_user = $id_user;
        }
        public function getIdManga(){
            return $this->id_manga;
        }
        public function setIdManga(int $id_manga){
            $this->id_manga = $id_manga;
        }

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

        public function getEditoraId(){
            return $this->editoraId;
        }

        public function getAutorId(){
            return $this->autorId;
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

        public function setEditoraId(int $editoraId){
            $this->editoraId = $editoraId;
        }

        public function setAutorId(int $autorId){
            $this->autorId = $autorId;
        }
    }
?>