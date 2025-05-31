
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Plano</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
          <label for="cargo" class="form-label">Qual plano você deseja editar?</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-gear"></i></span>
            <select class="form-select" id="quem" name="quem" required>
      <?php

        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.planos`");
        $sql->execute();
        $planos = $sql->fetchAll();

      foreach ($planos as $key => $value) {
           echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
        }
        ?>
            </select>
          </div>
        </div>
<?php

      if (isset($_POST['acao'])) {
        $quem = $_POST['quem'];
        echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'/pages/editar-planos?id='.$quem.'";</script>';
      }
      
      
      ?>

<button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
</form>
    </div>
  </div>
</div>
