<?php
require '../templates/header.php';
require '../templates/navbar.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM projetos WHERE idprojetos = :id';
    $result = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $result->execute();
    $projetos = $result->fetchAll(PDO::FETCH_ASSOC);
}
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
                                <input name="projeto" class="form-control" placeholder="Projeto" value="<?php echo $projetos['nomeprojeto']; ?>" required/>
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
                                    <option selected disabled>Escolha o Status</option>
                                    <option value="1">A fazer</option>
                                    <option value="2">Em andamento</option>
                                    <option value="3">Concluído</option>
                                </select>
                                <label class="form-label" for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" required/>
                                <label class="form-label" for="entrega">Data de Entrega</label>
                            </div>
                            <div class="form-outline mt-4">
                                <select class="form-select" name="andamento" required>
                                    <option selected disabled>Escolha o andamento</option>
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