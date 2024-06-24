<?php
    namespace DATA;
    include_once '../DATA/Conexao.php';
    include_once '../MODEL/Manga.php';

    class MangaDATA{
        public function Select()
        {
            $scriptSql = "SELECT * FROM manga WHERE excluido=0;";
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
                $manga->setUrlCapa($registroUnico['url_capa']);
                $manga->setEditoraId($registroUnico['editora_id']);
                $manga->setAutorId($registroUnico['autor_id']);
                
                $listaDeMangas[] = $manga;
            }

            return isset($listaDeMangas) ? $listaDeMangas : NULL;
        }

        public function SelectById(int $id){
            $scriptSql = 'SELECT * FROM manga WHERE id=?;';
            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id));
            $registroUnico = $query->fetch(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();
            if(isset($registroUnico)){
                
                $manga = new \MODEL\Manga();
                $manga->setId($registroUnico['id']);
                $manga->setNome($registroUnico['nome']);
                $manga->setVolume($registroUnico['volume']);
                $manga->setDescricao($registroUnico['descricao']);
                $manga->setResumo($registroUnico['resumo']);
                $manga->setAvaliacao($registroUnico['avaliacao']);
                $manga->setGenero($registroUnico['genero']);
                $manga->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);
                $manga->setUrlCapa($registroUnico['url_capa']);
                $manga->setEditoraId($registroUnico['editora_id']);
                $manga->setAutorId($registroUnico['autor_id']);

                return isset($manga) ? $manga : NULL;
            }else {
                echo "nenhum autor cadastrado" ;
            }
        }

        public function Insert(\MODEL\Manga $manga){
            $scriptSql = "INSERT INTO `manga` ( `nome`, `volume`, `descricao`,`resumo`, `avaliacao`, `genero`, `quantidades_requisitada`,`url_capa`, `autor_id`, `editora_id`) VALUES('{$manga->getNome()}','{$manga->getVolume()}', '{$manga->getDescricao()}', '{$manga->getResumo()}', '{$manga->getAvaliacao()}', '{$manga->getGenero()}', '{$manga->getQuantidadesRequisitada()}', '{$manga->getUrlCapa()}', '{$manga->getAutorId()}', '{$manga->getEditoraId()}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        //oniotigago

        public function Update(\MODEL\Manga $manga){ 
            $scripSql = "UPDATE manga SET nome = ?, volume = ?, descricao = ?, resumo = ?, avaliacao = ?, genero = ?, quantidades_requisitada = ?, url_capa = ?, editora_id = ?, autor_id = ? WHERE id=?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scripSql);
            $resultadoUpdate = $query->execute(array($manga->getNome(), $manga->getVolume(), $manga->getDescricao(),$manga->getResumo(), $manga->getAvaliacao(), $manga->getGenero(), $manga->getQuantidadesRequisitada(), $manga->getUrlCapa(), $manga->getEditoraId(), $manga->getAutorId(), $manga->getId()));

            $conexao = Conexao::desconectarComDB();

            return $resultadoUpdate;
        }

        public function Delete(int $id){
            $scriptSql = "UPDATE manga SET excluido=? WHERE id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array(1 ,$id));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }
    }
?>