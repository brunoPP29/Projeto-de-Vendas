
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Banner</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php
    require_once('/opt/lampp/htdocs/projeto_vendas/config.php');

      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.banner` WHERE id = 1");
      $sql->execute();
      $banner = $sql->fetchAll();
    


    if (isset($_POST['acao'])) {
      $titleUpdate = $_POST['title'] ?? $banner[0]['title'];
      $subTitleUpdate = $_POST['subtitle'] ?? $banner[0]['subtitle'];
      $image = $_FILES['image'] ?? $banner[0]['image'];
      $imageOriginal = $banner[0]['image'];

      $imageNome = Painel::uploadFileBanner($image);

      $sql = MySql::conectar()->prepare("UPDATE `tb_admin.banner` SET title = ?, subtitle = ?, image = ? WHERE id = 1");
    $sql->execute(array($titleUpdate, $subTitleUpdate, $imageNome));
        
        if ($sql->rowCount() == 1) {
            unlink(BASE_DIR_PAINEL.'/uploadsBanner/'.$imageOriginal); // Remove a imagem antiga
          Painel::alertSucesso('Banner atualizado com sucesso!');
          echo '<div class="alert alert-warning">
          <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página incial em alguns segundos.
        </div>';
          ob_flush();
          flush();
          sleep(3);
          echo '<script>window.location.href = "'.INCLUDE_PATH_PAINEL.'";</script>';
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }

    }
  
      
      
      
      ?>

        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="titulo" name="title" value="<?php echo $banner[0]['title']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="subtitle" class="form-label">Subtítulo</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?php echo $banner[0]['subtitle']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Imagem Atual</label>
          <div class="input-group">
            <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploadsBanner/<?php echo $banner[0]['image']; ?>" alt="Imagem Atual" class="img-fluid mb-3" style="max-width: 300px; height: auto;">
          </div>

         <div class="mb-3">
          <label for="bg" class="form-label">Background</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-files"></i></span>
            <input type="file" class="form-control" id="background" name="image"required>
          </div>
        </div>

        <button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
      </form>
    </div>
  </div>
</div>
