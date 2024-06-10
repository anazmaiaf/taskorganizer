<?php
require '../database/db_config.php';

if(isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento']) && !empty($_POST['projeto']) && !empty($_POST['inicio']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['andamento'])){
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $andamento = $_POST['andamento'];

    $sql = 'UPDATE projetos SET nomeprojeto = :nome, data_inicio = :data_inicio, data_entrega = :data_entrega, status = :status, andamento = :andamento WHERE idprojetos = :id';
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->bindValue(':nome', $nome);
    $result->bindValue(':data_inicio', $inicio);
    $result->bindValue(':data_entrega', $entrega);
    $result->bindValue(':status', $status);
    $result->bindValue(':andamento', $prioridade);
    $result->execute();

    header("Location: ../dashboard/projeto.php?update=atualizado");
}