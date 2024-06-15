<?php
require '../database/db_config.php';

if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['prioridade'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];
    $projeto = $_POST['projeto'];

    $sql = 'UPDATE tarefas SET  nome = :nome, data_inicio = :inicio, data_entrega = :entrega, prioridade = :prioridade, status = :status, projetos_idprojetos = :projeto WHERE idtarefa = :id';

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
    header('Location: u_tarefaform.php?invalid=error');
}