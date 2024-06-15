<?php
    require '../templates/header.php';
    require '../templates/navbar.php';


    if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['prioridade'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $inicio = $_POST['inicio'];
        $entrega = $_POST['entrega'];
        $status = $_POST['status'];
        $prioridade = $_POST['prioridade'];
        $projeto = $_POST['projeto'];
    };
?>

<h1 class="text-center">Atualizar tarefa</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="../crud/u_tarefa.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="nome">Nome da Tarefa</label>
                                <input type="hidden" name="id" value="<?php echo $id?>">
                                <input name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Tarefa" required/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="projeto">Projeto Relacionado</label>
                                <select name="projeto" class="form-select">
                                    <option value="<?php echo $projeto; ?>" selected disabled><?php echo $projeto; ?></option>
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
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" class="form-control" type="date" placeholder="Início" required value='<?php echo $inicio;?>'/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option value='<?php echo $status; ?>' selected disabled><?php echo $status; ?></option>
                                    <option value="A fazer">A fazer</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Concluído">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="entrega">Data de Entrega</label>
                                <input name="entrega" class="form-control" type="date" placeholder="Entrega" required value='<?php echo $entrega;?>'/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="prioridade">Prioridade</label>
                                <select name="prioridade" class="form-select">
                                    <option value='<?php echo $prioridade; ?>' selected disabled><?php echo $prioridade; ?></option>
                                    <option value="Alta">Alta</option>
                                    <option value="Média">Média</option>
                                    <option value="Baixa">Baixa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="../dashboard/tarefa.php" class="btn btn-danger mx-1">Cancelar</a>
                        <input type="submit" value="Atualizar" class="btn btn-success me-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php';
?>