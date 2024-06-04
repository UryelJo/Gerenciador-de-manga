<?php 
    namespace BUSINESS;

    include_once '../DATA/UserData.php';
    include_once '../MODEL/User.php';

    class UserService{

        public static function ValidarUsuario(string $email, string $senha){
            $DataUser = new \DATA\UserData;
            $userSelecionado = $DataUser->SelectByEmail($email);
            if(empty($userSelecionado)){
                echo "usuario não encontrado";
            }
            
            if($userSelecionado->getSenha() == md5($senha)){
                return $userSelecionado;
            } else {
                echo "senha incorreta";
            }

        }
    }
?>