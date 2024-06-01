<?php
require '../database/db_config.php';

if(isset($_POST['id'])){
    $id = $_POST['id']; 
    $nome = $_POST['nome'];

    $sql = 'DELETE FROM projetos WHERE idprojetos = :id';
    $result = $conn->prepare($sql);
    $result -> bindValue(':id', $id);
    $result -> execute();

    header("Location: ../dashboard/projeto.php?projeto=$nome&delete=deletado");
}