<?php
require_once(__DIR__.'\..\data\TasksManager.php');
require_once(__DIR__.'\..\data\UserManager.php');
require_once(__DIR__.'\..\data\UserTaskManager.php');
require_once(__DIR__.'\..\data\ProjectManager.php');
require_once(__DIR__.'\..\factories\ConnectionFactory.php');

class DataFactory{
    
    public static function createUserManager() : UserManager {
        $connection = ConnectionFactory::create();
        $manager = new UserManager($connection);

        return  $manager;
    }

    public static function createTaskManager() : TasksManager {
        $connection = ConnectionFactory::create();
        $manager = new TasksManager($connection);

        return  $manager;
    }
    public static function createProjectManager() : ProjectManager {
        $connection = ConnectionFactory::create();
        $manager = new ProjectManager($connection);

        return  $manager;
    }
    public static function createUserTaskManager() : UserTaskManager {
        $connection = ConnectionFactory::create();
        $manager = new UserTaskManager($connection);

        return  $manager;
    }
}

?>