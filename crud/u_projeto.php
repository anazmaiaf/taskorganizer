<?php

if(isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento'])){
    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];

    $sql = 'UPDATE projetos SET nomeprojeto = :nome, data_inicio = :data_inicio, data_entrega = :data_entrega, status = :status, andamento = :andamento WHERE idprojetos = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':data_inicio', $inicio);
        $stmt->bindValue(':data_entrega', $entrega);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':andamento', $prioridade);

    header("Location: ../dashboard/tarefa.php?nome=$nome&update=atualizado");
}