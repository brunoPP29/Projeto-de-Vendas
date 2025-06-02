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
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Plano</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


      $idRecebido = $_GET['id'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.planos` WHERE id = ?");
      $sql->execute(array($idRecebido));
      $planos = $sql->fetchAll();

      foreach ($planos as $key => $value) {
        # code...
      if (!$planos) {
        echo '<div class="alert alert-danger">Plano não encontrado!</div>';
        exit;
      }else {
        echo '<div class="mb-3">
            <label for="cargo" class="form-label">O que você quer editar?</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-check"></i></span>
              <select class="form-select" id="quem" name="quem" required>
              <option value="'.$idRecebido.'">'.$value['nome'].'</option>
              </select>
            </div>
        </div>';
      }
    }


    if (isset($_POST['acao'])) {
      $nome = $_POST['nome'] ?? $planos[0]['nome'];
      $valor = $_POST['valor'] ?? $planos[0]['valor'];
      $item1 = $_POST['item1'] ?? $planos[0]['item1'];
      $item2 = $_POST['item2'] ?? $planos[0]['item2'];
      $item3 = $_POST['item3'] ?? $planos[0]['item3'];
      $item4 = $_POST['item4'] ?? $planos[0]['item4'];

      $sql = MySql::conectar()->prepare("UPDATE `tb_admin.planos` SET nome = ?, valor = ?, item1 = ?, item2 = ?, item3 = ?, item4 = ? WHERE id = ?");
      $sql->execute(array($nome, $valor, $item1, $item2, $item3, $item4, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Plano atualizado com sucesso!');
          echo '<div class="alert alert-warning">
          <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página de edição de Plano em alguns segundos.
        </div>';
          ob_flush();
          flush();
          sleep(3);
          echo '<script>window.location.href = "'.INCLUDE_PATH_PAINEL.'pages/editar-planosAny";</script>';
        } else {
          Painel::alertErro('Erro ao atualizar Plano!');
        }
      }
    
  
      
      
      
      ?>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $value['nome']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Valor</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
            <input type="number" class="form-control" id="cargo" name="valor" value="<?php echo $value['valor']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">Item 1</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" class="form-control" id="text" name="item1" value="<?php echo $value['item1']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">Item 2</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" class="form-control" id="text" name="item2" value="<?php echo $value['item2']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">Item 3</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" class="form-control" id="text" name="item3" value="<?php echo $value['item3']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">Item 4</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" class="form-control" id="text" name="item4" value="<?php echo $value['item4']; ?>" required>
          </div>
        </div>

        <button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
      </form>
    </div>
  </div>
</div>
