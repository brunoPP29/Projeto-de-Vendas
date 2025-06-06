<!DOCTYPE html>
<?php

include('config.php');



?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PereiraCode</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
</head>
<?php   
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
    if ($url[0] == 'contato') {
        include('contato.php');
        die();
}

    }


?>
<body>
    <!-- Header com barra de navegação -->
    <header class="header-dark">
        <div class="header-top py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="header-social">
                            <?php $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.contatoInfo`"); $sql->execute(); $infos = $sql->fetchAll(); foreach ($infos as $key => $info) {
                                # code...
                            }?>
                            <a href="https://wa.me/<?php echo $info['zap']; ?>" class="me-2"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://instagram.com/<?php echo trim(str_replace('@', '', $info['insta'])); ?>" class="me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="brand-text">   <span>&lt;</span>Pereira<span class="text-primary">Code</span></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="painel" class="btn btn-primary rounded-pill">
                            <i class="fas fa-user-cog me-1"></i> Painel
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Banner principal -->
     <?php  $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.banner`");  $sql->execute(); $info = $sql->fetchAll(); 
    if (!$info) {
        echo '<div class="alert alert-danger">Nenhum banner encontrado!</div>';
        exit;
    } else {
        foreach ($info as $key => $value) {
            ?>
    <section class="banner">
        <div class="container py-4">
            <?php
                if (isset($_POST['acao'])) {
                    $email = $_POST['email'];
                    $assunto = $_POST['assunto'];
                    $message = $_POST['message'];
            
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.messages` VALUES (null,?,?,?)");
                    $sql->execute(array($email, $assunto, $message));
                if ($sql->rowCount() == 1) {
                    
                    echo '
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Mensagem enviada com sucesso!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>    
</div>
<script>
  var toastEl = document.getElementById("successToast");
  if (toastEl) {
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
  }
</script>
';
                }
            }
                    # code...
                
            
            ?>
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="display-5 fw-bold"><?php  echo $value['title']   ?></h1>
                    <p class="lead"><?php  echo $value['subtitle']   ?></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                        <form method="post">

                            <button name="contratar" type="submit" class="btn btn-primary btn-lg px-4 me-md-2">Contratar agora</button>
                        </form>
                    </div>
                </div>
                <div style="margin-top: 15px;" class="col-md-6">
                    <img src="<?php echo INCLUDE_PATH?>painel/uploadsBanner/<?php  echo $value['image']   ?>" class="img-fluid rounded banner-img" alt="Banner promocional">
                </div>
            </div>
        </div>
    </section>
    <?php } } ?>


    <section id="portfolio-section-unique" class="py-5 portfolio-bg-light-unique">
    <div class="container portfolio-container-unique">
        <h2 class="text-center mb-5 portfolio-title-unique">Meus Projetos</h2>

        <div class="row g-4 portfolio-grid-unique">

<?php

    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.projetos`");
    $sql->execute();


    $projeto = $sql->fetchAll();
    foreach ($projeto as $key => $value) {
        $linkgit = $value['linkgit'];
        $linksite = $value['linksite'];
        # code...


?>

            <!-- Projeto 1 -->
            <div class="col-lg-4 col-md-6 portfolio-item-col-unique">
                <div class="card h-100 shadow-sm portfolio-card-unique portfolio-card-1-unique">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploadsProj/<?php  echo  $value['img'];    ?>" class="card-img-top portfolio-img-unique" alt="Visualização do Projeto 1">
                    <div class="card-body d-flex flex-column portfolio-card-body-unique">
                        <h5 class="card-title portfolio-project-title-unique"><?php echo $value['nome']?></h5>
                        <p class="card-text portfolio-project-desc-unique flex-grow-1"><?php echo $value['descricao']?></p>
                        <div class="mt-auto portfolio-card-footer-unique text-center">
                            <?php
                            
                            if ($linksite) {
                                echo '<a href="'.$linksite.'" class="btn btn-outline-primary btn-sm portfolio-link-btn-unique portfolio-view-btn-unique me-2">Ver Projeto <i class="bi bi-arrow-right-short"></i></a>';
                            }
                            if ($linkgit) {
                                echo '<a href="'.$linkgit.'" class="btn btn-outline-secondary btn-sm portfolio-link-btn-unique portfolio-code-btn-unique"><i class="bi bi-github"></i> Código</a>';
                            }
                             
                                
                            
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                            <?php  } ?>

            <!-- Adicione mais projetos aqui seguindo o mesmo padrão -->

        </div>
    </div>
</section>

    <!-- Seção de contato -->
    <section class="contato py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title">Quero um projeto!</h2>
                    <p class="mb-4">Estamos prontos para atender suas necessidades e responder suas dúvidas.</p>
                    <form method="post">
                        <div class="mb-3">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                        <label for="email" class="form-label">Qual o assunto?</label>
                            <select name="assunto" class="form-select">
                                <option selected>Selecione o assunto</option>
                                <option>Preciso de um projeto</option>
                                <option>Suporte técnico</option>
                                <option>Outros</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="email" class="form-label">Sua mensagem</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Sua mensagem"></textarea>
                        </div>
                        <button name="acao" type="submit" class="btn btn-primary">Enviar mensagem</button>
                    </form>
                </div>





                            <?php $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.contatoInfo`");
                    $sql->execute();
                    $contatoInfo = $sql->fetchAll();
                    if (!$contatoInfo) {
                        echo '<div class="alert alert-danger">Nenhuma informação de contato encontrada!</div>';
                        exit;
                    } else {
                        foreach ($contatoInfo as $key => $info) {
                            ?>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="contato-info p-4 h-100">
                        <h3>Informações de Contato</h3>
                        <p class="mb-4">Estamos disponíveis para atendê-lo pelos seguintes canais:</p>
                        <div class="d-flex mb-3">
                            <div class="contato-icon me-3">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h5>Whatsapp</h5>
                                <a style="color: var(--text-muted); text-decoration: none;" href="https://wa.me/<?php echo $info['zap']; ?>">Clique aqui para enviar uma menagem!</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contato-icon me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <a style="color: var(--text-muted); text-decoration: none;" href="mailto:<?php echo $info['email'];    ?>" >Envie um email aqui</a>
                            </div>
                        </div>
                            <div class="d-flex mb-3">
                                <div class="contato-icon me-3">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div>
                                    <h5>Instagram</h5>
                                    <a style="color: var(--text-muted); text-decoration: none;" href="https://instagram.com/<?php echo trim(str_replace('@', '', $info['insta'])); ?>">Siga-nos no Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php     } }  ?>
    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>PereiraCode</h5>
                    <p>Criando sites para a sua necessidade e com a cara da sua empresa!</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5>Suporte</h5>
                    <ul class="list-unstyled">
                        <li><a href="mailto:bruno762ix@gmail.com">Central de Ajuda</a></li>
                        <li><a href="mailto:bruno762ix@gmail.com">Contato de Suporte</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 PereiraCode. Todos os direitos reservados.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
