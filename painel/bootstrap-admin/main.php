<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de controle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="./estilo/style.css" rel="stylesheet" type="text/css"> 

</head>
  <body>
    <div class="nav-bar1">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="
    <?php  echo INCLUDE_PATH; ?>">Painel BOOTSTRAP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Equipe
  </button>
  <ul class="dropdown-menu dropdown-menu-animated">
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>cadastro-equipe">Cadastrar Equipe</a></li>
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>editar-equipeAny">Editar Equipe</a></li>
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>listar-equipe">Listar Equipe</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Logins
  </button>
  <ul class="dropdown-menu dropdown-menu-animated">
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>cadastro-login">Cadastrar Login</a></li>
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>editar-LoginAny">Editar Login</a></li>
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>listar-login">Listar Logins</a></li>
  </ul>
</div>

      </ul>
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



<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">PAINEL DO SITE</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Surgiu alguma dúvida ou busca suporte?</p>
    <p>Entre em contato com nossa equipe de suporte através do e-mail: <a href="mailto:pereiraagenciaweb@gmail.com">pereiraagenciaweb@gmail.com</a>
    <div class="container mt-5">
    <h2>Principais Dúvidas e Funcionalidades</h2>

    <div class="d-flex align-items-start">
      <div class="nav flex-column nav-pills me-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Oque é?</button>
      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Como Funciona?</button>
      <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Acesso</button>
      <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Benefícios</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
        <h3>Oque é?</h3>  
      Um painel de controle de um site é uma interface administrativa que permite aos usuários gerenciar e configurar diferentes aspectos do site. Ele pode incluir funcionalidades como gerenciamento de conteúdo, usuários, configurações, relatórios e muito mais. É uma ferramenta essencial para facilitar a administração e manutenção do site.</div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <h3>Como funciona?</h3>  
      Um painel de controle de um site funciona com MySQL ao se conectar a um banco de dados para armazenar e gerenciar informações. Ele utiliza consultas SQL para criar, ler, atualizar e excluir dados. Por exemplo, você pode armazenar informações de usuários, conteúdo do site, configurações e muito mais no banco de dados.</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
      <h3>Acesso</h3>  
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sit dolore consectetur nisi veniam ratione eius enim accusantium nesciunt nam doloribus esse, perferendis hic a deserunt, quasi officiis repudiandae natus.</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
      <h3>Benefícios</h3>  
      Eficiência: Reduz o tempo necessário para gerenciar tarefas do site, pois a maioria das configurações pode ser feita com apenas alguns cliques.<br>

Centralização: Consolida múltiplas ferramentas e funcionalidades em um único local, facilitando o gerenciamento do site.<br>

Redução de erros: A interface gráfica ajuda a evitar erros manuais ao configurar o servidor ou o site.<br>

Suporte e Manutenção: Muitos painéis de controle oferecem funcionalidades para facilitar a manutenção do servidor, incluindo backups automáticos, monitoramento e reparação de erros. <br>   </div>
  </div>
</div>
</div>
  </div>
</div><!-- offcanvas -->
<?php


Painel::carregarPagina();


?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>