    <?php
        use Sessão1\class1;

        session_start();
        date_default_timezone_set('America/Sao_Paulo');
        $autoload = function($class) {
            include('class/'.$class.'.php');
        };
        spl_autoload_register($autoload);

        define('INCLUDE_PATH', 'http://localhost/projeto_vendas/');
        define('INCLUDE_PATH_PAINEL', 'http://localhost/projeto_vendas/painel/');
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'vendasData');
        define('BASE_DIR_PAINEL',__DIR__.'/painel');



    ?>