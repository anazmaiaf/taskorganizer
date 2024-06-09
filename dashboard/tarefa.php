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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>A tarefa foi deletada com sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}

// Alert de cadastrado
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
                            <button type='button' class='btn btn-danger mx-2' data-idtarefa='" . $idtarefa . "' data-nometarefa='" . $nometarefa . "' data-bs-toggle='modal' data-bs-target='#modaldeletar'>
                                Apagar
                            </button>
                            <form action='../crud/u_tarefaform.php' method='POST'>
                                <input type='hidden' name='id' value='" . $idtarefa . "'>
                                <input type='hidden' name='nome' value='". $nometarefa ."'>
                                <button type='submit' class='btn btn-warning'>Editar</button>
                            </form>
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

<!-- Modal deletar -->
<div class="modal fade" id="modaldeletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja apagar essa tarefa?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Essa ação é irreversível! Deseja continuar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <form action='../crud/d_tarefa.php' method='post'>
            <input type='hidden' id="modal-idtarefa" name='idtarefa' value='<?php $tarefa['idtarefa'] ?>'>
            <input type='hidden' id="modal-nometarefa" name='nometarefa' value='<?php $tarefa['nome'] ?>'>
            <button type='submit' class='btn btn-danger'>Apagar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('modaldeletar');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var idtarefa = button.getAttribute('data-idtarefa');
        var nometarefa = button.getAttribute('data-nometarefa');

        var modalIdInput = document.getElementById('modal-idtarefa');
        var modalNomeInput = document.getElementById('modal-nometarefa');

        modalIdInput.value = idtarefa;
        modalNomeInput.value = nometarefa;
    });
});
</script>

<?php
require '../templates/footer.php';