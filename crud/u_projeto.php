<?php
require('../database/db_config.php');

if(isset($_POST['id']) && isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento']) 
   && !empty($_POST['id']) && !empty($_POST['projeto']) && !empty($_POST['inicio']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['andamento'])){
    $id = $_POST['id'];
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $andamento = $_POST['andamento'];
    
    $sql = "UPDATE projetos SET idprojetos=:id,nomeprojeto=:nome,data_inicio=:inicio,data_entrega=:entrega,status=:status,andamento=:andamento WHERE idprojetos=:id";

    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->bindValue(':nome', $projeto);
    $result->bindValue(':inicio', $inicio);
    $result->bindValue(':entrega', $entrega);
    $result->bindValue(':status', $status);
    $result->bindValue(':andamento', $andamento);

    $result->execute();

    header('Location: ../dashboard/projeto.php?update=ok');
} else{
    $id = $_POST['id'];
    header("Location: u_projetoform.php?invalid=error&id=$id");
}