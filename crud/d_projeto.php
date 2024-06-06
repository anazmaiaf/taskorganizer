<?php
require '../database/db_config.php';

if (isset($_POST['id']) && isset($_POST['nome']) && !empty($_POST['id']) && !empty($_POST['nome'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM projetos WHERE idprojetos = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();

    header("Location: ../dashboard/projeto.php?projeto=deletado");
}