
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Projeto</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php

    require_once('/opt/lampp/htdocs/projeto_vendas/config.php');
    $idRecebido = $_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.projetos` WHERE id = ?");
    $sql->execute(array($idRecebido));
    $projeto = $sql->fetchAll();

    $nome = $projeto[0]['nome'];
    $descricao = $projeto[0]['descricao'];
    $linksite = $projeto[0]['linksite'];
    $linkgit = $projeto[0]['linkgit'];
    $imageOriginal = $projeto[0]['img'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $nome = $_POST['nome'] ?? $projeto[0]['nome'];
      $descricao = $_POST['descricao'] ?? $projeto[0]['descricao'];
      $linksite = $_POST['linksite'] ?? $projeto[0]['linksite'];
      $linkgit = $_POST['linkgit'] ?? $projeto[0]['linkgit'];

      // Check if a new image was uploaded
      if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK && $_FILES['image']['name'] != '') {
        $imageNome = Painel::uploadFileProj($_FILES['image']);
        // Remove old image only if a new one was uploaded
        if ($imageNome && $imageNome != $imageOriginal) {
          if (file_exists(BASE_DIR_PAINEL.'/uploadsProj/'.$imageOriginal)) {
            unlink(BASE_DIR_PAINEL.'/uploadsProj/'.$imageOriginal);
          }
        }
      } else {
        $imageNome = $imageOriginal;
      }

      $sql = MySql::conectar()->prepare("UPDATE `tb_admin.projetos` SET nome = ?, descricao = ?, linksite = ?, linkgit = ?, img = ? WHERE id = ?");
      $sql->execute(array($nome, $descricao, $linksite, $linkgit, $imageNome, $idRecebido));
      
      if ($sql->rowCount() == 1) {
        Painel::alertSucesso('Projeto atualizado com sucesso!');
        echo '<div class="alert alert-warning">
        <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página incial em alguns segundos.
      </div>';
        ob_flush();
        flush();
        sleep(3);
        echo '<script>window.location.href = "'.INCLUDE_PATH_PAINEL.'pages/editar-projetoAny";</script>';
      } else {
        Painel::alertErro('Erro ao atualizar projeto!');
      }
    }

    
  
      
      
      
      ?>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Projeto</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-chat-square-quote"></i></span>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
            </div>  
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-chat-quote"></i></span>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo htmlspecialchars($descricao); ?></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="linksite" class="form-label">Link do Site</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                <input type="url" class="form-control" id="linksite" name="linksite" value="<?php echo htmlspecialchars($linksite); ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="linkgit" class="form-label">Link do GitHub</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-github"></i></span>
                <input type="url" class="form-control" id="linkgit" name="linkgit" value="<?php echo htmlspecialchars($linkgit); ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Atual</label>
            <div>
                <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploadsProj/<?php echo htmlspecialchars($imageOriginal); ?>" alt="Imagem Atual" class="img-fluid mb-3" style="max-width: 300px; height: auto;">
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Alterar Imagem</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-image"></i></span>
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>

        <button type="submit" name="acao" class="btn btn-success">
          <i class="bi bi-check-circle me-1"></i>Salvar Alterações
        </button>      
      </form>
    </div>
  </div>
</div>
