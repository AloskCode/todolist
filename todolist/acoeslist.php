<?php
session_start();
require_once('conexaolist.php');

if (isset($_POST['criar_tarefa'])) {
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtdescricao']);
    $status = trim($_POST['txtStatus']);
    $datalimite = trim($_POST['txtDataLimite']);

    $sql = "INSERT INTO lista_de_tarefas(nome, descricao, status, data_limite) VALUES('$nome', '$descricao','$status', '$datalimite')";
    
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Tarefa criada com sucesso';
        header('Location: index.php');
        exit;
        $_SESSION['mensagem'] = 'Falha ao criar tarefa';
    } else header('Location: index.php');
        exit;


}

if (isset($_POST['editlist'])) {

    $listaid = mysqli_real_escape_string($conexao, $_POST['listaid']);
    $nome = mysqli_real_escape_string($conexao, $_POST['txtNome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['txtdescricao']);
    $status = mysqli_real_escape_string($conexao, $_POST['txtStatus']);
    $datalimite = mysqli_real_escape_string($conexao, $_POST['txtDataLimite']);

    $sql = "UPDATE lista_de_tarefas SET nome = '{$nome}', descricao = '{$descricao}', status = '{$status}', data_limite = '{$datalimite}' WHERE id = '{$listaid}'";


    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['messagem'] = "Tarefa {$listaid} atualizado com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['messagem'] = "Não foi possível alterar a {$listaid}";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}

if (isset($_POST['deltarefa'])) {
    $listaid = mysqli_real_escape_string($conexao, $_POST['deltarefa']);
    $sql = "DELETE FROM lista_de_tarefas WHERE id = '$listaid'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['messagem'] = "Tarefa {$listaid} excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['messagem'] = "Não foi possível excluir essa tarefa";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
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

if (isset($_POST['concluir'])){
    $listaid = mysqli_real_escape_string($conexao, $_POST['concluir']);
    $sql = "UPDATE lista_de_tarefas SET status = '2' WHERE id = '$listaid'";

    mysqli_query($conexao, $sql);

    header('Location: index.php');
    exit();
}
