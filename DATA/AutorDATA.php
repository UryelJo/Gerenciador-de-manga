<?php
    namespace DATA;

    include_once '../DATA/Conexao.php';
    include_once '../MODEL/Autor.php';

    class AutorDATA
    {
        public function Select()
        {
            $scriptSql = "SELECT * FROM autor WHERE excluido=0;";
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

            isset($listaDeAutores) ? $listaDeAutores : NULL;
        }

        public function SelectById(int $id){
            $scriptSql = 'SELECT * FROM autor WHERE id=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            $autor = new \MODEL\Autor();
            $autor->setId($registroUnico['id']);
            $autor->setNome($registroUnico['nome']);
            $autor->setIdade($registroUnico['idade']);

            return isset($autor) ? $autor : NULL;
        }

        public function Insert(\MODEL\Autor $autor){
            $scripSql = "INSERT INTO `autor`(`nome`, `idade`) VALUES('{$autor->getNome()}','{$autor->getIdade()}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scripSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        //oniotigago

        public function Update(\MODEL\Autor $autor){
            $scripSql = "UPDATE autor SET nome = ?, idade = ? WHERE id =?;";

            $conexao = Conexao::conectarComDB();

            $query = $conexao->prepare($scripSql);
            $resultadoUpdate = $query->execute(array($autor->getNome(), $autor->getIdade(), $autor->getId()));

            $conexao = Conexao::desconectarComDB();

            return $resultadoUpdate;
        }

        public function Delete(int $id){
            $scriptSql = "UPDATE autor SET excluido=? WHERE id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array(1,$id));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }
    }
?>