<?php
    require '../templates/header.php';
    require '../templates/navbar.php';
?>
<h1 class="text-center">Cadastrar tarefa</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="../crud/c_tarefa.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="nome" class="form-control" placeholder="Tarefa" required/>
                                <label class="form-label" for="nome">Nome da Tarefa</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <select name="projeto" class="form-select">
                                    <?php 
                                        $sql = "SELECT * FROM projetos";
                                        $result = $conn -> query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_object()) {
                                                echo "<option value='" . $row->idprojetos . "'>" . $row->nomeprojeto . "</option>";
                                            }
                                        }        
                                    ?>
                                </select>
                                <label class="form-label" for="projeto">Projeto Relacionado</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="inicio" class="form-control" type="date" placeholder="Início" required/>
                                <label class="form-label" for="inicio">Data de Início</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select name="status" class="form-select">
                                    <option value="A fazer">A fazer</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Concluído">Concluído</option>
                                </select>
                                <label class="form-label" for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="entrega" class="form-control" type="date" placeholder="Entrega" required/>
                                <label class="form-label" for="entrega">Data de Entrega</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select name="prioridade" class="form-select">
                                    <option value="Alta">Alta</option>
                                    <option value="Média">Média</option>
                                    <option value="Baixa">Baixa</option>
                                </select>
                                <label class="form-label" for="prioridade">Prioridade</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-success me-2">
                        <a href="../dashboard/tarefa.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php';
?>