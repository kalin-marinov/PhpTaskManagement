<?php
define('ROOTPATH', __DIR__);

class Page{
    
    public static function Redirect(string $url, bool $permanent = false) : void
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    
    public static function View($viewModel, string $viewPath = null, string $layout = null) : void {
        if(!isset($viewPath)){
            $viewPath = get_class($viewModel);
            $viewPath = str_ireplace("viewModel", "" ,$viewPath);
            $viewPath = str_ireplace("model", "" ,$viewPath);
        }
        
        $_VIEW = Page::PrepareViewPath($viewPath);
        $_MODEL = $viewModel;
        
        if(isset($layout)){
            include(Page::PrepareViewPath($layout));
        }else{
            include(__DIR__.'\..\Views\layout.php'); // default $layout;
        }
        
        exit();
    }
    
    
    public static function Authorize() : void
    {
        session_start();
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    
    
    public static function PrepareViewPath(string $viewPath) :string {
        if(strpos($viewPath, "Views") == false){
            $viewPath = __DIR__."/../Views/{$viewPath}";
        }
        if(strpos($viewPath, ".php") == false){
            $viewPath = "{$viewPath}.php";
        }
        return  $viewPath;
    }
    
    public  static function modify_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
    
    public static function modifyAllInputs(array $inputs) : array{
        $mapFunc = 'Page::modify_input';
        return array_map($mapFunc, $inputs);
    }
}


?>