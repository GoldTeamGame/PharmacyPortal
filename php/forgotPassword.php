<?php
   /* File: /php/forgotPassword.php */

   $relDir = '..';
   include 'inc.header.php';

   echo <<<_HD
      <!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
      <main id="page-forgotPassword">
         <form id="authenticate" method="post" action="validateForgotPassword.php">
            <fieldset>
               <p id="instruction-line1">To reset your password you must type your username.</p>
               <p id="instruction-line2">An email with instructions on how to reset your password will then be sent to you.</p>
               <p><input id="username" type="text" name="username" placeholder="username" autofocus="autofocus" />
                  <button id="ok">OK</button></p>
            </fieldset>
         </form>
      </main>
_HD;
   
   include 'inc.footer.php';
   
   echo <<<_HD
   <script src="$relDir/js/jquery-2.1.4.min.js"></script>
   <script src="$relDir/js/validate.js"></script>
   </body>
</html>
_HD;

?>