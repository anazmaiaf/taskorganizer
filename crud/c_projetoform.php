<?php
    require '../templates/header.php';
    require '../templates/navbar.php';
?>
<h1 class="text-center">Cadastrar projeto</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="c_projeto.php" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <input name="projeto" class="form-control" placeholder="Projeto" required/>
                                <label class="form-label" for="projeto">Nome do Projeto</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="inicio" type="date" class="form-control" placeholder="Início" required/>
                                <label class="form-label" for="inicio">Data de Início</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select" name="status">
                                    <option selected>Escolha o Status</option>
                                    <option value="1">A fazer</option>
                                    <option value="2">Em andamento</option>
                                    <option value="3">Concluído</option>
                                </select>
                                <label class="form-label" for="">Status</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" required/>
                                <label class="form-label" for="entrega">Data de Entrega</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select" name="andamento">
                                    <option selected>Escolha o andamento</option>
                                    <option value="1">Ativo</option>
                                    <option value="2">Inativo</option>
                                </select>
                                <label class="form-label" for="prioridade">Andamento</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <form action="../dashboard/projeto.php">
                        <input type="submit" value="Cancelar" class="btn btn-danger">
                        <input type="submit" value="Cadastrar" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php'
?>