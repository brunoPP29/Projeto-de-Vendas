
<div class="container mt-5">
    <?php
    if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
    echo '<div class="alert alert-warning" role="alert">
          <p><i class="bi bi-exclamation-triangle me-2"></i>Tem certeza que deseja deletar este Projeto?</p>
          <form method="post" class="d-flex justify-content-between">
            <input type="hidden" name="idDeletar" value="'.$_POST['idDeletar'].'">
            <button type="submit" name="confirmarDeletar" class="btn btn-danger"><i class="bi bi-check me-1"></i>Sim</button>
            <button type="submit" name="cancelarDeletar" class="btn btn-secondary"><i class="bi bi-x me-1"></i>Não</button>
          </form>
        </div>';
    }
    
    if (isset($_POST['cancelarDeletar'])) {
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'listar-projeto";</script>';
      exit;
    }
    
    if (isset($_POST['confirmarDeletar'])) {
      $idDeletar = $_POST['idDeletar'];
      $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.projetos` WHERE id = ?");
      $sql->execute(array($idDeletar));
      if ($sql->rowCount() == 1) {
        Painel::alertSucesso('Projeto deletado com sucesso!');
      } else {
        Painel::alertErro('Erro ao deletar Projeto!');
      }
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'pages/listar-projeto";</script>';
      exit;
    }
    
    ?>
  <div class="card shadow">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0"><i class="bi bi-person-lock me-2"></i>Lista de projetos</h4>
    </div>
    <div class="card-body">
<h4 class="text-center">Busque um projeto</h4>
      <form class="d-flex justify-content-center mb-4" method="post">
        <div class="input-group w-75 w-md-50">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i>
</span>
          <input type="text" class="form-control" name="q" placeholder="Digite sua pesquisa..." required>
          <button name="acao" class="btn btn-light" type="submit">
  <i class="bi bi-arrow-right-circle text-dark fs-5"></i>
</button>

    <?php
    $query = "";
      if (isset($_POST['acao'])) {
        echo '<div style="margin-top: 15px;" class="w-100 text-center mb-3">';
        echo '<div class="alert alert-info shadow-sm rounded d-inline-block px-4 py-2">';
        echo '<i class="bi bi-info-circle me-2"></i>Mostrando resultados para: <strong>' . htmlspecialchars($_POST['q']) . '</strong>';
        echo '</div>';
        echo '</div>';
        $busca = $_POST['q'];
        $query = "WHERE login LIKE '%$busca%'";
      }
    
    
    ?>
        </div>
      </form>

    <?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.projetos` $query");
    $sql->execute();
    $projList = $sql->fetchAll();
    foreach ($projList as $key => $value) {
      $id = $value['id'];
    ?>
      
      <!-- Funcionário -->
      <div class="d-flex justify-content-between align-items-center border p-3 mb-3 rounded">
        <div>
            <img style="border-radius: 20px;  margin: 15px 0;" width="200px" height="auto" src="<?php echo INCLUDE_PATH_PAINEL;?>uploadsProj/<?php echo $value['img']?>">
          <h5 class="mb-1"><i class="bi bi-person-circle me-2"></i>Nome: <?php echo $value['nome']?></h5>
          <p class="mb-0 text-muted"><i class="bi bi-globe me-2"></i>Descrição: <?php echo $value['descricao']?></p>
          <p class="mb-0 text-muted"><i class="bi bi-cursor-text me-2"></i>Link do Site: <?php echo $value['linksite']?></p>
          <p class="mb-0 text-muted"><i class="bi bi-github me-2"></i>Link do GitHub: <?php echo $value['linkgit']?></p>
        </div>
        <div>
          <form method="post">
            <input type="hidden" name="idDeletar" value="<?php echo $id; ?>">
            <button name="editar" type="submit" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil me-1"></i>Editar</button>
            <button type="submit" name="acaoDeletar" class="btn btn-sm btn-danger"><i class="bi bi-trash me-1"></i>Deletar</button>
          </form>
        </div>
      </div>

      <?php
    }


    if (isset($_POST['editar'])) {
      $idEditar = $_POST['idDeletar'];
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'pages/editar-projeto?id='.$idEditar.'";</script>';
    }
    ?>


    </div>
  </div>
</div>
