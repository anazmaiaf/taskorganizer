<?php
require '../database/db_config.php';

$sql = 'SELECT t.idtarefa, t.nome, t.data_inicio, t.data_entrega, t.status, t.prioridade, p.idprojetos, p.nomeprojeto AS projetos
        FROM tarefas AS t
        INNER JOIN projetos AS p ON t.projetos_idprojetos = p.idprojetos;';
$result = $conn->prepare($sql);
$result->execute();
$tarefas = $result->fetchAll(PDO::FETCH_ASSOC);

require '../templates/header.php';
require '../templates/navbar.php';

if(isset($_GET['delete'])){
    $tarefa = $_GET['tarefa'];
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo $tarefa?> deletado(a) com sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}

if(isset($_GET['insert'])){
    $tarefa = $_GET['nome'];
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo $tarefa?> cadastrado(a) com sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Tarefas</h1>
        <button class="btn btn-success h-50 mt-3">
            <a href="../crud/c_tarefaform.php" class="text-decoration-none text-light">Cadastrar</a>
        </button>
    </div>
    <?php
    if (count($tarefas) > 0) {
    ?>
        <div class="d-flex justify-content-between"></div>
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
                    foreach ($tarefas as $tarefa) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $tarefa['idtarefa'] . "</th>";
                        echo "<td>" . $tarefa['nome'] . "</td>";
                        echo "<td>" . $tarefa['data_inicio'] . "</td>";
                        echo "<td>" . $tarefa['data_entrega'] . "</td>";
                        echo "<td>" . $tarefa['status'] . "</td>";
                        echo "<td>" . $tarefa['prioridade'] . "</td>";
                        echo "<td>" . $tarefa['projetos'] . "</td>";
                        echo "<td>                       
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Apagar</button>
                        
                        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='staticBackdropLabel'>Você tem certeza?</h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                Você deseja apagar essa tarefa permanentemente? 
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Não</button>
                                <form action='../crud/d_projeto.php' method='POST' class='mx-2'>
                                    <input type='hidden' name='id' value='" . $tarefa['idtarefa'] . "'>
                                    <input type='hidden' name='nome' value='". $tarefa['nome'] ."'>
                                    <button type='submit' class='btn btn-danger'>Apagar</button>
                                </form> 
                                <button type='button' class='btn btn-danger'>Apagar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                                <form action='../crud/u_tarefaform.php' method='POST' style='display: inline;'>
                                    <input type='hidden' name='id' value='" . $tarefa['idtarefa'] . "'/>
                                    <input type='hidden' name='nome' value='" . $tarefa['nome'] . "'/>
                                    <button type='submit' class='btn btn-warning'>Editar</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo "<h2>Não há tarefas cadastradas.</h2>";
    }
    ?>
</div>

<?php
require '../templates/footer.php';
?>
