<form action="/Pages/register.php/" method="POST">
             <label name="username">Username</label>
             <input type="text" name="username" maxlength="40" minLength="3" required  value="<?=$reg->userName ?>" />
             <label name="fullName">Full Name</label>
             <input type="text" name="fullName" maxlength="50" minLength="3"  value="<?=$reg->fullName ?>"  />
             <label name="email">Email</label>
             <input type="email" name="loginEmail" required  value="<?=$reg->email ?>" />
             <label name="password">Password</label>
             <input type="password" name="password" required/>
              <label name="confirmPassword">Confirm Password</label>
             <input type="password" name="confirmPassword" required />
             <input type="submit" value="Register" /> 
               <p> <?= $reg->errors ?> </p>
</form>