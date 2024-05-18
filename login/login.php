<?php

if(isset($_POST['user']) && isset($_POST['password'])){
    session_start();
    require("../database/db_config.php");
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = :user AND senha = :password";
    $result = $conn->prepare($sql);
    $result-> bindValue(':user', $user);
    $result-> bindValue(':password', $password);
    $result-> execute();

    if($result->rowCount() > 0){
        $dado = $result->fetch();
    
        $_SESSION['id'] = $dado['iduser'];
        $_SESSION['username'] = $dado['username'];
    
        header('Location: /taskorganizer/dashboard/index.php'); 
        exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
    } else {
        header('Location: /taskorganizer/login/loginform.php');
        exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
    }
    
}
