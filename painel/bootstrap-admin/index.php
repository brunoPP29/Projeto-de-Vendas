<?php

require_once('/opt/lampp/htdocs/bootstrap-admin/config.php');

if (Painel::logado() == false) {
  include('login.php');
} else {
  include('main.php');
}

?>






