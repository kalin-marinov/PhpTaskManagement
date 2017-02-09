<?php
    require_once('..\data\UserManager.php');
    require_once('..\factories\ConnectionFactory.php');
    require_once('..\helpers\common.php');
    require_once('..\ViewModels\LoginViewModel.php');

    $connection =  ConnectionFactory::create();
    $userProvider = new UserManager($connection);
    
    $model = new LoginViewModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $model->username = $_POST["username"];
        $model->password = $_POST["password"];

        $res = $userProvider->signIn($username, $password);

        if ($res->username != null) {
            Page::Redirect('/Pages/Dashboard.php');
        } else{
            $error = "Invalid username / password";
        }
     } 


    Page::View($model);
?>
