<?php
require '../database/db_config.php';

if(isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento'])){
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $andamento = $_POST['andamento'];

    $sql = 'INSERT INTO projetos(nomeprojeto,data_inicio,data_entrega,status,andamento) VALUES(:projeto,:data_inicio,:data_entrega,:status,:andamento)';
    $result = $conn->prepare($sql);
    $result -> bindValue(':projeto',$projeto);
    $result -> bindValue(':data_inicio',$inicio);
    $result -> bindValue(':data_entrega',$entrega);
    $result -> bindValue(':status',$status);
    $result -> bindValue(':andamento',$andamento);

    $result -> execute();

    header('Location: ../dashboard/projeto.php');
}