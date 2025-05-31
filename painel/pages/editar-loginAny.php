

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Login</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
          <label for="cargo" class="form-label">Qual login você deseja editar?</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-gear"></i></span>
            <select class="form-select" id="quem" name="quem" required>
      <?php


        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
        $sql->execute();
        $loginAtual = $sql->fetchAll();

      foreach ($loginAtual as $key => $value) {
           echo '<option value="'.$value['id'].'">'.$value['login'].'</option>';
        }
        ?>
            </select>
          </div>
      </div>
      <button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
      <?php

        
        if (isset($_POST['acao'])) {
          $quem = $_POST['quem'];
          echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'editar-login?id='.$quem.'";</script>';
        } 
          # code...
        
      
      
      
      ?>

      </form>
    </div>
  </div>
</div>
