<div class="container mt-5">
  <div class="card shadow rounded">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0"><i class="bi bi-envelope-at me-2"></i>Editar Informações de Contato</h4>
    </div>
    <div class="card-body">
      <?php
        // Busca o primeiro (e único) registro de contato
        $contato = MySql::conectar()->prepare("SELECT * FROM `tb_admin.contatoInfo` LIMIT 1");
        $contato->execute();
        $info = $contato->fetch();

        // Atualização
        if (isset($_POST['atualizarContato'])) {
          $email = $_POST['email'];
          $zap = $_POST['zap'];
          $insta = $_POST['insta'];

          $update = MySql::conectar()->prepare("UPDATE `tb_admin.contatoInfo` SET email = ?, zap = ?, insta = ? WHERE id = ?");
          $update->execute([$email, $zap, $insta, $info['id']]);

          if ($update->rowCount() > 0) {
            Painel::alertSucesso('Informações atualizadas com sucesso!');
            echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'pages/editar-contatos";</script>';
            exit;
          } else {
            Painel::alertErro('Nenhuma informação foi alterada.');
          }
        }
      ?>

      <form method="post" class="mt-3">
        <div class="mb-3">
          <label for="email" class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
          <input type="email" class="form-control shadow-sm" name="email" id="email" value="<?php echo htmlspecialchars($info['email']); ?>" required>
        </div>
        <div class="mb-3">
          <label for="zap" class="form-label"><i class="bi bi-whatsapp me-2"></i>WhatsApp</label>
          <input type="text" class="form-control shadow-sm" name="zap" id="zap" value="<?php echo htmlspecialchars($info['zap']); ?>" required>
        </div>
        <div class="mb-3">
          <label for="insta" class="form-label"><i class="bi bi-instagram me-2"></i>Instagram</label>
          <input type="text" class="form-control shadow-sm" name="insta" id="insta" value="<?php echo htmlspecialchars($info['insta']); ?>" required>
        </div>
        <button type="submit" name="atualizarContato" class="btn btn-success">
          <i class="bi bi-check-circle me-1"></i>Salvar Alterações
        </button>
      </form>
    </div>
  </div>
</div>
