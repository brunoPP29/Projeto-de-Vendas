<?php
  // Defina o caminho do painel se a constante não estiver definida
  if (!defined('INCLUDE_PATH_PAINEL')) {
    define('INCLUDE_PATH_PAINEL', '/projeto_vendas/painel/'); // ajuste o caminho conforme necessário
  }

  if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    //ok
  } else {
    echo '<script>window.location.href = "'.INCLUDE_PATH_PAINEL.'";</script>';
    exit();
  }

?>
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><i class="bi bi-house-door-fill me-2"></i>Bem-vindo ao Painel de Controle</h4>
    </div>
    
    <div class="card-body">
      <div class="alert alert-info">
        <i class="bi bi-info-circle-fill me-2"></i>Você está no ambiente administrativo do sistema de vendas.
      </div>

      <p class="lead mb-4">
        Aqui você poderá gerenciar logins de administradores, controlar cadastros, visualizar relatórios e configurar seu site conforme as necessidades do seu negócio.
      </p>

      <hr>

      <h5><i class="bi bi-gear-fill me-2"></i>Como Navegar</h5>
      <div class="bg-dark p-2 rounded">
        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item"><i class="bi bi-person-plus-fill me-2 text-success"></i>Use o menu <strong>Cadastro de Logins</strong> para adicionar novos usuários com permissões administrativas.</li>
            <li class="list-group-item"><i class="bi bi-bar-chart-line-fill me-2 text-primary"></i>Acesse as seções nos <strong>Menus Acima</strong> para alterar informações do site.</li>
            <li class="list-group-item"><i class="bi bi-question-circle-fill me-2 text-warning"></i>Em caso de dúvidas, clique no menu <strong>"Como Funciona"</strong> para visualizar orientações detalhadas.</li>
        </ul>
      </div>

      <div class="alert alert-warning">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>Importante: Certifique-se de que apenas usuários confiáveis tenham acesso ao painel de controle.
      </div>

      <p class="mb-0">
        Se tiver qualquer dificuldade ou não souber por onde começar, recomendamos começar pelo menu <strong>"Como Funciona"</strong>, onde explicamos o uso de cada funcionalidade do sistema.
      </p>
    </div>
  </div>
</div>
