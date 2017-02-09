
 
 <form action="/Pages/login.php/" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username" required value="<?= $username ?>" />
             <label name="password">Password</label>
             <input type="password" name="password" required/>
             <input type="submit" value="Login" /> 
 </form>
