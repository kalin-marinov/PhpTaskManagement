<?php

require('..\data\UserManager.php');
require('..\factories\ConnectionFactory.php');
require('..\data\models\user.php');

$connection =  ConnectionFactory::create();
$userProvider = new UserManager($connection);

$username = $password = $email = $fullName = $confirm = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = modify_input($_POST["username"]);
    $password = modify_input($_POST["password"]);
    $email = modify_input($_POST["loginEmail"]);
    $fullName = modify_input($_POST["fullName"]);
    $confirm = modify_input($_POST["confirmPassword"]);
}

function modify_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


$errors = array();

if(!validateEmail($email))
{
array_push($errors,'The email is not in the correct format!');
}
if(strlen($username) < 3)
{
    array_push($errors,'The username should be at least 3 charcters!');
}
if($confirm == $password)
{
    array_push($errors,'The entered passwords are not correct!');
}
if(strlen($password)<6)
{
array_push($errors,'The password should be at least 6 charcters!');  
}

function validateEmail($email)
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
 return false;
else
    return  true;
}

if(count($errors)>0)
{
    //display modal dialog with the erros
}
else
{
    $newUser = User($username,$fullName,$email);
    $userProvider->createUser($newUser,$password);
}

?>