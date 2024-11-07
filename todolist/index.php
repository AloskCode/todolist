<?php
session_start();
require_once("conexaolist.php");

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
    <title>Lista de Tarefas</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php include('mensagemlist.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                        <i class="bi bi-list-task"></i> Lista de Tarefas 
                            <a href="adicionar-tarefa.php" class="btn btn-dark float-end">Nova tarefa</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Prazo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lista_de_tarefas as $lista) { ?>
                                    <tr>
                                        <td><?php echo $lista['id']; ?></td>
                                        <td><?php echo $lista['nome']; ?></td>
                                        <td><?php echo transformarStatus($lista['status']); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($lista['data_limite'])); ?></td>
                                        <td>
                                            <a href="viwer.php?id=<?php echo $lista['id']; ?>" class="btn btn-secondary"><i class="bi bi-eye-fill"></i></a>
                                            <a href="edilista.php?id=<?php echo $lista['id']; ?>" class="btn btn-success" ><i class="bi bi-pen"></i></a>
                                            <form action="acoeslist.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deltarefa" type="submit" value="<?=$lista['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-file-earmark-x-fill"></i></button>
                                            </form>
                                            <form action="acoeslist.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza que deseja concluir')" name="concluir" type="submit" value="<?=$lista['id']?>" class="btn btn-primary">Concluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
