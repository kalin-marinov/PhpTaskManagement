<?php

 require_once(__DIR__.'\..\ViewModels\TaskViewModel.php');

class ProjectValidator
{
    public function validate(TaskViewModel $model) : array
    {
        $errors = array();

        if (!empty($model->taskName)) {
            array_push($errors, 'The task name should be added!');
        }
        if (!empty($model->taskDescription)) {
            array_push($errors, 'The task description should be added!');
        }      

        return  $errors;
    }  
}
?>