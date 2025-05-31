<?php

class Painel{
    public static function carregarPagina(){
            if (isset($_GET['url'])) {
                $url = explode('/',$_GET['url']);
                if (file_exists('pages/'.$url[0].'.php')) {
                    include('pages/'.$url[0].'.php');
                }else {
                    
                }
            }else {
                include('pages/dashboard.php');
            }
        }
        public static function logado(){
            if (isset($_SESSION['login'])) {
                return true;
            } else {
                return false;
            }
        }
        public static function loggout(){
            session_destroy();
            setcookie('lembrar','true',time()-1,'/');
            header('Location: '.INCLUDE_PATH);
            exit;
        }
    public static function uploadFileEquipe($file){
        $formatoArquivo = explode('.',$file['name']);
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
        if(move_uploaded_file($file['tmp_name'], 'uploadsEqui/'.$imagemNome)){
            return $imagemNome;
        }else {
            return false;
        }
    }
    public static function alertErro($mensagem) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro:</strong> ' . htmlspecialchars($mensagem) . '
            <button  style="margin: 0px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>';
    }
    
    public static function alertSucesso($mensagem) {
        echo '
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso:</strong> ' . htmlspecialchars($mensagem) . '
            <button style="margin: 0px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>';
    }
    

}

?>