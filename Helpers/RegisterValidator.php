<?php

 require_once(__DIR__.'\..\ViewModels\RegisterViewModel.php');

class RegisterValidator
{
    public function validate(RegisterViewModel $model) : array
    {
        $errors = array();

        if (!$this->validateEmail($model->email)) {
            array_push($errors, 'The email is not in the correct format!');
        }
        if (strlen($model->username) < 3) {
            array_push($errors, 'The username should be at least 3 charcters!');
        }
        if (strcasecmp($model->confirmPassword, $model->password) != 0) {
            array_push($errors, 'The entered passwords are not correct!');
        }
        if (strlen($model->password)<6) {
            array_push($errors, 'The password should be at least 6 charcters!');
        }

        return  $errors;
    }
    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return  true;
        }
    }
}
?>
