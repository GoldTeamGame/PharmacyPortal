<?php
   /* File: /php/inc.createAccount.php
    *
    * Validates the four fields using regEx.
    */
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      define('MATCH_NOT_FOUND', 0);
      
      $usernameRegEx = '/^\w{6,}$/';
      $emailRegEx = '/^(.+)@([^\.].*)\.([a-z]{2,})$/';
      $passwordRegEx = '/^\w{6,}$/';
      
      $username = isset( $_POST['username'] )? $_POST['username'] : '';
      $email = isset( $_POST['email'] )? $_POST['email'] : '';
      $password = isset( $_POST['password'] )? $_POST['password'] : '';
      $confirm = isset( $_POST['confirm'] )? $_POST['confirm'] : '';
      
      $usernameMatchStatus = preg_match($usernameRegEx, $username);
      $emailMatchStatus = preg_match($emailRegEx, $email);
      $passwordMatchStatus = preg_match($passwordRegEx, $password);
      
      $hasValidationError = false;
      
      /* If password is validated, navigate to the login page, else the error page. */
      if ( $usernameMatchStatus === MATCH_NOT_FOUND ) { $username_css_class = "error-msg"; $hasValidationError = true; }
      else                                            { $username_css_class = "";                                      }
      
      if ( $emailMatchStatus === MATCH_NOT_FOUND ) { $email_css_class = "error-msg"; $hasValidationError = true; }
      else                                         { $email_css_class = "";                                      }
      
      if ( $passwordMatchStatus === MATCH_NOT_FOUND ||
           $password !== $confirm ) { $password_css_class = "error-msg"; $hasValidationError = true;  }
      else                          { $password_css_class = "";                                       }
   
      if ( !$hasValidationError ) {
         header("Location: login.php");
      }
   }
   ?>