<?php
    require_once('..\data\UserManager.php');
    require_once('..\factories\ConnectionFactory.php');

    $connection =  ConnectionFactory::create();
    $userProvider = new UserManager($connection);

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $res = $userProvider->signIn($username, $password);

        if ($res->username != null) {
            Redirect('/Pages/Dashboard.php');
        } else{
            $error = "Invalid username / password";
        }
     } 

    // Return View
    $_VIEW = '..\Views\login.php';
    include('..\Views\layout.php');
     
?>
