<?php
    namespace MODEL;

    class User{
        private ?int $id;
        private ?string $nome;
        private ?string $email;
        private ?string $senha;

        public function __construct(){}

        public static function construtorComParametros($id, $nome, $email, $senha){
            $user = new User();
            $user->setId($id);
            $user->setNome($nome);
            $user->setEmail($email);
            $user->setSenha($senha);
            return $user;
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

        public function getEmail(){
            return $this->email;
        }

        public function setEmail(string $email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha(string $senha){
            $this->senha = $senha;
        }
    }
?>