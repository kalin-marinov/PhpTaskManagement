<?php
require_once(__DIR__.'/../helpers/common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');

$manager = DataFactory::createUserTaskManager();
$userM = DataFactory::createUserManager()();

$currentUser = $userM->getCurrentUser();

$allTasks = $manager->getTasksForUser($currentUser->username);

?>