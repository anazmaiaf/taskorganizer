<?php
require '../database/db_config.php';

if(isset($_POST['id'])){
    $id = $_POST['id']; 
    $nome = $_POST['nome'];

    $sql_tarefas = 'DELETE FROM tarefas WHERE projetos_idprojetos = :id';
        $result_tarefas = $conn->prepare($sql_tarefas);
        $result_tarefas->bindValue(':id', $id);
        $result_tarefas->execute();

    $sql_projeto = 'DELETE FROM projetos WHERE idprojetos = :id';
    $result_projeto = $conn->prepare($sql_projeto);
    $result_projeto->bindValue(':id', $id);
    $result_projeto->execute();

    header("Location: ../dashboard/projeto.php?projeto=$nome&delete=deletado");
}