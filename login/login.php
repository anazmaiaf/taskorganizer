<?php

if(isset($_POST['user']) && isset($_POST['password']) ){
    session_start();
    require("../database/db_config.php");
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = :user AND senha = :password";
    $result = $conn->prepare($sql);
    $result-> bindValue(':user', $user);
    $result-> bindValue(':password', $password);
    $result-> execute();

    if($result-> rowCount() > 0){
        $dado = $result -> fetch();

        $_SESSION['id'] = $dado['iduser'];
        $_SESSION['username'] = $dado['username'];

        header('Location: ../../index.php');
    } else {
        header('Location: ../loginform.php');
        echo '
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        ';
    }
}