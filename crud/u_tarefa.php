<?php
require '../database/db_config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$inicio = $_POST['inicio'];
$entrega = $_POST['entrega'];
$status = $_POST['status'];
$prioridade = $_POST['prioridade'];
$projeto = $_POST['projetos'];

$sql = "";