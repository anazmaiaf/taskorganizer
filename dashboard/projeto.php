<?php
require '../database/db_config.php';

$sql = "SELECT * FROM projetos";
$result = $conn->prepare($sql);
$result->execute();
$projetos = $result->fetchAll(PDO::FETCH_ASSOC);

require '../templates/header.php';
require '../templates/navbar.php';   

if(isset($_GET['delete'])){
    $projeto = $_GET['projeto'];
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo $projeto?> deletado(a) com sucesso!</strong>
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
                            <form action='../crud/d_projeto.php' method='POST'>
                                <input type='hidden' name='id' value='" . $projeto['idprojetos'] . "'>
                                <input type='hidden' name='nome' value='". $projeto['nomeprojeto'] ."'>
                                <button type='submit' class='btn btn-danger'>Apagar</button>
                            </form> 
                        </td>";
                    echo "<td>
                            <button type='button' class='btn btn-warning'>Editar</button>
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
require '../templates/footer.php';
?>