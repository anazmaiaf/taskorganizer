<?php
require '../database/db_config.php';

$sql = "SELECT * FROM projetos";
$result = $conn->prepare($sql);
$result->execute();
$projetos = $result->fetchAll(PDO::FETCH_ASSOC);

require '../templates/header.php';
require '../templates/navbar.php';   

// Alert projeto deletado
if(isset($_GET['delete'])){
?>
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>O projeto foi deletado com sucesso!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
}
?>

<!-- Alert projeto cadastrado -->
<?php
if(isset($_GET['insert'])){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>O projeto foi cadastrado com sucesso!</strong>
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
                            <button type='button' class='btn btn-danger mx-2' data-bs-toggle='modal' data-bs-target='#modalDeletar" . $projeto['idprojetos'] . "'>Excluir</button>
                            <a class='btn btn-warning' href='../crud/u_projetoform.php?id='" . $projeto['idprojetos'] . "'>Editar</a>
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
<?php
foreach($projetos as $projeto){
?>
<div class="modal fade" id="modalDeletar<?php echo $projeto['idprojetos']; ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir o projeto <?php echo $projeto['nomeprojeto']?>? </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Está ação é irreversível e irá apagar as tarefas relacionadas.</span>
                    <form method='post' action='../crud/d_projeto.php'>
                        <input type='hidden' name='id' value="<?php echo $projeto['idprojetos']; ?>" />
                        <input type='hidden' name='nome' value="<?php echo $projeto['nomeprojeto']; ?>" /> 
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