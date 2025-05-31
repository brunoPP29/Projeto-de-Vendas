<?php


?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Cadastro de Equipe</h4>
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
          <label for="teamName" class="form-label">Nome Funcionário</label>
          <input name="nome" type="text" class="form-control" id="teamName" placeholder="Digite o nome do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="members" class="form-label">Cargo</label>
          <input name="cargo" type="text" class="form-control" id="teamName" placeholder="Digite o nome do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail de Contato</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="equipe@email.com" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Imagem do Funcionário</label>
          <input name="img" type="file" class="form-control" id="imagem-func" required>
        </div>


        <button name="acao" type="submit" class="btn btn-success w-100">Cadastrar Equipe</button>
      </form>
    </div>
  </div>
</div>