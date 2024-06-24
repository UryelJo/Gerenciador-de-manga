<?php
    namespace MODEL;

    include_once '../MODEL/Manga.php';

    class UserManga{
        private ?int $id_user;
        private ?int $id_manga;
        public ?Manga $manga;

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
    }
?>