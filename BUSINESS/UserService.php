<?php 
    namespace BUSINESS;

    include_once '../DATA/UserData.php';
    include_once '../MODEL/User.php';

    class UserService{
        private static $usuario;

        public static function ValidarUsuario(string $email, string $senha){
            $DataUser = new \DATA\UserData;
            $userSelecionado = $DataUser->SelectByEmail($email);
            if(empty($userSelecionado)){
                echo "usuario não encontrado";
            }
            
            if($userSelecionado->getSenha() == md5($senha)){
                setcookie("nome", $userSelecionado->getNome(), time()+3600, "/","", 0);
                setcookie("email", $email, time()+3600, "/", "", 0);
                self::$usuario = $userSelecionado;
                return true;
            } else {
                return false;
            }

        }

        public static function clearUser() {
            self::$usuario = "";
        }

        public static function getUserName() {
            return self::$usuario->getNome();
        }
    }
?>