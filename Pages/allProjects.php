<?php
require_once(__DIR__.'\..\helpers\common.php');
Page::Authorize();

require_once(__DIR__.'\..\factories\DataFactory.php');

$projectManager = DataFactory::createProjectManager();
$allProjects = $projectManager->getProjects();

Page::View($allProjects, 'allProjects');

?>