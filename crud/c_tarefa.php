<?php
require '../database/db_config.php';

if(isset($_POST['nome']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['prioridade']) &&
   !empty($_POST['nome']) && !empty($_POST['inicio']) && !empty($_POST['entrega']) && !empty($_POST['status']) && !empty($_POST['prioridade'])) {
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];
    $projetorelacionado = $_POST['projeto'];

    $sql = 'INSERT INTO tarefas(nome, data_inicio, data_entrega, status, prioridade, projetos_idprojetos) VALUES(:nome, :data_inicio, :data_entrega, :status, :prioridade, :projetos_idprojetos)';
    $result = $conn->prepare($sql);
    $result->bindValue(':nome', $nome);
    $result->bindValue(':data_inicio', $inicio);
    $result->bindValue(':data_entrega', $entrega);
    $result->bindValue(':status', $status);
    $result->bindValue(':prioridade', $prioridade);
    $result->bindValue(':projetos_idprojetos', $projetorelacionado);
    $result->execute();   

    header("Location: ../dashboard/tarefa.php?insert=cadastrado");
}else{
    header('Location: c_tarefaform.php?invalid=erro');
};