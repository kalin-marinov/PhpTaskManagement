<?php
session_start();
require_once('..\data\UserManager.php');
require('..\factories\ConnectionFactory.php');

$connection =  ConnectionFactory::create();
$userProvider = new UserManager($connection);

$userProvider->logOut();
?>