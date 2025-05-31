<?php

if (isset($_COOKIE['lembrar'])) {
  $login = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';
  $password = isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '';
 $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE login = ? AND password = ?");
  $sql->execute(array($login, $password));
  if ($sql->rowCount() == 1){
     $info = $sql->fetch();
    $_SESSION['login'] = true;
    $_SESSION['user'] = $login;
     $_SESSION['password'] = $password;
     header('Location: ' . INCLUDE_PATH);
     exit();
    die();
}
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Painel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #6c63ff, #3f3d56);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-container {
      background-color: #fff;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
    }

    .btn-primary {
      background-color: #6c63ff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #584ee0;
    }

    .form-check-label {
      margin-left: 0.25rem;
    }
  </style>
</head>
<body>


<?php

?>
<?php

if (isset($_POST['acao'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE login = ? AND password = ?");
    $sql->execute(array($login, $password));
    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $login;
        $_SESSION['password'] = $password;

        if (isset($_POST['lembrar']) && !empty($login) && !empty($password)) {
          setcookie('lembrar', 'true', time() + 60 * 60 * 24 * 7, '/');
          setcookie('login', $login, time() + (86400 * 30), "/");
          setcookie('password', $password, time() + (86400 * 30), "/");
        }
        header('Location: http://localhost/bootstrap-admin/');

      exit();
    } else {
        echo '<div style="display: block !important; position: absolute; top: 50px; width: 50%" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Insira o login correto!</strong>
    </div>
    <div class="toast-body">
      O login ou a senha estão incorretos. Tente novamente.
    </div>
  </div>
</div>'; 

    }
}


?>

  <div class="login-container">
    <h2 class="text-center mb-4">Entrar</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input name="login" type="text" class="form-control" id="username" placeholder="Digite seu usuário" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
      </div>
      <div class="mb-3 form-check">
        <input name="lembrar" type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Lembrar senha</label>
      </div>
      <input value="Entrar" name="acao" type="submit" class="btn btn-primary w-100"></input>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
