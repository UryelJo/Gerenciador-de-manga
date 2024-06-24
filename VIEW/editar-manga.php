<?php
include_once "../BUSINESS/MangaService.php";
include_once "../MODEL/Manga.php";
include_once "../BUSINESS/EditoraService.php";
include_once "../MODEL/Editora.php";
include_once "../BUSINESS/AutorService.php";
include_once "../MODEL/Autor.php";

$mangaSelecionado = (new BUSINESS\MangaService())->SelectbyId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input-url'])) {

    if (empty($_POST['input-autor']) || empty( $_POST['input-editora'])) {
        echo "
        <div>
            <h2 style='color: red'><strong>Ocorreu um Erro!</strong></h2>
            <p>
                Provávelmente não existe nenhuma Editora ou nenhum Autor, e você <br>
                ignorando o aviso tentou editar/cadastrar um mangá, volte até a <br>
                pagina inicial, e cadastre as informações necessárias antes de <br>
                cadastrar/editar um mangá! 
            </p>
            <button onclick='document.location.href = `tela-principal.php`'>Voltar</button>
        </div>
        ";

        return;
    }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <button onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php'" class="btn btn-primary">Voltar</button>
        <h2>Editar Mangá</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2 class="my-4">Editando o Atual : <?php echo htmlspecialchars($mangaSelecionado->getNome(), ENT_QUOTES, 'UTF-8'); ?></h2>
        </div>
        <div class="card-body">
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-url">Link Foto</label>
                        <input 
                            id="input-url" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getUrlCapa(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-url" 
                            type="url" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-nome">Nome Anime</label>
                        <input 
                            id="input-nome" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getNome(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-nome" 
                            type="text" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-volume">Volume</label>
                        <input 
                            id="input-volume" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getVolume(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-volume" 
                            type="number" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-genero">Genero</label>
                        <input 
                            id="input-genero" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getGenero(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-genero" 
                            type="text" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-quantidade">Quantidade Requisitada</label>
                        <input 
                            id="input-quantidade" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getQuantidadesRequisitada(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-quantidade" 
                            type="number" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-avaliacao">Avaliação</label>
                        <input 
                            id="input-avaliacao" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getAvaliacao(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-avaliacao" 
                            type="number" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-editora">Editora</label>
                        <div class="form-check overflow-auto" style="height: 100px;">
                            <?php
                            $listaDeEditoras = ((new BUSINESS\EditoraService())->SelectAll());
                            if ($listaDeEditoras) {
                                foreach ($listaDeEditoras as $editora) {
                                    echo "<div class='form-check'>
                                    <input 
                                        class='form-check-input' 
                                        type='radio' id='input-editora'
                                        required
                                        name='input-editora' value='" . htmlspecialchars($editora->getId()) . "'>
                                    <label class='form-check-label'>" . htmlspecialchars($editora->getNome()) . "</label>
                                    </div>";
                                }
                            } else {
                                echo "<p>Não existem Editoras!<br> crie uma editora para continuar!</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-autor">Autor</label>
                        <div class="form-check overflow-auto" style="height: 100px;">
                            <?php
                            $listaDeAutores = ((new BUSINESS\AutorService())->SelectAll());
                            if ($listaDeAutores) {
                                foreach ($listaDeAutores as $autor) {
                                    echo "<div class='form-check'>
                                    <input 
                                        class='form-check-input' 
                                        type='radio' 
                                        id='input-autor' 
                                        name='input-autor' 
                                        required
                                        value='" . htmlspecialchars($autor->getId()) . "'>
                                    <label class='form-check-label'>" . htmlspecialchars($autor->getNome()) . "</label>
                                    </div>";
                                }
                            } else {
                                echo "<p>Não existem Autores!<br> crie um Autor para continuar!</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-resumo">Resumo</label>
                        <input 
                            id="input-resumo" 
                            value="<?php echo htmlspecialchars($mangaSelecionado->getDescricao(), ENT_QUOTES, 'UTF-8'); ?>" 
                            name="input-resumo" 
                            type="text" 
                            required
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input-descricao">Descrição</label>
                        <textarea 
                            id="input-descricao" 
                            name="input-descricao" 
                            class="form-control" 
                            required
                            rows="10"><?php echo htmlspecialchars($mangaSelecionado->getResumo(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            </form>
            <form method="POST" class="mt-3">
                <input type="hidden" name="delete" value="true">
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>