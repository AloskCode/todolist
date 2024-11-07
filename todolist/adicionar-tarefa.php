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
                            Adicionar tarefa <i class="bi bi-list-task"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoeslist.php" method="POST">
                            <div class="mb-3">
                                <label for="txtNome">Nome</label>
                                <input type="text" name="txtNome" id="txtNome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="txtdescricao">Descrição</label>
                                <textarea class="form-control"  name="txtdescricao" id="txtdescricao" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtStatus">Status</label>
                                <select name="txtStatus" id="txtStatus" class="form-select">
                                <option value="0" >Para fazer</option>
                                <option value="1" >Em andamento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtDataNascimento">Data limite</label>
                                <input type="date" name="txtDataLimite" id="txtDataLimite" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="criar_tarefa" class="btn btn-primary float-end">Adicionar Tarefa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>