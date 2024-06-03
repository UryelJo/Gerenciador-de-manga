<?php
    namespace DATA;

    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\Conexao.php';
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\MODEL\User.php';

    class UserDATA{
        public function Select()
        {
            $scriptSql = "Select * from User;";
            $conexao = Conexao::conectarComDB();
            $todosOsRegistros = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            foreach( $todosOsRegistros as $registroUnico){
                $user = new \MODEL\User();

                $user->setId($registroUnico['id']);
                $user->setNome($registroUnico['nome']);
                $user->setEmail($registroUnico['email']);
                $user->setSenha($registroUnico['senha']);

                $listaDeUsers[] = $user;
            }

            return $listaDeUsers;
        }

        public function SelectById(){

        }
    }

    //senhas usuarios encriptadas
    //1: uryel0910 = 0b14bf70574539485fe4c2ba202f47b8
    //2: camolezeVitor = 31d356e7466ea208f517cd7afa1d75bd
    //3: almir123 = 0dcfa9276dffa58e19c0d6c8b31c16d8
?>