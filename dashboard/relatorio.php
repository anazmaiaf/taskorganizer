<?php
require '../templates/header.php';
require '../templates/navbar.php';

$sql = "SELECT p.idprojetos, p.nomeprojeto, COUNT(p.idprojetos) AS contIDcat
        FROM tarefas AS t
        JOIN projetos AS p ON t.projetos_idprojetos = p.idprojetos
        GROUP BY p.idprojetos
        ORDER BY contIDcat DESC
        LIMIT 1;";
$result = $conn->prepare($sql);
$result->execute();
$projeto = $result->fetchAll(PDO::FETCH_ASSOC);
var_dump($projeto);
?>
<div class="card">
  <div class="card-header">
    Relatório
  </div>
  <div class="card-body">
    <h5 class="card-title">Não perca o prazo!</h5>
    <p class="card-text">O seu projeto <?php echo $projeto['nomeprojeto']; ?> possui <?php $projeto['contIDcat']; ?> tarefas.</p>
    <a href="#" class="btn btn-primary">Vá para tarefas</a>
  </div>
</div>
<?php
require '../templates/footer.php'
?>