<?php

require('..\data\UserManager.php');
require('..\factories\ConnectionFactory.php');

$connection =  ConnectionFactory::create();
$userProvider = new UserManager($connection);

$username = $password = $email = $fullName = $confirm = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = modify_input($_POST["username"]);
    $password = modify_input($_POST["password"]);
    $email = modify_input($_POST["loginEmail"]);
    $fullName = modify_input($_POST["fullName"]);
    $confirm = modify_input($_POST["confirmPassword"]);

$errors = array();

if(!validateEmail($email))
{
    array_push($errors,'The email is not in the correct format!');
}
if(strlen($username) < 3)
{
    array_push($errors,'The username should be at least 3 charcters!');
}
if(strcasecmp($confirm,$password) != 0)
{
    array_push($errors,'The entered passwords are not correct!');
}
if(strlen($password)<6)
{
    array_push($errors,'The password should be at least 6 charcters!');
}

if(count($errors)>0)
{
    $reg = (object) array(
    'userName' => $username,
    'email' => $email,
    'fullName' => $fullName,
    'errors' => json_encode($errors)
    );
    
}
else
{
    $newUser = new User($username,$fullName,$email);
   $registered =  $userProvider->createUser($newUser,$password);
   if(strcasecmp($registered,"success. affected 1 entries") == 0)
{
    $reg = (object) array(
        'userName' => $username
    );

   $_VIEW = '..\Views\Registered.php';
    include('..\Views\LoginLayout.php');   
    return;
}
else
{
    array_push($errors,'Something went wrong! Please try again!');
    $reg = (object) array(
        'userName' => $username,
        'email' => $email,
        'fullName' => $fullName,
        'errors' => json_encode($errors)
    );
}
}
}

function modify_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
    }

function validateEmail($email)
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
 return false;
else
    return  true;
}
  // Return View
    $_VIEW = '..\Views\register.php';
    include('..\Views\LoginLayout.php');
?>