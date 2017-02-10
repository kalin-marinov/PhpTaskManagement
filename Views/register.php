<?php
  $model = new RegisterViewModel();
if (isset($_MODEL)) {
    $model = $_MODEL;
}
?>


<form action="/Pages/register.php/" method="POST" class="centered top-spaced">
             <label for="username" class="required" >Username</label>
             <input type="text" name="username" maxlength="40" minLength="3" required  value="<?=$model->username ?>" placeholder="unique user name" />
            
             <label for="fullName">Full Name</label>
             <input type="text" name="fullName" maxlength="50" minLength="3"  value="<?=$model->fullName ?>"  placeholder="your full name" />
            
             <label for="email" class="required">Email</label>
             <input type="email" name="email" required  value="<?=$model->email ?>" placeholder="e-mail address" />
            
             <label for="password" class="required">Password</label>
             <input type="password" name="password" required placeholder="a strong password"  />
            
             <label for="confirmPassword" class="required" >Confirm Password</label>
             <input type="password" name="confirmPassword" required placeholder="repeat the password"  />
             
             <input type="submit" value="Register" /> 
             <p class='error-box'> <?= $model->errors ?> </p>
</form>
