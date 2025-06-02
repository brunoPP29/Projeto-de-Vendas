<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Cadastro de Plano</h4>
    </div>
    <div class="card-body">
      <form method="post">
      
      <?php
      if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $item1 = $_POST['item1'];
        $item2 = $_POST['item2'];
        $item3 = $_POST['item3'];
        $item4 = $_POST['item4'];
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.planos` VALUES (null,?,?,?,?,?,?)");
        $sql->execute(array($nome, $valor, $item1, $item2, $item3, $item4));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Sucesso ao cadastrar plano!');
        } else {
          Painel::alertErro('Erro ao cadastrar plano!');
        }
      }
      ?>

      <div class="mb-3">
        <label for="planoNome" class="form-label">Nome do Plano</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-card-text"></i></span>
          <input name="nome" type="text" class="form-control" id="planoNome" placeholder="Digite o nome do plano" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="planoValor" class="form-label">Valor</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
          <input name="valor" type="number" class="form-control" id="planoValor" placeholder="Digite o valor do plano" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="item1" class="form-label">Item 1</label>
        <input name="item1" type="text" class="form-control" id="item1" placeholder="Descrição do item 1" required>
      </div>

      <div class="mb-3">
        <label for="item2" class="form-label">Item 2</label>
        <input name="item2" type="text" class="form-control" id="item2" placeholder="Descrição do item 2" required>
      </div>

      <div class="mb-3">
        <label for="item3" class="form-label">Item 3</label>
        <input name="item3" type="text" class="form-control" id="item3" placeholder="Descrição do item 3" required>
      </div>

      <div class="mb-3">
        <label for="item4" class="form-label">Item 4</label>
        <input name="item4" type="text" class="form-control" id="item4" placeholder="Descrição do item 4" required>
      </div>

      <button name="acao" type="submit" class="btn btn-success w-100"><i class="bi bi-save me-2"></i>Cadastrar Plano</button>
      </form>
    </div>
  </div>
</div>
