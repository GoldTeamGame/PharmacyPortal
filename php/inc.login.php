<?php
   /* File: inc.login.php
    *
    * Validate the user against hard coded values for now
    */

   $validUsername = 'ross123';
   $validPassword = 'ross123';
   
   $validGuestUsername = 'guest';
   $validGuestPassword = 'guest1';
   
   /* If the request method is 'GET' we are handling a request, else if it is 'POST', we
    * are handling a submit.
    */
   $requestMethod = isset($_SERVER['REQUEST_METHOD'])? $_SERVER['REQUEST_METHOD'] : '';

   
   if ($requestMethod == 'POST') {
      /* Validate the user's credentials. If authenticated, navigate to viewPhotos.html,
       * else go to error page.
       */
      $username = isset( $_POST['username'] )? $_POST['username'] : '';
      $password = isset( $_POST['password'] )? $_POST['password'] : '';
            
      if ( $username == $validUsername && $password == $validPassword ) {
         /* User authenticated */
         header("Location: viewPhotos.php?user=Ross123");
      
      } else if ( $username == $validGuestUsername && $password == $validGuestPassword ) {
         /* Guest authenticated */
         header("Location: viewPhotos.php?user=Guest");
         
      } else {
         $errMsg = 'User authentication failed.';
         $errRes = 'Please <a href="login.php">try</a> again.';
         
         header("Location: error.php?err_msg=$errMsg&err_res=$errRes");
      }
   }
?>