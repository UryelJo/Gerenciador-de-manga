<?php
    namespace DATA;
    include_once '../DATA/Conexao.php';
    include_once '../MODEL/Editora.php';

    class EditoraDATA{
        public function Select(){
            $scriptSql = "Select * from editora;";
            $conexao = Conexao::conectarComDB();
            $todosOsRegistros = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            foreach($todosOsRegistros as $registroUnico){
                $editora = new \MODEL\Editora();

                $editora->setId($registroUnico['id']);
                $editora->setNome($registroUnico['nome']);
                $editora->setCnpj($registroUnico['cnpj']);

                $listaDeEditoras[] = $editora;
            }
            return $listaDeEditoras;
        }
        public function SelectById(int $id){
            $scriptSql = 'Select *from editora where id=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            $editora = new \MODEL\Editora();
            $editora->setId($registroUnico['id']);
            $editora->setNome($registroUnico['nome']);
            $editora->setCnpj($registroUnico['cnpj']);

            return $editora;
        }

        public function Insert(\MODEL\Editora $editora){
            $scripSql = "INSERT INTO editora(nome, cnpj) VALUES('
            {$editora->getNome()}','
            {$editora->getCnpj()}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scripSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        //oniotigago

        public function Update(\MODEL\Editora $editora){
            $scripSql = "UPDATE editora SET nome = ?, cnpj = ?;";

            $conexao = Conexao::conectarComDB();

            $query = $conexao->prepare($scripSql);
            $resultadoUpdate = $query->execute(array($editora->getNome(), $editora->getCnpj()));

            $conexao = Conexao::desconectarComDB();

            return $resultadoUpdate;
        }

        public function Delete(int $id){
            $scriptSql = "delete from editora WHERE id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array($id));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }
    }
?>