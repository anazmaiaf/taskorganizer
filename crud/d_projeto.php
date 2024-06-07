<?php
require '../database/db_config.php';

if (isset($_POST['idprojeto']) && !empty($_POST['idprojeto'])) {
    $id = $_POST['idprojeto'];
    
    $sql = "DELETE FROM projetos WHERE idprojetos = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id, PDO::PARAM_INT);
    $result->execute();
    
    header("Location: ../dashboard/projeto.php?projeto=deletado");
    exit();
}
