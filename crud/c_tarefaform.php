<?php
    require '../templates/header.php';
    require '../templates/navbar.php';

// Alert de campos inválidos
if(isset($_GET['invalid'])){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Campos inválidos. Preencha todos corretamente.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<h1 class="text-center">Cadastrar tarefa</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="../crud/c_tarefa.php" method="POST">
                    <div class="row">
                        <!-- Nome da tarefa -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="nome">Nome da Tarefa</label>
                                <input name="nome" class="form-control" placeholder="Tarefa"/>
                            </div>
                        </div>

                        <!-- Projeto relacionado -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="projeto">Projeto Relacionado</label>
                                <select name="projeto" class="form-select">
                                    <option value="1" disabled>Escolha o projeto</option>
                                    <?php 
                                    $sql = "SELECT idprojetos,nomeprojeto FROM projetos";
                                    $result = $conn->prepare($sql);
                                    $result->execute();
                                    $tarefas = $result->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($tarefas as $tarefa) {
                                        echo "<option value='" . $tarefa['idprojetos'] . "'>" . $tarefa['nomeprojeto'] . "</option>";
                                    }                  
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Data de início e Status -->
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" class="form-control" type="date" placeholder="Início"/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option value="Escolha o status">Escolha o status</option>
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
                                <input name="entrega" class="form-control" type="date" placeholder="Entrega"/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="prioridade">Prioridade</label>
                                <select name="prioridade" class="form-select">
                                    <option value="1">Escolha a prioridade</option>
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