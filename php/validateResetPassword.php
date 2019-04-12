<?php
   /* File: /php/validateResetPassword.php
    *
    * Validates password using regEx, and confirm for equality to password.
    */
   define('MATCH_FOUND', 1);

   
   $passwordRegEx = '/^\w{6,}$/';
   $password = isset( $_POST['password'] )? $_POST['password'] : '';
   $confirm = isset( $_POST['confirm'] )? $_POST['confirm'] : '';
   
   $matchStatus = preg_match($passwordRegEx, $password);
   
   /* If password is validated, navigate to the login page, else the error page. */
   if (  $matchStatus === MATCH_FOUND && $password === $confirm) {
      header("Location: login.php");
      
   } else {
      $errMsg = 'Passwords do not match. Enter 6 or more characters.';
      $errRes = 'Please <a href="resetPassword.php">try</a> again';
      
      header("Location: error.php?err_msg=$errMsg&err_res=$errRes");
   }
   ?>