<?php
    require("database/db_config.php");
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login/loginform.php');
    }

    $sql = "SELECT * FROM tarefas";
    $result = $conn->prepare($sql);
    $result -> execute();
    $tarefas = $result-> fetchAll(PDO::FETCH_ASSOC);

    require 'templates/header.php';
    require 'templates/navbar.php';
?>

   <div class="container">
                <?php
                    if(count($tarefas) > 0){      
                ?>
                <h1>Tarefas</h1>
                <div class="table-tarefas table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de início</th>
                        <th scope="col">Data de entrega</th>
                        <th scope="col">Status</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Projeto relacionado</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($tarefas as $tarefa){
                                echo "<tr>";
                                echo "<th scope='row'>" . $tarefa['idtarefa'] . "</th>";
                                echo "<td>" . $tarefa['nome'] . "</td>";
                                echo "<td>" . $tarefa['data_inicio'] . "</td>";
                                echo "<td>" . $tarefa['data_entrega'] . "</td>";
                                echo "<td>" . $tarefa['status'] . "</td>";
                                echo "<td>" . $tarefa['prioridade'] . "</td>";
                                echo "<td>" . $tarefa['projetos_idprojetos'] . "</td>";
                                echo "<td><button type='button' class='btn btn-warning'>Editar</button>
                                      <button type='button' class='btn btn-danger'>Apagar</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                ?>
                <h1>Tarefas</h1>
                <div class="table-tarefas">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de início</th>
                        <th scope="col">Data de entrega</th>
                        <th scope="col">Status</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Projeto relacionado</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <?php
                        echo "<h2>Não há tarefas cadastradas.</h2>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'templates/footer.php';
