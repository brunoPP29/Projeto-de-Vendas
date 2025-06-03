<?php
  if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
    echo '<div class="alert alert-warning" role="alert">
      <p><i class="bi bi-exclamation-triangle me-2"></i>Tem certeza que deseja deletar esta mensagem?</p>
      <form method="post" class="d-flex justify-content-between mt-3">
        <input type="hidden" name="idDeletar" value="' . $_POST['idDeletar'] . '">
        <button type="submit" name="confirmarDeletar" class="btn btn-danger"><i class="bi bi-check me-1"></i>Sim</button>
        <button type="submit" name="cancelarDeletar" class="btn btn-secondary"><i class="bi bi-x me-1"></i>Não</button>
      </form>
    </div>';
  }

  if (isset($_POST['cancelarDeletar'])) {
    echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'pages/mensagens";</script>';
    exit;
  }

  if (isset($_POST['confirmarDeletar'])) {
    $idDeletar = $_POST['idDeletar'];
    $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.messages` WHERE id = ?");
    $sql->execute(array($idDeletar));
    if ($sql->rowCount() == 1) {
      Painel::alertSucesso('Mensagem deletada com sucesso!');
    } else {
      Painel::alertErro('Erro ao deletar mensagem!');
    }
    echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'pages/mensagens";</script>';
    exit;
  }
?>

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0"><i class="bi bi-envelope-fill me-2"></i>Mensagens Recebidas</h4>
    </div>

    <div class="card-body">
      <div class="alert alert-info">
        <i class="bi bi-chat-left-text-fill me-2"></i>Veja abaixo as mensagens recebidas pelo seu site.
      </div>

      <?php
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.messages` ORDER BY id DESC");
        $sql->execute();
              if ($sql->rowCount() == 0) {
        echo '<div class="alert alert-warning text-center">Nenhuma mensagem encontrada.</div>';
        return;
      }
        $mensagens = $sql->fetchAll();
        $i = 0;
        foreach ($mensagens as $mensagem) {
        $i++;
      ?>
      <div class="card mb-3 border-start border-4 border-primary">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <strong class="text-primary">#<?php echo $i; ?></strong>
            <!-- Botão de Deletar -->
            <form method="post" class="m-0 p-0">
              <input type="hidden" name="idDeletar" value="<?php echo $mensagem['id']; ?>">
              <button type="submit" name="acaoDeletar" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
            </form>
          </div>
          <p class="mb-1 text-muted"><i class="bi bi-envelope me-1"></i> <?php echo $mensagem['email'] ?></p>
          <p class="fw-bold mb-2"><i class="bi bi-chat-left-dots me-1"></i>Assunto: <?php echo $mensagem['assunto'] ?></p>
          <p class="card-text"><?php echo $mensagem['mensagem'] ?></p>
        </div>
      </div>
      <?php } ?> 

      <div class="alert alert-warning mt-4">
        <i class="bi bi-shield-lock-fill me-2"></i>Mantenha os dados dos usuários seguros e não compartilhe informações sensíveis.
      </div>
    </div>
  </div>
</div>
