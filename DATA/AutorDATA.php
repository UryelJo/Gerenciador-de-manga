<?php
    namespace DATA;

    include_once '../DATA/Conexao.php';
    include_once '../MODEL/Autor.php';

    class AutorDATA
    {
        public function Select()
        {
            $scriptSql = "Select * from autor;";
            $conexao = Conexao::conectarComDB();
            $todosOsRegistros = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            foreach( $todosOsRegistros as $registroUnico){
                $autor = new \MODEL\Autor();

                $autor->setId($registroUnico['id']);
                $autor->setNome($registroUnico['nome']);
                $autor->setIdade($registroUnico['idade']);

                $listaDeAutores[] = $autor;
            }

            return $listaDeAutores;
        }

        public function SelectById(int $id){
            $scriptSql = 'Select *from autor where id=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            $autor = new \MODEL\Autor();
            $autor->setId($registroUnico['id']);
            $autor->setNome($registroUnico['nome']);
            $autor->setIdade($registroUnico['idade']);

            return $autor;
        }

        public function Insert(\MODEL\Autor $autor){
            $scripSql = "INSERT INTO autor(nome, idade) VALUES('
            {$autor->getNome()}','
            {$autor->getIdade()}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scripSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        //oniotigago

        public function Update(\MODEL\Autor $autor){
            $scripSql = "UPDATE autor SET nome = ?, idade = ?. WHERE id =?;";

            $conexao = Conexao::conectarComDB();

            $query = $conexao->prepare($scripSql);
            $resultadoUpdate = $query->execute(array($autor->getNome(), $autor->getIdade(), $autor->getId()));

            $conexao = Conexao::desconectarComDB();

            return $resultadoUpdate;
        }

        public function Delete(int $id){
            $scriptSql = "delete from autor WHERE id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array($id));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }
    }
?>