<?php
require '../database/db_config.php';

if (isset($_POST['id']) && isset($_POST['nome'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tarefas WHERE idtarefa = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();

    header("Location: ../dashboard/tarefa.php?tarefa=deletado");
}