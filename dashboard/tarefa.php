<?php
    require '../database/db_config.php';

    $sql = 'select t.idtarefa, t.nome, t.data_inicio, t.data_entrega, t.status, t.prioridade, p.idprojetos, p.nomeprojeto as projetos
    from tarefas as t
    join projetos as p on t.projetos_idprojetos = p.idprojetos
    group by p.idprojetos;';
    $result = $conn->prepare($sql);
    $result -> execute();
    $tarefas = $result-> fetchAll(PDO::FETCH_ASSOC);
    
    require '../templates/header.php';
    require '../templates/navbar.php';
?>

<?php
if(isset($_GET['delete'])){
    $nomeTarefa = $_GET['tarefa'];
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $nomeTarefa?> deletado(a) com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

if(isset($_GET['insert'])){
    $nomeTarefa = $_GET['nome'];
?> 
<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $nomeTarefa?> cadastrado(a) com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
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
                                echo "<td>" . $tarefa['projetos'] . "</td>";
                                echo "<td>
                                <form action='../crud/d_tarefa.php' method='POST'>
                                <input type='hidden' name='id' value='" . $tarefa['idtarefa'] . "'/>
                                <input type='hidden' name='nome' value='" . $tarefa['nome'] . "'/>
                                <button type='submit' class='btn btn-danger'>Apagar</button></td>";
                                
                                echo "<td><button type='button' class='btn btn-warning'>Editar</button>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                    <form action="../crud/d_tarefa.php" method="POST">
                        <input type="hidden" value=>
                    </form>
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