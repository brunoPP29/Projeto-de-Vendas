<?php
  if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
// tudo certo entra pro painel
  }else {
    header('Location: ' . INCLUDE_PATH_PAINEL);
    exit;
    die('Você não tem permissão para acessar esta página.');
  }

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/projeto_vendas/painel/estilo/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- Barra de navegação -->
    <div class="nav-bar1">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="<?php echo INCLUDE_PATH_PAINEL; ?>">Painel de Controle</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Site</button>
                    <ul class="dropdown-menu dropdown-menu-animated">
                      <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/editar-banner">Editar Banner</a></li>
                    </ul>
                  </div>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Planos</button>
                <ul class="dropdown-menu dropdown-menu-animated">
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/cadastro-planos">Cadastrar Plano</a></li>
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/editar-planosAny">Editar Plano</a></li>
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/listar-planos">Listar Plano</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Logins</button>
                <ul class="dropdown-menu dropdown-menu-animated">
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/cadastro-login">Cadastrar Login</a></li>
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/editar-loginAny">Editar Login</a></li>
                  <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>pages/listar-login">Listar Logins</a></li>
                </ul>
              </div>
              
            </ul>
          </div>
          <div class="container-itens">
            <div class="itens-menu">
              <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Como Funciona?</button>
              <div class="loggout">
                <form method="post">
                  <?php
                  if (isset($_POST['loggout'])) {
                    Painel::loggout();
                  }
                  ?>
                  <button type="submit" name="loggout" value="true" class="btn btn-danger">
                    <img width="25px" height="auto" src="https://img.icons8.com/?size=100&id=8119&format=png&color=FFFFFF" alt="Logout">
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </nav>
    </div>

    <!-- Offcanvas para "Como Funciona?" -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">PAINEL DO SITE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <p>Surgiu alguma dúvida ou busca suporte?</p>
        <p>Entre em contato com nossa equipe de suporte através do e-mail: <a href="mailto:pereiraagenciaweb@gmail.com">pereiraagenciaweb@gmail.com</a></p>
        <div class="container mt-5">
          <h2>Principais Dúvidas e Funcionalidades</h2>
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">O que é?</button>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Como Funciona?</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Acesso</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Benefícios</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                <h3>O que é?</h3>
                <p>Um painel de controle de um site é uma interface administrativa que permite aos usuários gerenciar e configurar diferentes aspectos do site.</p>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                <h3>Como funciona?</h3>
                <p>Um painel de controle de um site funciona com MySQL ao se conectar a um banco de dados para armazenar e gerenciar informações. Ele utiliza consultas SQL para criar, ler, atualizar e excluir dados.</p>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                <h3>Acesso</h3>
                <p>Para acessar o painel, você deve ter credenciais de login válidas. Acesse com seu nome de usuário e senha.</p>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                <h3>Benefícios</h3>
                <p>Eficiência, centralização e redução de erros são apenas alguns dos benefícios ao usar o painel de controle do site.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    
    Painel::carregarPagina();
    
    ?>

    <!-- Rodapé -->



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
