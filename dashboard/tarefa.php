<?php
    require '../database/db_config.php';

    $sql = "SELECT 
	        tarefas.idtarefa, 
            tarefas.data_inicio,
            tarefas.data_entrega,
            tarefas.status,
            tarefas.prioridade,
            tarefas.nome,
            projetos.idprojetos,
            projetos.nomeprojeto
        FROM tarefas
        INNER JOIN projetos
	        ON tarefas.projetos_idprojetos = projetos.idprojetos;";
    $result = $conn->prepare($sql);
    $result -> execute();
    $tarefas = $result-> fetchAll(PDO::FETCH_ASSOC);
    
    require '../templates/header.php';
    require '../templates/navbar.php';
?>

   <div class="container">
    <div class="d-flex justify-content-between">
        <h1>Tarefas</h1>
        <button class="btn btn-success h-50 mt-3"><a href="../crud/c_tarefaform.php" class="text-decoration-none text-light">Cadastrar</a></button>
    </div>
                <?php
                    if(count($tarefas) > 0){      
                ?>
                <div class="d-flex justify-content-between">
                </div>
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
                                echo "<td>" . $tarefa['projetos.idprojetos'] . "</td>";
                                echo "<td><button type='button' class='btn btn-warning'>Editar</button>
                                      <button type='button' class='btn btn-danger'>Apagar</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                        echo "<h2>Não há tarefas cadastradas.</h2>";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../templates/footer.php';