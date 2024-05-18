<?php
require '../templates/header.php';
require '../templates/navbar.php';
?>
<style>
    .btn-custom{
        background: linear-gradient(to right, #008F8C, #015958, #023535);
        border:none;
        border-radius:5px;
        padding: 7px;
    }
</style>
    <div class="col py-3">
        <h1 class="mx-5 mt-5 text-center">Seja bem vindo <?php echo $_SESSION['username']?>!</h1>
        <div class="cards-align d-flex justify-content-center align-items-center">
            <div class="row mt-5">
                <div class="col-sm-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tarefas</h5>
                        <p class="card-text">Organize suas tarefas cotidianas da forma mais simples.</p>
                        <button class="btn-custom my-3" type="submit" name="submit"><a href="tarefa.php" class="text-decoration-none text-white">Vá para as Tarefas</a></button>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Projetos</h5>
                        <p class="card-text">Associe tarefas aos seus projetos e ponha sua criatividade em jogo.</p>
                        <button class="btn-custom" type="submit" name="submit"><a href="tarefa.php" class="text-decoration-none text-white">Vá para os Projetos</a></button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
require '../templates/footer.php';
?>