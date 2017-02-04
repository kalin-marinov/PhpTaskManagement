

<?php

    include('data\TasksDataProvider.php');
    include('data\ConnectionFactory.php');
    include('data\models\task.php');

    $connection = (new ConnectionFactory())->create();
    $taskProvider = new TasksDataProvider($connection);

    $taskProvider->addTask(array('key' => "T1", 'name' => "firstTask", 'description' => "write some php"));
    $tasks = $taskProvider->getTasks();
    

    var_dump($tasks);
?>