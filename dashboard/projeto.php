<?php
require '../database/db_config.php';

$sql = "SELECT * FROM projetos";
$result = $conn->prepare($sql);
$result->execute();
$projetos = $result->fetchAll(PDO::FETCH_ASSOC);

require '../templates/header.php';
require '../templates/navbar.php';   

// Alert projeto deletado
if(isset($_GET['projeto'])){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>O projeto foi deletado com sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<!-- Alert projeto cadastrado -->
<?php
if(isset($_GET['insert'])){
    $projeto = $_GET['projeto'];
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo $projeto?> cadastrado(a) com sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Projetos</h1>
        <button class="btn btn-success h-50 mt-3">
            <a href="../crud/c_projetoform.php" class="text-decoration-none text-light">Cadastrar</a>
        </button>
    </div>
    <?php
    if (count($projetos) > 0) {
    ?>
    <div class="d-flex justify-content-between"></div>
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
                foreach ($projetos as $projeto) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $projeto['idprojetos'] . "</th>";
                    echo "<td>" . $projeto['nomeprojeto'] . "</td>";
                    echo "<td>" . $projeto['data_inicio'] . "</td>";
                    echo "<td>" . $projeto['data_entrega'] . "</td>";
                    echo "<td>" . $projeto['status'] . "</td>";
                    echo "<td>" . $projeto['andamento'] . "</td>";
                    echo "<td>
                        <div class='d-flex'>
                            <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modaldeletar'>
                                Apagar
                            </button> 
                            <form action='../crud/u_projetoform.php' method='POST'>
                                <input type='hidden' name='id' value='" . $projeto['idprojetos'] . "'>
                                <input type='hidden' name='nome' value='". $projeto['nomeprojeto'] ."'>
                                <button type='submit' class='btn btn-warning'>Editar</button>
                            </form>
                        </div> 
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<h2>Não há projetos cadastrados.</h2>";
    }
    ?>
    </div>
</div>

<div class="modal fade" id="modaldeletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja apagar esse projeto?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Essa ação é irreversível! Deseja continuar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <form action="../crud/d_projeto.php" method="post">
            <input type="hidden" id="modal-idprojeto" name="idprojeto">
            <input type="hidden" id="modal-nomeprojeto" name="nomeprojeto">
            <button type="submit" class="btn btn-danger">Apagar</button>
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
        var idprojeto = button.getAttribute('data-idprojeto');
        var nomeprojeto = button.getAttribute('data-nomeprojeto');

        var modalIdInput = document.getElementById('modal-idprojeto');
        var modalNomeInput = document.getElementById('modal-nomeprojeto');

        modalIdInput.value = idprojeto;
        modalNomeInput.value = nomeprojeto;
    });
});
</script>

<?php
require '../templates/footer.php';