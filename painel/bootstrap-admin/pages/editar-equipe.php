<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Editar Funcionário</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php


      $idRecebido = $_GET['id'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe` WHERE id = ?");
      $sql->execute(array($idRecebido));
      $funcionario = $sql->fetchAll();

      foreach ($funcionario as $key => $value) {
        # code...
      if (!$funcionario) {
        echo '<div class="alert alert-danger">Funcionário não encontrado!</div>';
        exit;
      }else {
        echo '<div class="mb-3">
            <label for="cargo" class="form-label">Quem você quer editar?</label>
            <select class="form-select" id="quem" name="quem" required>
            <option value="'.$idRecebido.'">'.$value['nome'].'</option>
            </select>
        </div>';
      }
    }


    if (isset($_POST['acao'])) {
      $nome = $_POST['nome'] ?? $funcionario[0]['nome'];
      $cargo = $_POST['cargo'] ?? $funcionario[0]['cargo'];
      $email = $_POST['email'] ?? $funcionario[0]['email'];

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
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $value['nome']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $value['cargo']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $value['email']; ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Imagem Atual</label><br>
          <img src="uploadsEqui/<?php echo $value['img']; ?>" alt="Imagem atual" class="img-thumbnail" style="max-width: 100px;">
        </div>

        <div class="mb-3">
          <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
          <input type="file" class="form-control" id="imagem" name="imagem">
        </div>

        <button name="acao" type="submit" class="btn btn-primary w-100">Atualizar Funcionário</button>
      </form>
    </div>
  </div>
</div>