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
                                <input name="projeto" class="form-control" placeholder="Projeto" value="<?php echo $projeto; ?>" required/>
                                <label class="form-label" for="projeto">Nome do Projeto</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="inicio" type="date" class="form-control" placeholder="Início" value="<?php echo $inicio?>" required/>
                                <label class="form-label" for="inicio">Data de Início</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select" name="status">
                                    <option selected disabled><?php echo $status?></option>
                                    <option value="1">A fazer</option>
                                    <option value="2">Em andamento</option>
                                    <option value="3">Concluído</option>
                                </select>
                                <label class="form-label" for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" value="<?php echo $entrega?>" required/>
                                <label class="form-label" for="entrega">Data de Entrega</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select" name="andamento" required>
                                    <option selected disabled><?php echo $andamento?></option>
                                    <option value="1">Ativo</option>
                                    <option value="2">Inativo</option>
                                </select>
                                <label class="form-label" for="andamento">Andamento</label>
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