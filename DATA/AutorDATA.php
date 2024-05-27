<?php
    namespace DATA;

    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\Conexao.php';
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\MODEL\Autor.php';

    class AutorDATA
    {
        public function Select()
        {
            $scriptSql = "Select * from Autor;";
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
    }
?>