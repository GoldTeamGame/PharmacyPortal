<?php
   /* File: /index.php */
   $relDir = '.';
?>

      <!-- header template -->
      <?php include 'php/inc.header.php'; ?>
      
      <!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
      <main id="page-index">
         <div id="signup">
            <h1>Welcome to the<br><span id="site-name">Pharmacy Game Portal</span></h1>
            <p>If you are a member, <a id="login" href="php/login.php">login</a> else <a id="create-account" href="php/createAccount.php">create an account</a></p>
         </div>
      </main>

      <!-- footer template -->
      <?php include 'php/inc.footer.php'; ?>
      
   