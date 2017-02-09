<?php
    $model = new LoginViewModel();
    if(iset($_MODEL)) $model = $_MODEL;

?>
 
 <form action="/Pages/login.php/" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username" required value="<?= $model->username ?>" />
             <label name="password">Password</label>
             <input type="password" name="password" required/>
             <input type="submit" value="Login" /> 
             
             
 </form>
