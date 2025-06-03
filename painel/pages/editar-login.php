
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Login</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php


      $idRecebido = $_GET['id'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE id = ?");
      $sql->execute(array($idRecebido));
      $login = $sql->fetchAll();

      foreach ($login as $key => $value) {
      if (!$login) {
        echo '<div class="alert alert-danger">Funcionário não encontrado!</div>';
        exit;
      }else {
        echo '<div class="mb-3">
            <label for="cargo" class="form-label">Quem você quer editar?</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-check"></i></span>
              <select class="form-select" id="quem" name="quem" required>
              <option value="'.$idRecebido.'">'.$value['login'].'</option>
              </select>
            </div>
        </div>';
      }
    }


    if (isset($_POST['acao'])) {
      $loginUpdate = $_POST['login'] ?? $login[0]['login'];
      $password = $_POST['password'] ?? $login[0]['password'];
        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET login = ?, password = ? WHERE id = ?");
        $sql->execute(array($loginUpdate, $password, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Login atualizado com sucesso!');
          echo '<div class="alert alert-warning">
          <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página de edição de login em alguns segundos.
        </div>';
          ob_flush();
          flush();
          sleep(3);
          echo '<script>window.location.href = "'.INCLUDE_PATH.'editar-loginAny";</script>';
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }

    }
  
      
      
      
      ?>

        <div class="mb-3">
          <label for="login" class="form-label">Login</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="nome" name="login" value="<?php echo $value['login']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="text" class="form-control" id="senha" name="password" value="<?php echo $value['password']; ?>" required>
          </div>
        </div>

        <button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
      </form>
    </div>
  </div>
</div>
