<?php
    namespace DATA;
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\Conexao.php';
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\MODEL\Editora.php';

    class EditoraDATA{
        public function Select(){
            $scriptSql = "Select * from Editora;";
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
    }
?>