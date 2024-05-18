<?php
    require '../templates/header.php';
    require '../templates/navbar.php';
?>
<h1 class="text-center">Cadastrar tarefa</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="tarefa" class="form-control" placeholder="Tarefa" required/>
                                <label class="form-label" for="tarefa">Nome da Tarefa</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="id" class="form-control" placeholder="ID" required/>
                                        <label class="form-label" for="id">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Projeto</option>
                                            <option value="1">1- Fazer CRUD</option>
                                        </select>
                                        <label class="form-label" for="projeto">Projeto Relacionado</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="inicio" class="form-control" placeholder="Início" required/>
                                <label class="form-label" for="inicio">Data de Início</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select">
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
                                <input name="entrega" class="form-control" placeholder="Entrega" required/>
                                <label class="form-label" for="entrega">Data de Entrega</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select">
                                    <option selected>Escolha a prioridade</option>
                                    <option value="1">Alta</option>
                                    <option value="2">Média</option>
                                    <option value="3">Baixa</option>
                                </select>
                                <label class="form-label" for="prioridade">Prioridade</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <form action="../tarefa.php">
                        <button class="btn btn-danger"><a href="../dashboard/projeto.php" class="text-decoration-none text-white">Cancelar</a></button>
                        <button class="btn btn-success"><a href="../dashboard/projeto.php" class="text-decoration-none text-white">Cadastrar</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php'
?>