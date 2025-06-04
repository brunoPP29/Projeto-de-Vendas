<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Modo Escuro (PHP Intacto)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --main-bg-color-light: #f8f9fa;
            --card-bg-color-light: #ffffff;
            --text-color-light: #212529;
            --label-color-light: #495057;
            --input-bg-light: #ffffff;
            --input-border-light: #ced4da;
            --input-text-light: #495057;
            --input-focus-border-light: #86b7fe;
            --input-focus-shadow-light: rgba(0, 123, 255, 0.25);
            --btn-primary-bg-light: #0d6efd;
            --btn-primary-border-light: #0d6efd;
            --btn-primary-text-light: #ffffff;
            --btn-primary-hover-bg-light: #0b5ed7;
            --btn-primary-hover-border-light: #0a58ca;
            --header-bg-light: #212529;
            --header-text-light: #ffffff;
            --shadow-color-light: rgba(0, 0, 0, 0.15);
            --alert-success-bg-light: #d1e7dd;
            --alert-success-text-light: #0f5132;
            --alert-danger-bg-light: #f8d7da;
            --alert-danger-text-light: #842029;
            --alert-warning-bg-light: #fff3cd;
            --alert-warning-text-light: #664d03;

            --main-bg-color-dark: #1a1d20;
            --card-bg-color-dark: #2c3034;
            --text-color-dark: #e9ecef;
            --label-color-dark: #adb5bd;
            --input-bg-dark: #343a40;
            --input-border-dark: #495057;
            --input-text-dark: #f8f9fa;
            --input-focus-border-dark: #0d6efd;
            --input-focus-shadow-dark: rgba(13, 110, 253, 0.5);
            --btn-primary-bg-dark: #0d6efd;
            --btn-primary-border-dark: #0d6efd;
            --btn-primary-text-dark: #ffffff;
            --btn-primary-hover-bg-dark: #287ffc;
            --btn-primary-hover-border-dark: #3b8aff;
            --header-bg-dark: #343a40;
            --header-text-dark: #f8f9fa;
            --shadow-color-dark: rgba(255, 255, 255, 0.1);
            --alert-success-bg-dark: #0a3622;
            --alert-success-text-dark: #a3cfbb;
            --alert-danger-bg-dark: #58151c;
            --alert-danger-text-dark: #f1b0b7;
            --alert-warning-bg-dark: #664d03;
            --alert-warning-text-dark: #ffe58f;
        }

        body {
            background-color: var(--main-bg-color-light);
            color: var(--text-color-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .contact-wrapper .card {
            background-color: var(--card-bg-color-light);
            box-shadow: 0 0.5rem 1rem var(--shadow-color-light) !important;
            border: none !important;
            transition: background-color 0.3s ease;
        }

        .contact-wrapper .card-header {
            background-color: var(--header-bg-light) !important;
            color: var(--header-text-light) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .contact-wrapper .form-label {
             color: var(--label-color-light) !important;
             transition: color 0.3s ease;
        }

        .contact-wrapper .form-control,
        .contact-wrapper .form-select {
            background-color: var(--input-bg-light);
            border: 1px solid var(--input-border-light);
            color: var(--input-text-light);
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .contact-wrapper .form-control::placeholder {
            color: var(--label-color-light);
            opacity: 0.7;
        }

        .contact-wrapper .form-control:focus,
        .contact-wrapper .form-select:focus {
            border-color: var(--input-focus-border-light);
            box-shadow: 0 0 0 0.25rem var(--input-focus-shadow-light);
            outline: none;
            background-color: var(--input-bg-light);
            color: var(--input-text-light);
        }

        .contact-wrapper .btn-primary {
            background-color: var(--btn-primary-bg-light) !important;
            border-color: var(--btn-primary-border-light) !important;
            color: var(--btn-primary-text-light) !important;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, color 0.15s ease-in-out;
        }

        .contact-wrapper .btn-primary:hover {
            background-color: var(--btn-primary-hover-bg-light) !important;
            border-color: var(--btn-primary-hover-border-light) !important;
            color: var(--btn-primary-text-light) !important;
        }

        .contact-wrapper .alert-success {
            color: var(--alert-success-text-light) !important;
            background-color: var(--alert-success-bg-light) !important;
            border-color: var(--alert-success-bg-light) !important;
        }
        .contact-wrapper .alert-danger {
            color: var(--alert-danger-text-light) !important;
            background-color: var(--alert-danger-bg-light) !important;
            border-color: var(--alert-danger-bg-light) !important;
        }
        .contact-wrapper .alert-warning {
            color: var(--alert-warning-text-light) !important;
            background-color: var(--alert-warning-bg-light) !important;
            border-color: var(--alert-warning-bg-light) !important;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: var(--main-bg-color-dark);
                color: var(--text-color-dark);
            }
            .contact-wrapper .card {
                background-color: var(--card-bg-color-dark);
                box-shadow: 0 0.5rem 1rem var(--shadow-color-dark) !important;
            }
            .contact-wrapper .card-header {
                background-color: var(--header-bg-dark) !important;
                color: var(--header-text-dark) !important;
            }
            .contact-wrapper .form-label {
                 color: var(--label-color-dark) !important;
            }
            .contact-wrapper .form-control,
            .contact-wrapper .form-select {
                background-color: var(--input-bg-dark);
                border-color: var(--input-border-dark);
                color: var(--input-text-dark);
            }
            .contact-wrapper .form-control::placeholder {
                color: var(--label-color-dark);
            }
            .contact-wrapper .form-control:focus,
            .contact-wrapper .form-select:focus {
                border-color: var(--input-focus-border-dark);
                box-shadow: 0 0 0 0.25rem var(--input-focus-shadow-dark);
                background-color: var(--input-bg-dark);
                color: var(--input-text-dark);
            }
            .contact-wrapper .form-select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23e9ecef' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            }
            .contact-wrapper .btn-primary {
                background-color: var(--btn-primary-bg-dark) !important;
                border-color: var(--btn-primary-border-dark) !important;
                color: var(--btn-primary-text-dark) !important;
            }
            .contact-wrapper .btn-primary:hover {
                background-color: var(--btn-primary-hover-bg-dark) !important;
                border-color: var(--btn-primary-hover-border-dark) !important;
                color: var(--btn-primary-text-dark) !important;
            }
            .contact-wrapper .alert-success {
                color: var(--alert-success-text-dark) !important;
                background-color: var(--alert-success-bg-dark) !important;
                border-color: var(--alert-success-bg-dark) !important;
            }
            .contact-wrapper .alert-danger {
                color: var(--alert-danger-text-dark) !important;
                background-color: var(--alert-danger-bg-dark) !important;
                border-color: var(--alert-danger-bg-dark) !important;
            }
            .contact-wrapper .alert-warning {
                color: var(--alert-warning-text-dark) !important;
                background-color: var(--alert-warning-bg-dark) !important;
                border-color: var(--alert-warning-bg-dark) !important;
            }
        }
    </style>
</head>
<body>

<div class="contact-wrapper">
    <div class="container my-5 d-flex justify-content-center">
      <div class="card shadow-lg border-0 rounded-4" style="max-width: 800px; width: 100%;">
        <div class="card-header bg-dark text-white rounded-top-4 py-3">
          <h4 class="mb-0 text-center"><i class="bi bi-envelope-at me-2"></i>Envie sua mensagem</h4>
        </div>
        <div class="card-body p-4">

          <?php
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviarMensagem'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            $assunto = htmlspecialchars(trim($_POST['assunto']));
            $mensagem = htmlspecialchars(trim($_POST['mensagem']));

            if (!empty($email) && !empty($mensagem)) {
              try {
                $pdo = MySql::conectar();
                $sql = $pdo->prepare("INSERT INTO `tb_admin.messages`VALUES (null, ?, ?, ?)");
                $sql->execute([$email, $assunto, $mensagem]);

                if ($sql->rowCount() === 1) {
                  echo '<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Mensagem enviada com sucesso! Você será redirecionado...</div>';
                    echo '<script>setTimeout(function(){ window.location.href = "' . INCLUDE_PATH . '"; }, 2000);</script>';
                  exit;
                
                } else {
                  echo '<div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Erro ao enviar a mensagem. Tente novamente.</div>';
                }
              } catch (PDOException $e) {
                echo '<div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Erro no banco de dados.</div>';
              }
            } else {
              echo '<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Preencha os campos obrigatórios.</div>';
            }
          }
          ?>

          <form method="post" class="row g-4">
            <div class="col-md-6">
                                <label style="color: var(--text-light); font-weight: bold;"   for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-md-6">
              <label style="color: var(--text-light);" for="assunto" class="form-label fw-semibold">Assunto</label>
                <select name="assunto" class="form-select">
                      <option selected>Selecione o assunto</option>
                      <option>Preciso de um projeto</option>
                      <option>Suporte técnico</option>
                      <option>Outros</option>
                </select>        </div>
            <div class="col-12">
              <label style="color: var(--text-light);" for="mensagem" class="form-label fw-semibold">Mensagem <span class="text-danger">*</span></label>
                                <textarea name="mensagem" class="form-control" rows="4" placeholder="Sua mensagem"></textarea>
            </div>
            <div class="col-12 text-end">
              <button type="submit" name="enviarMensagem" class="btn btn-primary btn-lg px-4 rounded-pill">
                <i class="bi bi-send me-1"></i>Enviar
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
