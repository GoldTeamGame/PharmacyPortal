/* File: validate.js
 *
 * This file is used throughout the entire site for validating the forms. Collectively,
 * the fields to be validated include
 *
 * username
 * email
 * password
 * confirm
 *
 * This script will include functions that will perform the validation, based on the
 * parameters passed into them, the field and a regEx to be used for validation.
 *
 * Each individual page will only include this script to perform its validation. Since
 * this script handles a few forms, we need a way to know which fields to validate. This
 * determination will be done by looking the the 'location' object which includes the
 * full url of the page that is shown.
 */

/* First thing is to find out what page has included this script. This will allow us
 * to determine which field(s) to validate.
 */
/*--------------------------------------------------------------------------------------------------*/

var pageToValidate = location.pathname;
pageToValidate = pageToValidate.substring(pageToValidate.lastIndexOf("/") + 1);

/* Will still use sessionStorage for the user welcome at this time. Later this will change to use
 * php sessions.
 */

validatePage(pageToValidate);

/*--------------------------------------------------------------------------------------------------*/

function validatePage(pageToValidate) {

   switch (pageToValidate) {
      case  "createAccount.php": validateCreateAccount();   break;
      case "forgotPassword.php": validateForgotPassword();  break;
      case "login.php":          validateResetPassword();   break;
      case "resetPassword":      validateLogin();           break;
   }
}// end validatePage()
/*--------------------------------------------------------------------------------------------------*/

function validateCreateAccount() {
   /* set the regEx for each field and its associated error message. */
   var usernameRegEx = /^\w{6,}$/;
   var usernameInvalidPlaceholder = 'Type 6 characters or more';
   
   var emailRegEx = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
   var emailInvalidPlaceholder = 'Invalid email';
   
   var passwordRegEx = /^\w{6,}$/;
   var passwordInvalidPlaceholder = 'Type 6 characters or more';
   
   var confirmRegEx = /^\w{6,}$/;
   var confirmInvalidPlaceholder = 'Passwords do not match';
   
   /* Register the blur event handlers on each field. */
   $('#username').on('blur', function() { isValidField($(this), usernameRegEx, usernameInvalidPlaceholder); });
   $('#email').on   ('blur', function() { isValidField($(this), emailRegEx), emailInvalidPlaceholder; });
   $('#password').on('blur', function() { isValidField($(this), passwordRegEx, passwordInvalidPlaceholder); });

   $('#confirm').on ('blur', function() { hasValidatedConfirm($(this), $('#password'), confirmInvalidPlaceholder); });
}// end validateCreateAccount()
/*--------------------------------------------------------------------------------------------------*/

function validateForgotPassword() {
   /* Set the regEx expression and its associated error message. */
   var usernameRegEx = /^\w{6,}$/;
   var usernameInvalidPlaceholder = 'Type 6 or more characters';
   
   /* Register the blur event handler. */
   $('#username').on('blur', function() { isValidField($(this), usernameRegEx, usernameInvalidPlaceholder); } );
   $('#ok').on      ('click', function() { isValidField($('#username'), usernameRegEx, usernameInvalidPlaceholder); });
}// end validateForgotPassword()
/*--------------------------------------------------------------------------------------------------*/

function validateResetPassword() {
   /* Set the regEx expressions and their associated error messages. */
   var passwordRegEx = /^\w{6,}$/;
   var passwordInvalidPlaceholder = 'Type 6 or more characters';
   var confirmRegEx = /^\w{6,}$/;
   var confirmInvalidPlaceholder = 'Passwords do not match';
   
   /* Register the blur event handlers. */
   $('#password').on('blur', function() { isValidField($(this), passwordRegEx, passwordInvalidPlaceholder); } );
   $('#confirm').on('blur', function() { hasValidatedConfirm($(this), $('#password'), passwordInvalidPlaceholder); } );
   
}// end validateResetPassword()
/*--------------------------------------------------------------------------------------------------*/

function validateLogin() {
   /* Set the regEx expressions and their associated error messages. */
   var usernameRegEx = /^(\w{6,})|(guest)$/;
   var usernameInvalidPlaceholder = 'Type 6 or more characters';
   
   var passwordRegEx = /^(\w{6,})|(guest)$/;
   var passwordInvalidPlaceholder = 'Type 6 or more characters';
   
   /* Register the blur event handlers. */
   var $username = $('#username');
   
   /* This will be replaced with sessions later in php. */
   if ( $username.val() == 'stornar' )    { sessionStorage.username = 'Socratis'; }
   else if ( $USERNAME.val() == 'guest' ) { sessionStorage.username = 'Guest';    }
   
   $('#username').on('blur', function() { isValidField($(this), usernameRegEx, usernameInvalidPlaceholder); });
   $('#password').on('blur', function() { isValidField($(this), passwordRegEx, passwordInvalidPlaceholder); });
   
}// end validateLogin()
/*--------------------------------------------------------------------------------------------------*/

function isValidField($fld, fldRegEx, fldInvalidPlaceholder) {
   /* Function validates the $fld against the regEx and user the fldInvalidPlaceholder
    * to report any errors.
    */
   var fld = $fld.attr('id');
   var isIvalid = true;
   
   if ( !fldRegEx.test($fld.val()) ) {
      $fld.attr('placeholder', fldInvalidPlaceholder);
      $fld.addClass('error-msg');
      $fld.val('');
      $fld.focus();
      isIvalid = false;
      
   } else {
      $fld.removeClass('error-msg');
   }
   
   return isIvalid;
}// end isValidField()
/*--------------------------------------------------------------------------------------------------*/

function hasValidatedConfirm($elConfirm, $elPassword, invalidPlaceholder) {
   var isIvalid = true;
   
   /* This confirmation must match the password. */
   if ($elConfirm.val() !== $elPassword.val()) {
      $elConfirm.attr('placeholder', invalidPlaceholder);
      $elConfirm.val('');
      $elConfirm.addClass('error-msg');
      isIvalid = false;
      
   } else {
      $elPassword.removeClass('error-msg');
   }
   
   return isIvalid;
}// end hasValidatedConfirm()
/*--------------------------------------------------------------------------------------------------*/