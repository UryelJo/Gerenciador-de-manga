<?php
include_once "../BUSINESS/MangaService.php";
include_once "../MODEL/Manga.php";
include_once "../BUSINESS/EditoraService.php";
include_once "../MODEL/Editora.php";
include_once "../BUSINESS/AutorService.php";
include_once "../MODEL/Autor.php";

$mangaSelecionado = (new BUSINESS\MangaService())->SelectbyId($_GET['id']);
MODEL\Manga::construtorComParametros(
    $_GET['id'], 
    $mangaSelecionado->getNome(), 
    $mangaSelecionado->getVolume(), 
    $mangaSelecionado->getResumo(), 
    $mangaSelecionado->getDescricao(), 
    $mangaSelecionado->getAvaliacao(), 
    $mangaSelecionado->getGenero(), 
    $mangaSelecionado->getQuantidadesRequisitada(), 
    $mangaSelecionado->getUrlCapa(), 
    NULL, 
    NULL);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-url'])) {

    $urlFoto = $_POST['input-url'];
    $nome = $_POST['input-nome'];
    $volume = $_POST['input-volume'];
    $genero = $_POST['input-genero'];
    $quantidadesRequisitada = $_POST['input-quantidade'];
    $avaliacao = $_POST['input-avaliacao'];
    $resumo = $_POST['input-resumo'];
    $descricao = $_POST['input-descricao'];
    $idAutor = $_POST['input-autor'];
    $idEditora = $_POST['input-editora'];

    (new BUSINESS\MangaService())->Update(
        MODEL\Manga::construtorComParametros($_GET['id'], $nome, $volume, $resumo, $descricao, $avaliacao, $genero, $quantidadesRequisitada, $urlFoto, $idEditora, $idAutor)
    );

    header("location: http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php");
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    (new BUSINESS\MangaService())->Delete($_GET['id']);

    header("Location: http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mangá</title>
    <link rel="stylesheet" href="./CSS/shared.css">
</head>
<body>
    <div class="w-80 row align-center" style="gap: 20px">
        <div style="width: 300px">
            <button onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php'" class="button w-80">Voltar</button>
        </div>
        <h2>Cadastrar Mangá</h2>
    </div>
    <form class="card w-80 h-80 row" style="gap: 20px" method="POST">
        <div class="col" style="width: 50%; justify-content: space-evenly">
            <!-- Parte de Cima esquerda !-->
            <div class="row justify-center" style="width: 100%; height: 250px; gap:20px">
                <div class="col" style="gap: 10px">
                    <div class="col">
                        <label for="input-url">Link Foto</label>
                        <input id="input-url" value="<?php echo htmlspecialchars($mangaSelecionado->getUrlCapa(), ENT_QUOTES, 'UTF-8'); ?>" name="input-url" type="url">
                    </div>
                    <div class="col">
                        <label for="input-nome">Nome Anime</label>
                        <input id="input-nome" value="<?php echo htmlspecialchars($mangaSelecionado->getNome(), ENT_QUOTES, 'UTF-8'); ?>" name="input-nome" type="text">
                    </div>
                    <div class="col">
                        <label for="input-volume">Volume</label>
                        <input id="input-volume" value="<?php echo htmlspecialchars($mangaSelecionado->getVolume(), ENT_QUOTES, 'UTF-8'); ?>" name="input-volume" type="number">
                    </div>
                </div>
            </div>
            <!-- Parte de Cima esquerda !-->
            <!-- Parte de Baixo esquerda !-->
            <div class="col justify-center" style="width: 100%; height: 250px; gap:20px">
                <div class="col">
                    <label for="input-genero">Genero</label>
                    <input id="input-genero" value="<?php echo htmlspecialchars($mangaSelecionado->getGenero(), ENT_QUOTES, 'UTF-8'); ?>" name="input-genero" type="text">
                </div>
                <div class="row" style="justify-content: space-evenly">
                    <div class="col">
                        <label for="input-quantidade">Quantidade Requisitada</label>
                        <input id="input-quantidade" value="<?php echo htmlspecialchars($mangaSelecionado->getQuantidadesRequisitada(), ENT_QUOTES, 'UTF-8'); ?>" name="input-quantidade" type="number">
                    </div>
                    <div class="col">
                        <label for="input-avaliacao">Avaliação</label>
                        <input id="input-avaliacao" value="<?php echo htmlspecialchars($mangaSelecionado->getAvaliacao(), ENT_QUOTES, 'UTF-8'); ?>" name="input-avaliacao" type="number">
                    </div>
                </div>
                <div class="row" style="justify-content: space-evenly">
                    <div class="col">
                        <label for="input-editora">Editora</label>
                        <div style="height: 80px; overflow-y: scroll">
                        <?php
                        $listaDeEditoras = ((new BUSINESS\EditoraService())->SelectAll());
                        if ($listaDeEditoras) {
                            foreach ($listaDeEditoras as $editora) {
                                echo "<div class='row align-center'>
                                <input type='radio' id='input-editora' name='input-editora' value='" . htmlspecialchars($editora->getId(), ENT_QUOTES, 'UTF-8') . "' " . ($editora->getId() == $mangaSelecionado->getEditoraId() ? 'checked="true"' : '') . ">
                                " . htmlspecialchars($editora->getNome(), ENT_QUOTES, 'UTF-8') . "
                                </div>";
                            }
                        } else {
                            echo "<p>Não existem editoras!<br> crie uma editora para continuar!</p>";
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="input-autor">Autor</label>
                        <div style="height: 80px; overflow-y: scroll">
                        <?php
                        if ($autorId !== null) {
                            $listaDeAutores = (new BUSINESS\AutorService())->SelectAll();
                            foreach ($listaDeAutores as $autor) {
                                echo "<div class='row align-center'>
                                <input type='radio' id='input-autor-" . htmlspecialchars($autor->getId(), ENT_QUOTES, 'UTF-8') . "' " . ($autor->getId() == $autorId ? 'checked="true"' : '') . " name='input-autor' value='" . htmlspecialchars($autor->getId(), ENT_QUOTES, 'UTF-8') . "'>
                                " . htmlspecialchars($autor->getNome(), ENT_QUOTES, 'UTF-8') . "
                                </div>";
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Parte de Baixo esquerda !-->
            <!-- Direita !-->
        </div>
        <div class="col align-center" style="width: 50%; justify-content: space-evenly">
            <div class="col justify-center" style="width: 100%; height: 400px; gap:20px">
                <div class="col">
                    <label for="input-resumo">Resumo</label>
                    <input id="input-resumo" value="<?php echo htmlspecialchars($mangaSelecionado->getResumo(), ENT_QUOTES, 'UTF-8'); ?>" name="input-resumo" type="text">
                </div>
                <div class="col" style="height:100%">
                    <label for="input-descricao">Descrição</label>
                    <textarea id="input-descricao" name="input-descricao" style="height: 100%"><?php echo htmlspecialchars($mangaSelecionado->getDescricao(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
            </div>
            <button action="submit" class="button w-80">Salvar</button>
        </div>
    </form>
    <form method="POST" class="w-80 p-10">
        <input type="hidden" name="delete" value="true">
        <button type="submit" class="button w-80">Deletar</button>
    </form>
</body>
</html>