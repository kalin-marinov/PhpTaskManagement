<?php
    session_start();
    require_once(__DIR__.'\..\factories\DataFactory.php');
    require_once(__DIR__.'\..\ViewModels\LoginViewModel.php');
    require_once(__DIR__.'\..\helpers\common.php');

    $userProvider = DataFactory::createUserManager();
    
    $model = new LoginViewModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model->fromArray($_POST);

        $res = $userProvider->signIn($model->username, $model->password);

        if ($res->username != null) {
            Page::Redirect('/Pages/Dashboard.php');
        } else{
            $model->errors = "Invalid username / password";
        }
     } 
    Page::View($model,'..\Views\loginLayout.php');
?>
