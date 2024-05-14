<?php
    require 'database/db_config.php';
    if(!isset($_SESSION['id'])){
        header('Location: login/loginform.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="h-100" data-bs-theme="dark">
    <?php
    require 'templates/header.php';
    require 'templates/navbar.php';
    ?>
            <div class="col py-3">
                <h1 class="mx-5 mt-5 text-center">Seja bem vindo <?php echo $_SESSION['username']?>!</h1>
                <div class="cards-align d-flex justify-content-center align-items-center">
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Tarefas</h5>
                                <p class="card-text">Organize suas tarefas cotidianas da forma mais simples.</p>
                                <a href="tarefa.php" class="btn btn-primary">Vá para as Tarefas</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Projetos</h5>
                                <p class="card-text">Associe tarefas aos seus projetos e ponha sua criatividade em jogo.</p>
                                <a href="projeto.php" class="btn btn-primary">Vá para os Projetos</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'templates/footer.php';
    ?>
