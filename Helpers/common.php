<?php
define('ROOTPATH', __DIR__);

class Page{
    
    public static function Redirect(string $url, bool $permanent = false) : void
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    
    public static function View(ViewModelBase $viewModel, string $layout = null) : void {
        $_VIEW = $viewModel->viewPath;
        $_MODEL = $viewModel;
        
        if(isset($layout)){
            include($layout);
        }else{
            include('..\Views\layout.php'); // default $layout;
        }
        
        exit();
    }
}


?>