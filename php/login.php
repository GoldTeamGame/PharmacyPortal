<?php
   /* File: login.php */
   include 'inc.login.php';

   $relDir = '..';

   include 'inc.header.php';
   
   echo <<<_HD
      <!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
      <main id="page-login">
         <form id="authenticate" method="post" action="login.php">
            <fieldset>
               <p id="prompt">Please log in</p>
               <p><input id="username" type="text" name="username" placeholder="username" autofocus="autofocus"/></p>
               <p><input id="password" type="password" name="password" placeholder="password" /></p>
               
               <div>
                  <span id="forgot"><a href="$relDir/php/forgotPassword.php">Forgot password?</a></span>
                  <button id="cancel" name="cancel"><a href="$relDir/index.php">Cancel</a></button>
                  <button id="login">Log in</button>
               </div>
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