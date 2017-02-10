<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');

$projectManager = DataFactory::createProjectManager();
$projectKey = $_GET["key"];
$result = $projectManager->removeProject($projectKey);
    Page::Redirect("allProjects.php");
?>