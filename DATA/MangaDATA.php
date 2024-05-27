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
                $manga->setResumo($registroUnico['resumo']);
                $manga->setAvaliacao($registroUnico['avaliacao']);
                $manga->setGenero($registroUnico['genero']);
                $manga->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);


                $listaDeMangas[] = $manga;
            }

            return $listaDeMangas;
        }

        public function SelectById(int $id){
            $scriptSql = 'Select *from Manga where id=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            $manga = new \MODEL\Manga();
            $manga->setId($registroUnico['id']);
            $manga->setNome($registroUnico['nome']);
            $manga->setVolume($registroUnico['volume']);
            $manga->setDescricao($registroUnico['descricao']);
            $manga->setResumo($registroUnico['resumo']);
            $manga->setAvaliacao($registroUnico['avaliacao']);
            $manga->setGenero($registroUnico['genero']);
            $manga->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);

            return $manga;
        }

        public function Insert(\MODEL\Manga $manga){
            $scripSql = "INSERT INTO Manga(nome, volume, descricao, resumo, avaliacao, genero, quantidades_requisitadas) VALUES('
            {$manga->getNome()}','
            {$manga->getVolume()}', '
            {$manga->getDescricao()}', '
            {$manga->getResumo()}', '
            {$manga->getAvaliacao()}', '
            {$manga->getGenero()}', '
            {$manga->getQuantidadesRequisitada()}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scripSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        //oniotigago

        public function Update(\MODEL\Manga $manga){
            $scripSql = "UPDATE Manga SET nome = ?, volume = ?, descricao = ?, resumo = ?, avaliacao = ?, genero = ?, quantidades_requesitada = ?;";

            $conexao = Conexao::conectarComDB();

            $query = $conexao->prepare($scripSql);
            $resultadoUpdate = $query->execute(array($manga->getNome(), $manga->getVolume(), $manga->getDescricao(),$manga->getResumo(), $manga->getAvaliacao(), $manga->getGenero(), $manga->getQuantidadesRequisitada()));

            $conexao = Conexao::desconectarComDB();

            return $resultadoUpdate;
        }

        public function Delete(int $id){
            $scriptSql = "delete from Manga WHERE id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array($id));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }
    }
?>