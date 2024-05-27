<?php
    namespace DATA;
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\DATA\Conexao.php';
    include_once 'C:\Users\Uryel\Documents\Programação\PHP\TrabalhoAlmir\MODEL\Manga.php';

    class MangaDATA{
        public function Select()
        {
            $scriptSql = "Select * from Manga;";
            $conexao = Conexao::conectarComDB();
            $todosOsRegistros = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            foreach($todosOsRegistros as $registroUnico){
                $manga = new \MODEL\Manga();

                $manga->setId($registroUnico['id']);
                $manga->setNome($registroUnico['nome']);
                $manga->setVolume($registroUnico['volume']);
                $manga->setDescricao($registroUnico['descricao']);
                $manga->setAvaliacao($registroUnico['avaliacao']);
                $manga->setGenero($registroUnico['genero']);
                $manga->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);


                $listaDeMangas[] = $manga;
            }

            return $listaDeMangas;
        }
    }
?>