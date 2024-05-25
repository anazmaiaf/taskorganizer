<?php
require '../database/db_config.php';

if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['prioridade'])) {
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];

    $sql = 'INSERT INTO tarefas(nome, data_inicio, data_entrega, status, prioridade, projetos_idprojetos) VALUES(:nome, :data_inicio, :data_entrega, :status, :prioridade, 1)';
    $result = $conn->prepare($sql);
    $result->bindValue(':nome', $nome);
    $result->bindValue(':data_inicio', $inicio);
    $result->bindValue(':data_entrega', $entrega);
    $result->bindValue(':status', $status);
    $result->bindValue(':prioridade', $prioridade);
    $result->execute();   

    header("Location: ../dashboard/tarefa.php?nome=$nome&inicio=$inicio&entrega=$entrega&status=$status&prioridade=$prioridade");
}
?>
