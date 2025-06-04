<div class="container my-5 d-flex justify-content-center">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 800px; width: 100%;">
    <div class="card-header bg-dark text-white rounded-top-4 py-3">
      <h4 class="mb-0 text-center"><i class="bi bi-envelope-at me-2"></i>Envie sua mensagem</h4>
    </div>
    <div class="card-body p-4">

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviarMensagem'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $assunto = htmlspecialchars(trim($_POST['assunto']));
        $mensagem = htmlspecialchars(trim($_POST['mensagem']));

        if (!empty($email) && !empty($mensagem)) {
          try {
            $pdo = MySql::conectar();
            $sql = $pdo->prepare("INSERT INTO `tb_admin.messages`VALUES (null, ?, ?, ?)");
            $sql->execute([$email, $assunto, $mensagem]);

            if ($sql->rowCount() === 1) {
              echo '<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Mensagem enviada com sucesso! Você será redirecionado...</div>';
              header("refresh:2;url=" . INCLUDE_PATH);
              exit;
            
            } else {
              echo '<div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Erro ao enviar a mensagem. Tente novamente.</div>';
            }
          } catch (PDOException $e) {
            echo '<div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Erro no banco de dados.</div>';
          }
        } else {
          echo '<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Preencha os campos obrigatórios.</div>';
        }
      }
      ?>

      <form method="post" class="row g-4">
        <div class="col-md-6">
                            <label style="color: var(--text-light); font-weight: bold;"   for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-md-6">
          <label style="color: var(--text-light);" for="assunto" class="form-label fw-semibold">Assunto</label>
            <select name="assunto" class="form-select">
                  <option selected>Selecione o assunto</option>
                  <option>Preciso de um projeto</option>
                  <option>Suporte técnico</option>
                  <option>Outros</option>
            </select>        </div>
        <div class="col-12">
          <label style="color: var(--text-light);" for="mensagem" class="form-label fw-semibold">Mensagem <span class="text-danger">*</span></label>
                            <textarea name="mensagem" class="form-control" rows="4" placeholder="Sua mensagem"></textarea>
        </div>
        <div class="col-12 text-end">
          <button type="submit" name="enviarMensagem" class="btn btn-primary btn-lg px-4 rounded-pill">
            <i class="bi bi-send me-1"></i>Enviar
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
