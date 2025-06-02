<?php
  include('/opt/lampp/htdocs/projeto_vendas/config.php');
  if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    //ok
  } else {
    echo '<script>window.location.href = "'.INCLUDE_PATH_PAINEL.'";</script>';
    exit();
  }

?>
<div class="container mt-5">
  <div class="card shadow rounded">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-people me-2"></i>Lista de Planos</h4>
    </div>
    <div class="card-body">

      <!-- Formulário de Pesquisa -->
       <h4 class="text-center">Busque um plano</h4>
      <form class="d-flex justify-content-center mb-4" method="post">
        <div class="input-group w-75 w-md-50">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i>
</span>
          <input type="text" class="form-control" name="q" placeholder="Digite sua pesquisa..." required>
          <button name="acao" class="btn btn-light" type="submit">
  <i class="bi bi-arrow-right-circle text-dark fs-5"></i>
</button>

    <?php
    $query = "";
      if (isset($_POST['acao'])) {
        echo '<div style="margin-top: 15px;" class="w-100 text-center mb-3">';
        echo '<div class="alert alert-info shadow-sm rounded d-inline-block px-4 py-2">';
        echo '<i class="bi bi-info-circle me-2"></i>Mostrando resultados para: <strong>' . htmlspecialchars($_POST['q']) . '</strong>';
        echo '</div>';
        echo '</div>';
        $busca = $_POST['q']; 
        $query = "WHERE nome LIKE '%$busca%' OR valor LIKE '%$busca%' OR item1 LIKE '%$busca%' OR item2 LIKE '%$busca%' OR item3 LIKE '%$busca%' OR item4 LIKE '%$busca%'";
      }
    
    
    ?>
        </div>
      </form>

      <?php
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.planos` $query");
      $sql->execute();
      $planos = $sql->fetchAll();
      foreach ($planos as $key => $value) {
        $id = $value['id'];
      ?>

        <!-- Cartão de Funcionário -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border p-3 mb-3 rounded">
          <div class="d-flex align-items-center">            <div>
              <h5 class="mb-1"><?php echo htmlspecialchars($value['nome']); ?></h5>
              <p class="mb-0 text-muted">
                <strong>Valor:</strong> R$ <?php echo htmlspecialchars($value['valor']); ?><br>
                <strong>Item 1:</strong> <?php echo htmlspecialchars($value['item1']); ?><br>
                <strong>Item 2:</strong> <?php echo htmlspecialchars($value['item2']); ?><br>
                <strong>Item 3:</strong> <?php echo htmlspecialchars($value['item3']); ?><br>
                <strong>Item 4:</strong> <?php echo htmlspecialchars($value['item4']); ?>
              </p>
            </div>
          </div>
          <form method="post" class="mt-3 mt-md-0">
            <input type="hidden" name="idDeletar" value="<?php echo $id; ?>">
            <button name="editar" type="submit" class="btn btn-sm btn-warning me-2">
              <i class="bi bi-pencil me-1"></i>Editar
            </button>
            <button type="submit" name="acaoDeletar" class="btn btn-sm btn-danger">
              <i class="bi bi-trash me-1"></i>Deletar
            </button>
          </form>
        </div>

      <?php } ?>

      <!-- Confirmação de Deleção -->
      <?php
      if (isset($_POST['editar'])) {
        $idEditar = $_POST['idDeletar'];
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'pages/editar-planos?id=' . $idEditar . '";</script>';
      }

      if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
        echo '<div class="alert alert-warning" role="alert">
          <p><i class="bi bi-exclamation-triangle me-2"></i>Tem certeza que deseja deletar este funcionário?</p>
          <form method="post" class="d-flex justify-content-between mt-3">
            <input type="hidden" name="idDeletar" value="' . $_POST['idDeletar'] . '">
            <button type="submit" name="confirmarDeletar" class="btn btn-danger"><i class="bi bi-check me-1"></i>Sim</button>
            <button type="submit" name="cancelarDeletar" class="btn btn-secondary"><i class="bi bi-x me-1"></i>Não</button>
          </form>
        </div>';
      }

      if (isset($_POST['cancelarDeletar'])) {
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . '/pages/listar-planos";</script>';
        exit;
      }

      if (isset($_POST['confirmarDeletar'])) {
        $idDeletar = $_POST['idDeletar'];
        $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.planos` WHERE id = ?");
        $sql->execute(array($idDeletar));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Plano deletado com sucesso!');
        } else {
          Painel::alertErro('Erro ao deletar plano!');
        }
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'pages/listar-planos";</script>';
        exit;
      }
      ?>

    </div>
  </div>
</div>
