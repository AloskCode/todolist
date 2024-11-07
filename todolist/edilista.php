<?php
session_start();
require_once('conexaolist.php');

$lista = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $listaid = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM lista_de_tarefas WHERE id = '{$listaid}'";
    $query = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($query) > 0) {
        $lista = mysqli_fetch_array($query);
    }
}

function transformarStatus($status) {
    if ($status == 0) {
        return "Para fazer";
    } elseif ($status == 1) {
        return  "Em Andamento";
    } else {
        return "Concluída";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                        <i class="bi bi-list-task"></i> Editar tarefa
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($lista) :
                        ?>
                        <form action="acoeslist.php" method="POST">
                        <input type="hidden" name="listaid" value="<?=$lista['id']?>">
                            <div class="mb-3">
                                <label for="txtNome">Nome</label>
                                <input type="text" name="txtNome" value="<?=$lista['nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="txtdescricao">Descrição</label>
                                <textarea class="form-control" name="txtdescricao" rows="3"><?=$lista['descricao']?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtStatus">Status</label>
                                <select name="txtStatus" id="txtStatus" value="<?=$lista['status']?>" class="form-select">
                                <option value="0" <?= ($lista['status'] == 0) ? 'selected' : '' ?>><?= transformarStatus(0) ?></option>
                                <option value="1" <?= ($lista['status'] == 1) ? 'selected' : '' ?>><?= transformarStatus(1) ?></option>
                                <option value="2" <?= ($lista['status'] == 2) ? 'selected' : '' ?>><?= transformarStatus(2) ?></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtDataNascimento">Data limite</label>
                                <input type="date" name="txtDataLimite"  value="<?=$lista['data_limite']?>" class="form-control">
                            </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="editlist" class="btn btn-primary float-end">Salvar</button>
                            </div>

                            <?php
                        else:
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Tarefa não encontrada
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>