<?php
   /* File: /php/resetPassword.php */
   $relDir = '..';
   include 'inc.header.php';

echo <<<_HD
      <!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
      <main id="page-resetPassword">
         <form id="authenticate" method="post" action="validateResetPassword.php">
            <fieldset>
               <p id="instructions">Reset password</p>
               
               <p><input id="password" type="password" name="password" placeholder="password" autofocus="autofocus" /></p>
               <p><input id="confirm" type="password" name="confirm" placeholder="confirm password" /></p>
               
               <div><button id="change">Change</button></div>
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