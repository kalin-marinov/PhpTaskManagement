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

    public  static function modify_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    public static function modifyAllInputs(array $inputs) : array{        
        $mapFunc = Page::modify_input;
        return array_map($mapFunc, $arr);
    }
}


?>