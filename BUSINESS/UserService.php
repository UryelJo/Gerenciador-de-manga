<?php 
    namespace BUSINESS;

    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\UserData.php';

    class UserService{
        public function ValidarUsuario(string $email, string $senha){
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