<div class="container mt-5">
  <div class="card shadow rounded">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0"><i class="bi bi-envelope-at me-2"></i>Fale Conosco</h4>
    </div>
    <div class="card-body">

      <?php
        if (isset($_POST['enviarMensagem'])) {
          $email = strip_tags($_POST['email']);
          $assunto = strip_tags($_POST['assunto']);
          $mensagem = strip_tags($_POST['mensagem']);

          if ($email != '' && $mensagem != '') {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.messages` (email, assunto, mensagem) VALUES (?, ?, ?)");
            $sql->execute([$email, $assunto, $mensagem]);

            if ($sql->rowCount() == 1) {
              echo '<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Mensagem enviada com sucesso!</div>';
            } else {
              echo '<div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Erro ao enviar a mensagem.</div>';
            }
          } else {
            echo '<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Preencha os campos obrigatórios.</div>';
          }
        }
      ?>

      <form method="post" class="row g-3 mt-2">
        <div class="col-md-6">
          <label for="email" class="form-label">Email*</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
          <label for="assunto" class="form-label">Assunto</label>
          <input type="text" class="form-control" id="assunto" name="assunto">
        </div>
        <div class="col-12">
          <label for="mensagem" class="form-label">Mensagem*</label>
          <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
        </div>
        <div class="col-12 text-end">
          <button type="submit" name="enviarMensagem" class="btn btn-primary">
            <i class="bi bi-send me-1"></i>Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
