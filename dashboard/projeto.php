<?php
    require '../database/db_config.php';

    $sql = "SELECT * FROM projetos";
    $result = $conn->prepare($sql);
    $result -> execute();
    $projetos = $result-> fetchAll(PDO::FETCH_ASSOC);

    require '../templates/header.php';
    require '../templates/navbar.php';    
?>
                <div class="container">
                    <?php
                        if(count($projetos) > 0){
                    ?>
                <div class="d-flex justify-content-between">
                    <h1>Projetos</h1>
                    <button class="btn btn-success h-50 mt-3"><a href="../crud/cadastrar_projeto.php" class="text-decoration-none text-light">Cadastrar</a></button>
                </div>
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
                
<?php
    require '../templates/footer.php';
?>
