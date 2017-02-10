<?php

 require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

class TaskValidator
{
    public function validate(TaskViewModel $model) : array
    {
        $errors = array();

        if(empty($model->taskKey))
            array_push($errors, 'The task key is mandatory field!');
        if(empty($model->projectKey))
            array_push($errors, 'The task should be part of a project!');
        if (empty($model->taskName))
            array_push($errors, 'The task name should be added!');
        if (empty($model->taskDescription)) 
            array_push($errors, 'The task description should be added!');

        return  $errors;
    }  
}
?>