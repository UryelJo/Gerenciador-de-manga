<?php 
    namespace DATA;

    include_once '../DATA/Conexao.php';
    include_once '../MODEL/UserManga.php';

    class UserMangaDATA{
        public function SelectByIdUser(int $id_user){
            $scriptSql = 'SELECT * FROM user_manga INNER JOIN manga ON user_manga.manga_id = manga.id WHERE user_manga.user_id=?;';

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id_user));
            $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            foreach($registros as $registroUnico){
                $mangaRelacionadoAoUser = new \MODEL\UserManga();
                $mangaRelacionadoAoUser->setIdUser($registroUnico['user_id']);
                $mangaRelacionadoAoUser->setIdManga($registroUnico['manga_id']);
                $mangaRelacionadoAoUser->setId($registroUnico['id']);
                $mangaRelacionadoAoUser->setNome($registroUnico['nome']);
                $mangaRelacionadoAoUser->setVolume($registroUnico['volume']);
                $mangaRelacionadoAoUser->setDescricao($registroUnico['descricao']);
                $mangaRelacionadoAoUser->setResumo($registroUnico['resumo']);
                $mangaRelacionadoAoUser->setAvaliacao($registroUnico['avaliacao']);
                $mangaRelacionadoAoUser->setGenero($registroUnico['genero']);
                $mangaRelacionadoAoUser->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);
                $mangaRelacionadoAoUser->setUrlCapa($registroUnico['url_capa']);
                $mangaRelacionadoAoUser->setEditoraId($registroUnico['editora_id']);
                $mangaRelacionadoAoUser->setAutorId($registroUnico['autor_id']);

                $listaDeMangasFavoritos[] = $mangaRelacionadoAoUser;
            }
            
            return isset($listaDeMangasFavoritos) ? $listaDeMangasFavoritos : NULL;
        }

        public function AdicionarAosFavoritos(int $idUser, int $idManga){
            $scriptSql = "INSERT INTO `user_manga` (`user_id`, `manga_id`) VALUES ('{$idUser}','{$idManga}');";

            $conexao = Conexao::conectarComDB();
            $resultadoCadastro = $conexao->query($scriptSql);
            $conexao = Conexao::desconectarComDB();

            return $resultadoCadastro;
        }

        public function RemoverDosFavoritos(int $idUser, int $idManga){
            $scriptSql = "DELETE FROM user_manga WHERE user_id=? AND manga_id=?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $resultadoDelecao = $query->execute(array($idUser , $idManga));
            $conexao = Conexao::desconectarComDB();

            return $resultadoDelecao;
        }

        public function MangaIsCadastrado(int $idUser, int $idManga){
            $scriptSql = "SELECT * FROM db.user_manga WHERE user_id = ? AND manga_id = ?;";

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($idUser, $idManga));
            $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            return empty($registros) ? false : true;
        }
    }
?>