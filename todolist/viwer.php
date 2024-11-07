<?php
require 'conexaolist.php';

$sql = "SELECT * FROM lista_de_tarefas";
$lista_de_tarefas = mysqli_query($conexao, $sql);

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
    <title>Nova Tarefa</title>
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
                            Visuzalizar <i class="bi bi-list-task"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if(isset($_GET['id'])) {
                            $lista_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM lista_de_tarefas WHERE id='$lista_id'";
                            $query = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $lista = mysqli_fetch_array($query);
                        
                              ?>
                            <div class="mb-3">
                                <label>Nome</label>
                                <p class="form-control">
                                <?=$lista['nome'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <p class="form-control">
                                <?=$lista['descricao'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <p>
                                <?=transformarStatus($lista['status'])?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Prazo</label>
                                <p class="form-control">
                                <?=$lista['data_limite'];?>
                                </p>
                            </div>

                        <?php 
                        }else{
                            echo"<h5>Tarefa não encontrada</h5>";
                        }
                       }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>