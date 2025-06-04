
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Cadastro de Projeto</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
      
      <?php
      if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $descricao =$_POST['descricao'];
        $linksite = $_POST['linksite'];
        $linkgit = $_POST['linkgit'];
        $file = isset($_FILES['imag']) ? $_FILES['imag'] : null;

        $image = Painel::uploadFileProj($file);


        $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.projetos` VALUES (null, ?, ?, ?, ?, ?)");
        $sql->execute(array($nome, $descricao, $linksite, $linkgit, $image));
        if ($sql->rowCount() == 1) {
            Painel::alertSucesso('Projeto cadastrado com sucesso!');
        }else {
            Painel::alertErro('Erro ao cadastrar o projeto!');
        }
      }
      ?>
    <div class="mb-3">
      <label for="projetoNome" class="form-label">Nome do Projeto</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
        <input name="nome" type="text" class="form-control" id="projetoNome" placeholder="Digite o nome do projeto" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="projetoDescricao" class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control" id="projetoDescricao" rows="3" placeholder="Digite a descrição do projeto" required></textarea>
    </div>

    <div class="mb-3">
      <label for="projetoLinkSite" class="form-label">Link do Site</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
        <input name="linksite" type="url" class="form-control" id="projetoLinkSite" placeholder="https://seudominio.com">
      </div>
    </div>

    <div class="mb-3">
      <label for="projetoLinkGit" class="form-label">Link do GitHub</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-github"></i></span>
        <input name="linkgit" type="url" class="form-control" id="projetoLinkGit" placeholder="https://github.com/seurepositorio">
      </div>
    </div>

    <div class="mb-3">
      <label for="projetoImagem" class="form-label">Imagem</label>
      <input name="imag" type="file" class="form-control" id="projetoImagem" accept="image/*" required>
    </div>

      <button name="acao" type="submit" class="btn btn-success w-100"><i class="bi bi-save me-2"></i>Cadastrar Projeto</button>
      </form>
    </div>
  </div>
</div>
