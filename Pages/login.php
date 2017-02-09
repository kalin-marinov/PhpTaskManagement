<?php
    require_once('..\data\UserManager.php');
    require_once('..\factories\ConnectionFactory.php');
    require_once('..\helpers\common.php');
    require_once('..\ViewModels\LoginViewModel.php');

    $connection =  ConnectionFactory::create();
    $userProvider = new UserManager($connection);
    
    $model = new LoginViewModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model->fromArray($_POST);

        $res = $userProvider->signIn($model->username, $model->password);

        if ($res->username != null) {
            $userProvider->prepareSession($res);
            Page::Redirect('/Pages/Dashboard.php');
        } else{
            $model->errors = "Invalid username / password";
        }
     } 


    Page::View($model);
?>
