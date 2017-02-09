<?php
require_once(__DIR__.'\..\factories\DataFactory.php');
require_once(__DIR__.'\..\helpers\common.php');
require_once(__DIR__.'\..\ViewModels\RegisterViewModel.php');
require_once(__DIR__.'\..\helpers\RegisterValidator.php');

$userProvider = DataFactory::createUserManager();

$validator = new RegisterValidator();
$model = new RegisterViewModel();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $model->fromArray(Page::modifyAllInputs($_POST));
    $errors = $validator->validate($model);   

    if (count($errors) > 0) {
        $model->errors = json_encode($errors);
    } else {
        $newUser = new User($model->username, $model->fullName, $model->email);
        $result =  $userProvider->createUser($newUser, $model->password);
        
        if (strcasecmp($result, "success. affected 1 entries") == 0) {
            $successModel = new ViewModelBase("..\Views\registered.php");
            Page::View($successModel);
        }

        array_push($errors, 'User already in use!');
        $model->errors = json_encode($errors);
    }
}
 Page::View($model, '..\Views\loginLayout.php');



  // Return View
