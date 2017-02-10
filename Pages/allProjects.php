<?php

    session_start();
    require_once(__DIR__.'\..\factories\DataFactory.php');

     $projectManager = DataFactory::createProjectManager();
     $allProjects = $projectManager->getProjects();
?>