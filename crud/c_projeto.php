<?php

require '../database/db_config.php';

if(isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['status']) && isset($_POST['entrega']) && isset($_POST['andamento'])){
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $status = $_POST['status'];
    $entrega = $_POST['entrega'];
    $andamento = $_POST['andamento'];

    $sql = "INSERT INTO projetos(nomeprojeto, data_inicio, data_entrega, status, andamento) 
            VALUES(:projeto, :inicio, :entrega, :status, :andamento)";
    
    $result = $conn->prepare($sql);
    $result->bindValue(':projeto',$projeto);
    $result->bindValue(':inicio',$inicio);
    $result->bindValue(':status',$status);
    $result->bindValue(':entrega',$entrega);
    $result->bindValue(':andamento',$andamento);

    if($result->execute()){
        header('Location: ../dashboard/projeto.php');
    }
};