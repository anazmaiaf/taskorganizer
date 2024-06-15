<?php
require '../templates/header.php';
require '../templates/navbar.php';

$sql = "SELECT p.idprojetos, p.nomeprojeto, COUNT(t.idtarefa) AS contIDcat
        FROM tarefas AS t
        JOIN projetos AS p ON t.projetos_idprojetos = p.idprojetos
        GROUP BY p.idprojetos
        ORDER BY contIDcat DESC
        LIMIT 1;";
$result = $conn->prepare($sql);
$result->execute();
$projeto = $result->fetchAll(PDO::FETCH_ASSOC);

if (!empty($projeto)) {
  $projeto = $projeto[0];
} else {
  $projeto = ['nomeprojeto' => 'N/A', 'contIDcat' => 0];
}

?>

<style>
  .btn-custom{
  background: linear-gradient(to right, #008F8C, #015958, #023535);
  border:none;
  border-radius:5px;
  padding: 7px;
  }
</style>

<h1 class="text-center mx-5 mt-5">Se mantenha firme nos objetivos.</h1>
<div class="cards-align d-flex justify-content-center align-items-center mt-5">
  <div class="card col-sm-6">
    <div class="card-header">
      Relatório
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Não perca o prazo!</h5>
      <p class="card-text text-center">O seu projeto <?php echo htmlspecialchars($projeto['nomeprojeto']); ?> possui <?php echo htmlspecialchars($projeto['contIDcat']); ?> tarefa(s). Confira as tarefas e adiante seu projeto!</p>
      <div class="d-flex align-items-center justify-content-center">
        <button class="btn-custom mx-3" type="submit" name="submit"><a href="tarefa.php" class="text-decoration-none text-white">Vá para as Tarefas</a></button>
        <button class="btn-custom" type="submit" name="submit"><a href="projeto.php" class="text-decoration-none text-white">Vá para os Projetos</a></button>
      </div>
    </div>
  </div>
</div>
<?php
require '../templates/footer.php';