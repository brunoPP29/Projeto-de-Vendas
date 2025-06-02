<?php

require('/opt/lampp/htdocs/projeto_vendas/config.php');

if (Painel::logado() == false) {
  include('login.php');
} else {
  include('main.php');
}

?>






