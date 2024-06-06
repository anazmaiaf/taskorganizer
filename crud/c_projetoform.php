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
                                <label class="form-label" for="projeto">Nome do Projeto</label>
                                <input name="projeto" class="form-control" placeholder="Projeto" required/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" type="date" class="form-control" placeholder="Início" required/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" name="status">
                                    <option selected>Escolha o Status</option>
                                    <option value="A fazer">A fazer</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="concluído">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="entrega">Data de Entrega</label>
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" required/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="andamento">Andamento</label>
                                <select class="form-select" name="andamento">
                                    <option selected>Escolha o andamento</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                    <input type="submit" value="Cancelar" class="btn btn-danger">
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php'
?>