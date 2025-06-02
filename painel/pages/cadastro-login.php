


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
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Cadastro de Logins</h4>

      
    </div>
    <div class="alert alert-warning">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>Este login terá permissões para alterar todas as informações do site.
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
      
      <?php
      if (isset($_POST['acao'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) {
          Painel::alertErro('Preencha todos os campos!');
        } else {
          $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?)");
          $sql->execute(array($login, $password));
          Painel::alertSucesso('Login cadastrado com sucesso!');
        }
      }
      
      ?>


      
      
      
      <div class="mb-3">
          <label for="userLogin" class="form-label">Login</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input name="login" type="text" class="form-control" id="teamName" placeholder="Digite o login do administrador" >
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input name="password" type="text" class="form-control" id="teamName" placeholder="Digite a senha do administrador" >
          </div>
        </div>

        <button name="acao" type="submit" class="btn btn-success w-100"><i class="bi bi-save me-2"></i>Cadastrar Login</button>
      </form>
    </div>
  </div>
</div>
