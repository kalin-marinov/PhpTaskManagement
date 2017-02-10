<?php
require_once(__DIR__.'/../helpers/common.php');
Page::Authorize();

require_once('..\factories\DataFactory.php');

$userProvider = DataFactory::createUserManager();
$userProvider->logOut();

Page::Redirect('/pages/login.php');

?>