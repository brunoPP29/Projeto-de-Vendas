    <?php
        use Sessão1\class1;

        session_start();
        date_default_timezone_set('America/Sao_Paulo');
        $autoload = function($class) {
            include('classesPanel/'.$class.'.php');
        };
        spl_autoload_register($autoload);

        define('INCLUDE_PATH', 'http://localhost/bootstrap-admin/');
        define('INCLUDE_PATH_PAINEL', 'http://localhost/bootstrap-admin/');
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'painel');
        define('BASE_DIR_PAINEL',__DIR__.'/boostrap-admin');



    ?>