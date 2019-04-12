<?php
   /* File: /php/validateForgotPassword.php
    *
    * Validates the username using RegEx
    */
   define('MATCH_FOUND', 1);
   
//   define ('MATCH_NOT_FOUND', 0);
//   define ('ERROR', FALSE);
   
   $usernameRegEx = '/^\w{6,}$/';
   $username = isset( $_POST['username'] )? $_POST['username'] : '';
   $matchStatus = preg_match($usernameRegEx, $username);
   
   /* If username is validated, navigate to the reset password page, else the error page. */
   if (  $matchStatus === MATCH_FOUND ) {
      header("Location: resetPassword.php");

   } else {
      $errMsg = 'Enter 6 or more characters.';
      $errRes = 'Please <a href="forgotPassword.php">try</a> again';
      
      header("Location: error.php?err_msg=$errMsg&err_res=$errRes");
   }
?>