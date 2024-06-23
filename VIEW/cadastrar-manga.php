<?php
    include_once "../BUSINESS/MangaService.php";
    include_once "../MODEL/Manga.php";
    include_once "../BUSINESS/EditoraService.php";
    include_once "../MODEL/Editora.php";
    include_once "../BUSINESS/AutorService.php";
    include_once "../MODEL/Autor.php";

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
        $quantidade = $_POST['input-quantidade'];
        $avaliacao = $_POST['input-avaliacao'];
        $resumo = $_POST['input-resumo'];
        $descricao = $_POST['input-descricao'];
        $idAutor = $_POST['input-autor'];
        $idEditora = $_POST['input-editora'];

        (new BUSINESS\MangaService())->Insert(
            MODEL\Manga::construtorComParametrosSemId($nome, $volume, $resumo, $descricao, $avaliacao,
            $genero, $quantidade, $urlFoto, $idEditora, $idAutor)
        );

        header("location: http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Mangá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button onclick="document.location.href = 'http://localhost:8080/Gerenciador-de-manga/VIEW/mangas.php'" class="btn btn-primary">Voltar</button>
            <h2>Cadastrar Mangá</h2>
        </div>
        <form method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="input-url" class="form-label">Link Foto</label>
                        <input 
                            id="input-url" 
                            name="input-url" 
                            type="url" 
                            required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="input-nome" class="form-label">Nome Anime</label>
                        <input 
                            id="input-nome" 
                            name="input-nome" 
                            type="text" 
                            required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="input-volume" class="form-label">Volume</label>
                        <input 
                            id="input-volume" 
                            name="input-volume" 
                            type="number" 
                            required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="input-genero" class="form-label">Genero</label>
                        <input 
                            id="input-genero" 
                            name="input-genero" 
                            type="text" 
                            required
                            class="form-control">
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label for="input-quantidade" class="form-label">Quantidade Requisitada</label>
                            <input 
                                id="input-quantidade" 
                                name="input-quantidade" 
                                type="number" 
                                required
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="input-avaliacao" class="form-label">Avaliação</label>
                            <input 
                                id="input-avaliacao" 
                                name="input-avaliacao" 
                                type="number" 
                                required
                                class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="input-editora" class="form-label">Editora</label>
                        <div class="form-check overflow-auto" style="height: 100px;">
                            <?php
                            $listaDeEditoras = ((new BUSINESS\EditoraService())->SelectAll());
                            if ($listaDeEditoras) {
                                foreach ($listaDeEditoras as $editora) {
                                    echo "<div class='form-check'>
                                    <input class='form-check-input' type='radio' required id='input-editora' name='input-editora' value='" . htmlspecialchars($editora->getId()) . "'>
                                    <label class='form-check-label'>" . htmlspecialchars($editora->getNome()) . "</label>
                                    </div>";
                                }
                            } else {
                                echo "<p>Não existem Editoras!<br> crie uma editora para continuar!</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input-autor" class="form-label">Autor</label>
                        <div class="form-check overflow-auto" style="height: 100px;">
                            <?php
                            $listaDeAutores = ((new BUSINESS\AutorService())->SelectAll());
                            if ($listaDeAutores) {
                                foreach ($listaDeAutores as $autor) {
                                    echo "<div class='form-check'>
                                    <input class='form-check-input' required type='radio' id='input-autor' name='input-autor' value='" . htmlspecialchars($autor->getId()) . "'>
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
                    <div class="mb-3">
                        <label for="input-resumo" class="form-label">Resumo</label>
                        <input 
                            id="input-resumo" 
                            name="input-resumo" 
                            type="text" 
                            required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="input-descricao" class="form-label">Descrição</label>
                        <textarea 
                            id="input-descricao" 
                            name="input-descricao" 
                            class="form-control" 
                            required
                            rows="9"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>