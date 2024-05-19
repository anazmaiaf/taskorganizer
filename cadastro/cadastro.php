<?php

if(isset($_POST['username']) && !empty($_POST['username']) && 
   isset($_POST['password']) && !empty($_POST['password']) && 
   isset($_POST['email']) && !empty($_POST['email'])) {

    require("../database/db_config.php");
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO user (username, senha, email) VALUES (:username, :password, :email)";
    $result = $conn->prepare($sql);
    
    $result->bindValue(':username', $username);
    $result->bindValue(':password', $password);
    $result->bindValue(':email', $email);
    
    $result->execute();
    
    header('Location: ../login/loginform.php?stmt=ok');
    exit();
} else {
    header('Location: cadastroform.php?stmt=erro');
    exit();
}
?>
