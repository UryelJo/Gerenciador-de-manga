<?php
    namespace DATA;

    include_once '../DATA/Conexao.php';
    include_once '../MODEL/User.php';

    class UserDATA{

        public function SelectByEmail(string $email){
            $scriptSql = 'Select * from user where email=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($email));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            $user = new \MODEL\User();
            $user->setId($registroUnico['id']);
            $user->setNome($registroUnico['nome']);
            $user->setEmail($registroUnico['email']);
            $user->setSenha($registroUnico['senha']);

            return $user;
        }
    }

    //senhas usuarios encriptadas
    //1: uryel0910 = 0b14bf70574539485fe4c2ba202f47b8
    //2: camolezeVitor = 31d356e7466ea208f517cd7afa1d75bd
    //3: almir123 = 0dcfa9276dffa58e19c0d6c8b31c16d8
?>