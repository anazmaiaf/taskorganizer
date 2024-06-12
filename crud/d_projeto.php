<?php
if(isset($_POST["id"])) {
    require "../database/db_config.php";
    $id = $_POST["id"];
    
    $sql = "DELETE FROM projetos WHERE idprojetos = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    header("Location: ../dashboard/projeto.php?delete=ok");
}