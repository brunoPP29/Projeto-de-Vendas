<?php


?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Cadastro de Logins</h4>

      
    </div>
    <div class="alert alert-warning">
      Este login terá permissões para alterar todas as informações do site.
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
      
      <?php
      if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $email = $_POST['email'];
        $imagem = $_FILES['img'];
        $imagem = Painel::uploadFileEquipe($imagem);
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.equipe` VALUES (null,?,?,?,?)");
        $sql->execute(array($nome, $cargo, $email, $imagem));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Sucesso ao cadastrar funcionário!');
        } else {
          Painel::alertErro('Erro ao cadastrar funcionário!');
        }
      }
      
      ?>


      
      
      
      <div class="mb-3">
          <label for="teamName" class="form-label">Login</label>
          <input name="nome" type="text" class="form-control" id="teamName" placeholder="Digite o nome do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="members" class="form-label">Senha</label>
          <input name="cargo" type="text" class="form-control" id="teamName" placeholder="Digite o nome do funcionário" required>
        </div>

        <button name="acao" type="submit" class="btn btn-success w-100">Cadastrar Equipe</button>
      </form>
    </div>
  </div>
</div>