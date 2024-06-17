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

// Alert de deletado
if(isset($_GET['tarefa'])){
?>
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>A tarefa foi deletada com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
}

// Alert de cadastrado
if(isset($_GET['insert'])){
?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>A tarefa foi cadastrada com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
}

// Alert de atualizado
if(isset($_GET['update'])){
?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>A tarefa foi atualizada com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
                        $idtarefa = $tarefa['idtarefa'];
                        $nometarefa = $tarefa['nome'];
                        echo "<tr>";
                        echo "<th scope='row'>" . $tarefa['idtarefa'] . "</th>";
                        echo "<td>" . $tarefa['nome'] . "</td>";
                        echo "<td>" . $tarefa['data_inicio'] . "</td>";
                        echo "<td>" . $tarefa['data_entrega'] . "</td>";
                        echo "<td>" . $tarefa['status'] . "</td>";
                        echo "<td>" . $tarefa['prioridade'] . "</td>";
                        echo "<td>" . $tarefa['projetos'] . "</td>";
                        echo "<td>
                        <div class='d-flex'>
                            <button type='button' class='btn btn-danger mx-2' data-bs-toggle='modal' data-bs-target='#modalDeletar" . $idtarefa . "'>Excluir</button>
                            <form action='../crud/u_tarefaform.php' method='get'>
                                <input type='hidden' name='id' value='" . $idtarefa . "'>
                                <input type='hidden' name='nome' value='" . $nometarefa . "'>
                                <input type='hidden' name='status' value='" . $tarefa['status'] . "'>
                                <input type='hidden' name='inicio' value='" . $tarefa['data_inicio'] . "'>
                                <input type='hidden' name='entrega' value='" . $tarefa['data_entrega'] . "'>
                                <input type='hidden' name='prioridade' value='" . $tarefa['prioridade'] . "'>
                                <input type='hidden' name='projetos' value='" . $tarefa['projetos'] . "'>
                            </form>
                            <a href='../crud/u_tarefaform.php?id=$idtarefa?proj=". $tarefa['projetos'] ."&idproj=".$tarefa['idprojetos']."' class='btn btn-warning'>Editar</a>
                        </div> 
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
foreach($tarefas as $tarefa){
?>
<div class="modal fade" id="modalDeletar<?php echo $tarefa['idtarefa']; ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir a tarefa<?php echo $tarefa['nome']?>? </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Está ação é irreversível.</span>
                    <form method='post' action='../crud/d_tarefa.php'>
                        <input type='hidden' name='id' value="<?php echo $tarefa['idtarefa']; ?>" />
                        <input type='hidden' name='nome' value="<?php echo $tarefa['nome']; ?>" /> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
require '../templates/footer.php';