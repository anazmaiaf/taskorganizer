<!DOCTYPE html>
<html lang="pt-br" class="h-100" data-bs-theme="dark" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Organizer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn-custom{
            background: linear-gradient(to right, #008F8C, #015958, #023535);
            border:none;
            border-radius:5px;
            padding: 7px;
        }
    </style>
</head>

<body class="h-100 bg-body-tetiary">
<?php
    session_start();
    require 'database/db_config.php';
    if(!isset($_SESSION['id'])){
        header('Location: login/loginform.php');
    };
?>

<header class="p-3 mb-3 border-bottom">
            <div class="d-flex">
                    
                <ul class="nav me-lg-auto mb-2 justify-content-center mb-md-0">
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <i class="fa-solid fa-bars"></i>
                    </button>
                    <li><a href="dashboard/index.php" class="nav-link px-2 link-secondary">Início</a></li>
                    <li><a href="dashboard/projeto.php" class="nav-link px-2 link-secondary">Projetos</a></li>
                    <li><a href="dashboard/tarefa.php" class="nav-link px-2 link-secondary">Tarefas</a></li>
                    <li><a href="dashboard/relatorio.php" class="nav-link px-2 link-secondary">Relatório</a></li>
                </ul>

                <div class="dropdown">
                    
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-white mt-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']?></span>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="login/logout.php">Sair da conta</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title" id="staticBackdropLabel">Task Organizer</h3>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
        <div class="mt-3">
            <a href="dashboard/index.php" class="text-decoration-none text-light fs-5">Início</a>
        </div>
        <div class="mt-3">
            <a href="dashboard/projeto.php" class="text-decoration-none text-light fs-5">Projetos</a>
        </div>
        <div class="mt-3">
            <a href="dashboard/tarefa.php" class="text-decoration-none text-light fs-5">Tarefas</a>
        </div>
        <div class="mt-3">
            <a href="dashboard/relatorio.php" class="text-decoration-none text-light fs-5">Relatório</a>
        </div>
    </div>
  </div>
</div>
    <div class="col py-3">
        <h1 class="mx-5 mt-5 text-center">Seja bem vindo(a) <?php echo $_SESSION['username']?>!</h1>
        <div class="cards-align d-flex justify-content-center align-items-center">
            <div class="row mt-5">
                <div class="col-sm-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tarefas</h5>
                        <p class="card-text">Organize suas tarefas cotidianas da forma mais simples.</p>
                        <button class="btn-custom my-3" type="submit" name="submit"><a href="dashboard/tarefa.php" class="text-decoration-none text-white">Vá para as Tarefas</a></button>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Projetos</h5>
                        <p class="card-text">Associe tarefas aos seus projetos e ponha sua criatividade em jogo.</p>
                        <button class="btn-custom" type="submit" name="submit"><a href="dashboard/projeto.php" class="text-decoration-none text-white">Vá para os Projetos</a></button>
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