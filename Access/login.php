<?php

require('..\data\UserManager.php');
require('..\factories\ConnectionFactory.php');

$connection =  ConnectionFactory::create();
$userProvider = new UserManager($connection);

$username = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$user = $userProvider->signIn($username,$password);

//the user should be redirected to the dashboard
?>