<?php
require '../templates/header.php';
require '../templates/navbar.php';

if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = 'SELECT * FROM tarefas WHERE idtarefa = :id';
$result = $conn->prepare($sql);
$result->bindParam(':id', $id);
$result->execute();
$tarefas = $result->fetch(PDO::FETCH_ASSOC);
}

// Alert de campos inválidos
if(isset($_GET['invalid'])){
?>
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Campos inválidos. Preencha todos corretamente.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
}
?>

<h1 class="text-center">Atualizar tarefa</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="../crud/u_tarefa.php" method="POST">
                    <div class="row">
                        <!-- Nome da tarefa -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="nome">Nome da Tarefa</label>
                                <input name=id type="hidden" value="<?php echo $tarefas['idtarefa']?>">
                                <input name="nome" class="form-control" placeholder="Tarefa" value="<?php echo $tarefas['nome']?>"/>
                            </div>
                        </div>

                        <!-- Projeto relacionado -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="projeto">Projeto Relacionado</label>
                                <select name="projeto" class="form-select">
                                    <?php 
                                    $sql_proj = "SELECT idprojetos,nomeprojeto FROM projetos";
                                    $result_proj = $conn->prepare($sql_proj);
                                    $result_proj->execute();
                                    $projetos = $result_proj->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($projetos as $proj) {
                                        if ($proj["idprojetos"] == $tarefa["idtarefa"]) {
                                            echo "<option value='" . $proj["idprojetos"] . "' selected>" . $proj["nomeprojeto"] . "</option>";
                                          } else {
                                            echo "<option value='" . $proj["idprojetos"] . "'>" . $proj["nomeprojeto"] . "</option>";
                                          }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Data de início e Status -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" class="form-control" type="date" placeholder="Início" value="<?php echo $tarefas['data_inicio']?>"/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option selected disabled <?php echo $tarefas['status']?>><?php echo $tarefas['status']?></option>
                                    <option value="A fazer">A fazer</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Concluído">Concluído</option>
                                </select>
                            </div>
                        </div>

                        <!-- Data de entrega e Prioridade -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="entrega">Data de Entrega</label>
                                <input name="entrega" class="form-control" type="date" placeholder="Entrega" value="<?php echo $tarefas['data_entrega']?>"/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="prioridade">Prioridade</label>
                                <select name="prioridade" class="form-select">
                                    <option selected disabled value="<?php echo $tarefas['prioridade']?>"><?php echo $tarefas['prioridade']?></option>
                                    <option value="Alta">Alta</option>
                                    <option value="Média">Média</option>
                                    <option value="Baixa">Baixa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="../dashboard/tarefa.php" class="btn btn-danger mx-1">Cancelar</a>
                        <input type="submit" value="Cadastrar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php';
?>