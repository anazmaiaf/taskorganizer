<?php
require '../database/db_config.php';

if (
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['inicio']) && !empty($_POST['inicio']) &&
    isset($_POST['entrega']) && !empty($_POST['entrega']) &&
    isset($_POST['status']) && !empty($_POST['status']) &&
    isset($_POST['prioridade']) && !empty($_POST['prioridade']) &&
    isset($_POST['projeto']) && !empty($_POST['projeto'])
) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];
    $projeto = $_POST['projeto'];

    $sql = 'UPDATE tarefas SET nome = :nome, data_inicio = :inicio, data_entrega = :entrega, prioridade = :prioridade, status = :status, projetos_idprojetos = :projeto WHERE idtarefa = :id';

    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->bindValue(':nome', $nome);
    $result->bindValue(':inicio', $inicio);
    $result->bindValue(':entrega', $entrega);
    $result->bindValue(':prioridade', $prioridade);
    $result->bindValue(':status', $status);
    $result->bindValue(':projeto', $projeto);

    $result->execute();

    header('Location: ../dashboard/tarefa.php?update=ok');
} else {
    $id = $_POST['id'];
    header("Location: ../crud/u_tarefaform.php?invalid=error&id=$id");
};