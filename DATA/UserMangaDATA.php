<?php 
    namespace DATA;

    include_once '../DATA/Conexao.php';
    include_once '../MODEL/UserManga.php';

    class UserManga{
        public function SelectByIdUser(int $id_user){
            $scriptSql = 'SELECT * FROM user_manga INNER JOIN manga ON user_manga.manga_id = manga.id WHERE user_manga.id_user=?;';

            $conexao = Conexao::conectarComDB();
            $query = $conexao->prepare($scriptSql);
            $query->execute(array($id_user));
            $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
            $conexao = Conexao::desconectarComDB();

            foreach($registros as $registroUnico){
                $mangaRelacionadoAoUser = new \MODEL\UserManga();
                $mangaRelacionadoAoUser->setIdUser($registroUnico['user_id']);
                $mangaRelacionadoAoUser->setIdManga($registroUnico['manga_id']);
                $mangaRelacionadoAoUser->manga->setId($registroUnico['id']);
                $mangaRelacionadoAoUser->manga->setNome($registroUnico['nome']);
                $mangaRelacionadoAoUser->manga->setVolume($registroUnico['volume']);
                $mangaRelacionadoAoUser->manga->setDescricao($registroUnico['descricao']);
                $mangaRelacionadoAoUser->manga->setResumo($registroUnico['resumo']);
                $mangaRelacionadoAoUser->manga->setAvaliacao($registroUnico['avaliacao']);
                $mangaRelacionadoAoUser->manga->setGenero($registroUnico['genero']);
                $mangaRelacionadoAoUser->manga->setQuantidadesRequisitada($registroUnico['quantidades_requisitada']);
                $mangaRelacionadoAoUser->manga->setUrlCapa($registroUnico['url_capa']);
                $mangaRelacionadoAoUser->manga->setEditoraId($registroUnico['editora_id']);
                $mangaRelacionadoAoUser->manga->setAutorId($registroUnico['autor_id']);

                $listaDeMangasFavoritos[] = $mangaRelacionadoAoUser;
            }
            
            return isset($listaDeMangasFavoritos) ? $listaDeMangasFavoritos : NULL;;
        }
    }
?>