<?php
include_once '../BUSINESS/MangaService.php'; 
include_once '../MODEL/Manga.php';

$mangaSelecionado = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    try {
        $mangaSelecionado = (new BUSINESS\MangaService())->SelectbyId($_GET['id']);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'No ID parameter found in URL.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Screen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Manga Details</h3>
            </div>
            <div class="card-body">
                <?php
                if ($mangaSelecionado) {
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $mangaSelecionado->getUrlCapa(); ?>" alt="Cover Image" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <h4 class="card-title"><?php echo htmlspecialchars($mangaSelecionado->getNome()); ?></h4>
                        <p><strong>Volume:</strong> <?php echo htmlspecialchars($mangaSelecionado->getVolume()); ?></p>
                        <p><strong>Descrição:</strong> <?php echo htmlspecialchars($mangaSelecionado->getDescricao()); ?></p>
                        <p><strong>Resumo:</strong> <?php echo htmlspecialchars($mangaSelecionado->getResumo()); ?></p>
                        <p><strong>Avaliação:</strong> <?php echo htmlspecialchars($mangaSelecionado->getAvaliacao()); ?></p>
                        <p><strong>Gênero:</strong> <?php echo htmlspecialchars($mangaSelecionado->getGenero()); ?></p>
                        <p><strong>Quantidades Requisitada:</strong> <?php echo htmlspecialchars($mangaSelecionado->getQuantidadesRequisitada()); ?></p>
                        <p><strong>Editora ID:</strong> <?php echo htmlspecialchars($mangaSelecionado->getEditoraId()); ?></p>
                        <p><strong>Autor ID:</strong> <?php echo htmlspecialchars($mangaSelecionado->getAutorId()); ?></p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="edit.php?id=<?php echo htmlspecialchars($mangaSelecionado->getId()); ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($mangaSelecionado->getId()); ?>" class="btn btn-danger">Delete</a>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
                <?php
                } else {
                    echo "<p class='text-danger'>No data found for the provided ID.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>