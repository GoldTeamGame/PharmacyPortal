<?php
   /* File: createAccount.php
    *
    */
   $relDir = '..';
   include 'inc.createAccount.php';


   echo '<!-- header template -->';
   include 'inc.header.php';

echo <<<_HD
   <!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
   <main id="page-createAccount">
      <form id="authenticate" method="post" action="createAccount.php">
         <fieldset>
            <p id="prompt">Please Create an Account</p>
                        
            <p><input id="username" class="$username_css_class" type="text" name="username" placeholder="username (6 chars or more)"  autofocus="autofocus" value="$username" /></p>
            <p><input id="email" class="$email_css_class" type="text" name="email" placeholder="email" value="$email"/></p>
            <p><input id="password" class="$password_css_class" type="password" name="password" placeholder="password (6 chars or more)" /></p>
            <p><input id="confirm" class="$password_css_class" type="password" name="confirm" placeholder="confirm password" /></p>
            
            <div>
               <button id="cancel" name="cancel"><a href="$relDir/index.php">Cancel</a></button>
               <button id="create">Create</button>
            </div>
         </fieldset>
      </form>
   </main>

   <!-- footer template -->
_HD;
   
include 'inc.footer.php';

echo <<<_HD
   <!-- extra script needed -->
   <script src="$relDir/js/jquery-2.1.4.min.js"></script>
   <script src="$relDir/js/validate.js"></script>

   </body>
   </html>
_HD;
   
?>