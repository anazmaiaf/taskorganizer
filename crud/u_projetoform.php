<?php
require '../templates/header.php';
require '../templates/navbar.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'SELECT * FROM projetos WHERE idprojetos = :id';
    $result = $conn->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $projeto = $result->fetch(PDO::FETCH_ASSOC);
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

<h1 class="text-center">Atualizar projeto</h1>
<section>
    <div class="container">
        <div class="card col-lg-8 mx-auto">
            <div class="card-body p-md-5">
                <form action="u_projeto.php" method="POST">
                    <div class="row">
                        <!-- Nome do projeto -->
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="projeto">Nome do Projeto</label>
                                <input name="id" type="hidden" value="<?php echo $id ?>" class="form-control"/>
                                <input name="projeto" class="form-control" placeholder="Projeto" value="<?php echo $projeto['nomeprojeto'] ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <!-- Data de início -->
                            <div class="form-outline">
                                <label class="form-label" for="inicio">Data de Início</label>
                                <input name="inicio" type="date" class="form-control" placeholder="Início" value="<?php echo $projeto['data_inicio'] ?>"/>
                            </div>
                            <!-- Status -->
                            <div class="form-outline mt-4">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" name="status">
                                    <option value="A fazer" <?php if($projeto['status'] === 'A fazer') echo 'selected'; ?>>A fazer</option>
                                    <option value="Em andamento" <?php if($projeto['status'] === 'Em andamento') echo 'selected'; ?>>Em andamento</option>
                                    <option value="Concluído" <?php if($projeto['status'] === 'Concluído') echo 'selected'; ?>>Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <!-- Data de entrega -->
                            <div class="form-outline">
                                <label class="form-label" for="entrega">Data de Entrega</label>
                                <input name="entrega" type="date" class="form-control" placeholder="Entrega" value="<?php echo $projeto['data_entrega'] ?>"/>
                            </div>
                            <!-- Andamento -->
                            <div class="form-outline mt-4">
                                <label class="form-label" for="andamento">Andamento</label>
                                <select class="form-select" name="andamento">
                                    <option value="Ativo" <?php if($projeto['andamento'] === 'Ativo') echo 'selected'; ?>>Ativo</option>
                                    <option value="Inativo" <?php if($projeto['andamento'] === 'Inativo') echo 'selected'; ?>>Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="../dashboard/projeto.php" class="btn btn-danger mx-1">Cancelar</a>
                        <input type="submit" value="Atualizar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require '../templates/footer.php';
?>
