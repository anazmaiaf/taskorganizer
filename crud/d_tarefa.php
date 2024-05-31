<?php
require '../database/db_config.php';

if (isset($_POST['id']) && isset($_POST['nome'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "DELETE FROM tarefas WHERE idtarefa = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $id);
    $result->execute();

    header("Location: ../dashboard/tarefa.php?tarefa=$nome&delete=deletado");
}

/*
PARA POR NO TD EM UM FOREACH 
"<td>
                                    <form action='../crud/d_tarefa.php' method='POST'>
                                        <input type='hidden' name='id' value='" . $tarefa['idtarefa'] . "'>
                                        <input type='hidden' name='nome' value='". $tarefa['nome'] ."'>
                                        <button type='submit' class='btn btn-danger'>Apagar</button>
                                    </form> 
                                </td>";

PARA POR O ALERT 

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
?>
*/