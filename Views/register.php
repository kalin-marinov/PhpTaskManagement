<?php
  $model = new RegisterViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>


<form action="/Pages/register.php/" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username" maxlength="40" minLength="3" required  value="<?=$model->username ?>" />
            
             <label name="fullName">Full Name</label>
             <input type="text" name="fullName" maxlength="50" minLength="3"  value="<?=$model->fullName ?>"  />
            
             <label name="email">Email</label>
             <input type="email" name="email" required  value="<?=$model->email ?>" />
            
             <label name="password">Password</label>
             <input type="password" name="password" required/>
            
             <label name="confirmPassword">Confirm Password</label>
             <input type="password" name="confirmPassword" required />
             
             <input type="submit" value="Register" /> 
             <p> <?= $model->errors ?> </p>
</form>
