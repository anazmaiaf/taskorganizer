<?php
require '../database/db_config.php';

if(isset($_POST['nome']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['prioridade'])) {
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];
    $projetorelacionado = $_POST['projeto'];

    $sql = 'UPDATE tarefas SET nome=:nome,data_inicio=:data_inicio,data_entrega=:data_entrega,status=:status,prioridade=:prioridade,projetos_idprojeto=:projeto';
    $result = $conn->prepare($sql);
    $result->bindValue(':nome', $nome);
    $result->bindValue(':data_inicio', $inicio);
    $result->bindValue(':data_entrega', $entrega);
    $result->bindValue(':status', $status);
    $result->bindValue(':prioridade', $prioridade);
    $result->bindValue(':projetos_idprojetos', $projetorelacionado);
    $result->execute();   

    header("Location: ../dashboard/tarefa.php?nome=$nome&update=atualizado");
}