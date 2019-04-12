<?php
   /* File: error.php
    *
    * When this page is requested, two values will be passed through a query string.
    * a) err_msg, representing the error message
    * b) err_res, representing the error resolution.
    */

$err_msg = isset( $_GET['err_msg'] )? $_GET['err_msg'] : '';
$err_res = isset( $_GET['err_res'] )? $_GET['err_res'] : '';

$relDir = '..';
include 'inc.header.php';

echo <<<_HD
      <main id="page-error">
         <div>
            <p id="error">
               <img id="error-img" src="$relDir/images/error.png" />
               <span id="error-message">$err_msg</span>
            </p>
            <p id="error-resolution">$err_res</p>
         </div>
      </main>
_HD;

include 'inc.footer.php';

echo <<<_HD
   </body>
</html>
_HD;

?>