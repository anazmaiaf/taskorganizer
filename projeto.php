<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login/loginform.php');
    }
    require 'database/db_config.php';

    $sql = "SELECT * FROM projetos";
    $result = $conn->prepare($sql);
    $result -> execute();
    $projetos = $result-> fetchAll(PDO::FETCH_ASSOC);
    require 'templates/header.php';
    require 'templates/navbar.php';

                    if(count($projetos) > 0){      
                ?>
                <div class="container">
                <h1>Projetos</h1>
                <div class="table-tarefas">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de início</th>
                        <th scope="col">Data de entrega</th>
                        <th scope="col">Status</th>
                        <th scope="col">Andamento</th>
                        <th scope="col">Ações</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($projetos as $projeto){
                                echo "<tr>";
                                echo "<th scope='row'>" . $projeto['idprojetos'] . "</th>";
                                echo "<td>" . $projeto['nome'] . "</td>";
                                echo "<td>" . $projeto['data_inicio'] . "</td>";
                                echo "<td>" . $projeto['data_entrega'] . "</td>";
                                echo "<td>" . $projeto['status'] . "</td>";
                                echo "<td>" . $projeto['andamento'] . "</td>";
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
                <h1>Projeto</h1>
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
                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
