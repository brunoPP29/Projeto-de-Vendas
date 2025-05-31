<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Editar Funcionário</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <select class="form-select" id="quem" name="quem" required>
      <?php


        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe`");
        $sql->execute();
        $funcionario = $sql->fetchAll();

      foreach ($funcionario as $key => $value) {
        # code...
           echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
        }
        ?>
        </select>
        </div>
<?php

    if (isset($_POST['acao'])) {
      $nome = $_POST['nome'] ?? $funcionario[0]['nome'];
      $cargo = $_POST['cargo'] ?? $funcionario[0]['cargo'];
      $email = $_POST['email'] ?? $funcionario[0]['email'];
      $idRecebido = $_POST['quem'] ?? $funcionario[0]['id'];

      if (!empty($_FILES['imagem']['name'])) {
        $imagem = $_FILES['imagem'];
        $imagem = Painel::uploadFileEquipe($imagem);

        if (file_exists('uploadsEqui/' . $funcionario[0]['img'])) {
          unlink('uploadsEqui/' . $funcionario[0]['img']);
        }

        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.equipe` SET nome = ?, cargo = ?, email = ?, img = ? WHERE id = ?");
        $sql->execute(array($nome, $cargo, $email, $imagem, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Funcionário atualizado com sucesso!');
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }
      } else {
        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.equipe` SET nome = ?, cargo = ?, email = ? WHERE id = ?");
        $sql->execute(array($nome, $cargo, $email, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Funcionário atualizado com sucesso!');
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }

    }
  }
      
      
      
      ?>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Digite o cargo do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
          <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione uma imagem">
        </div>

        <button name="acao" type="submit" class="btn btn-primary w-100">Atualizar Funcionário</button>
      </form>
    </div>
  </div>
</div>