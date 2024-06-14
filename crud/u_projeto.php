<?php
if(isset($_POST['id']) && isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento'])){
    $id = $_POST['id'];
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $andamento = $_POST['andamento'];

    echo 'aaaaa';
    var_dump($id);
} else {
    echo 'bbbb';
}