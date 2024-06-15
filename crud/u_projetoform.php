<?php
require '../templates/header.php';
require '../templates/navbar.php';

if(isset($_POST['id']) && isset($_POST['projeto']) && isset($_POST['inicio']) && isset($_POST['entrega']) && isset($_POST['status']) && isset($_POST['andamento'])){
    $id = $_POST['id'];
    $projeto = $_POST['projeto'];
    $inicio = $_POST['inicio'];
    $entrega = $_POST['entrega'];
    $status = $_POST['status'];
    $andamento = $_POST['andamento'];
};
?>
<h1 class="text-center">Atualizar projeto</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="u_projeto.php" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="projeto">Nome do Projeto</label>
                                <input type="hidden" name="id" value="<?php echo $id?>">
                                <input name="projeto" class="form-control" placeholder="Projeto" value="<?php echo $projeto; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" type="date" class="form-control" placeholder="Início" value="<?php echo $inicio?>" required/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" name="status">
                                    <option selected disabled><?php echo $status?></option>
                                    <option value="A fazer">A fazer</option>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Concluído">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="entrega">Data de Entrega</label>
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" value="<?php echo $entrega?>" required/>
                            </div>
                            <div class="form-outline mt-4">
                                <label class="form-label" for="andamento">Andamento</label>
                                <select class="form-select" name="andamento" required>
                                    <option selected disabled><?php echo $andamento?></option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="../dashboard/projeto.php" class="btn btn-danger">Cancelar</a>
                        <input type="submit" value="Atualizar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require '../templates/footer.php';