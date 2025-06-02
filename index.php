<!DOCTYPE html>
<?php

    include('config.php');
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pereira Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="./estilo/style.css">
</head>
<body>
    <!-- Header com barra de navegação -->
    <header class="header-dark">
        <div class="header-top py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="header-contact d-flex align-items-center">
                            <span class="me-3"><i class="fas fa-phone-alt me-2"></i> (11) 9999-9999</span>
                            <span><i class="fas fa-envelope me-2"></i> exemplo@gmail.com</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="header-social">
                            <a href="#" class="me-2"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span class="brand-text">Pereira<span class="text-primary">Web</span></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
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
    <section class="banner">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="display-5 fw-bold">Soluções completas para seu negócio</h1>
                    <p class="lead">Encontre os melhores produtos e serviços com preços imbatíveis.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Comprar agora</button>
                        <button type="button" class="btn btn-outline-dark btn-lg px-4">Saiba mais</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="" class="img-fluid rounded banner-img" alt="Banner promocional">
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de planos -->
    <section class="planos py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Nossos Planos</h2>
                <p class="section-subtitle">Escolha o plano ideal para o seu negócio</p>
            </div>
            <div class="row">
                <!-- Plano Básico -->
                 <?php
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.planos`");
                    $sql->execute();
                    $planos = $sql->fetchAll();
                    if (!$planos) {
                        echo '<div class="alert alert-danger">Nenhum plano encontrado!</div>';
                        exit;
                    }else {
                        foreach ($planos as $key => $value) {
                            # code...
                    
                 
                 ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 plano-card">
                        <div class="card-header text-center py-3">
                            <h3 class="plano-titulo"><?php echo $value['nome']; ?></h3>                       
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-price text-center">R$
                                <?php echo number_format($value['valor'], 2, ',', '.'); ?>    
                            
                            
                            <span>/vitalício</span></h4>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-check me-2 text-primary"></i><?php echo $value['item1']; ?></li>
                                <li><i class="fas fa-check me-2 text-primary"></i><?php echo $value['item2']; ?></li>
                                <li><i class="fas fa-check me-2 text-primary"></i><?php echo $value['item3']; ?></li>
                                <li><i class="fas fa-check me-2 text-primary"></i><?php echo $value['item4']; ?></li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary mt-auto">Contratar</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
    </section>

    <!-- Seção de contato -->
    <section class="contato py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title">Entre em Contato</h2>
                    <p class="mb-4">Estamos prontos para atender suas necessidades e responder suas dúvidas.</p>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome completo">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected>Selecione o assunto</option>
                                <option>Dúvidas sobre planos</option>
                                <option>Suporte técnico</option>
                                <option>Vendas</option>
                                <option>Outros</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Sua mensagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                    </form>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="contato-info p-4 h-100">
                        <h3>Informações de Contato</h3>
                        <p class="mb-4">Estamos disponíveis para atendê-lo pelos seguintes canais:</p>
                        <div class="d-flex mb-3">
                            <div class="contato-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Endereço</h5>
                                <p>Av. Paulista, 1000 - São Paulo, SP</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contato-icon me-3">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h5>Telefone</h5>
                                <p>(11) 9999-9999</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contato-icon me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>contato@vendamax.com.br</p>
                            </div>
                        </div>
                        <div class="social-media mt-4">
                            <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>VendaMax</h5>
                    <p>Soluções completas para seu negócio online. Desde 2010 ajudando empresas a crescerem no mercado digital.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Produtos</a></li>
                        <li><a href="#">Planos</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5>Suporte</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Central de Ajuda</a></li>
                        <li><a href="#">Tutoriais</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5>Newsletter</h5>
                    <p>Receba nossas novidades e ofertas exclusivas.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Seu email">
                        <button class="btn btn-primary" type="button">Inscrever</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 VendaMax. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="payment-methods">
                        <i class="fab fa-cc-visa me-2"></i>
                        <i class="fab fa-cc-mastercard me-2"></i>
                        <i class="fab fa-cc-amex me-2"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
