<?php
   /* File: /php/inc.header.php
    *
    * The common site header to be included in all the other pages.
    */

echo <<<_HD
   
   <!DOCTYPE html>
   <html>
   <head>
   <title>Pharmacy Game Grade Portal</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="$relDir/css/site.css?v=2.2" />
   </head>
   
   <body>
   
   <!-- Header for the entire site. Must find a way to make into a template and include as needed. -->
   <header class="site">
      <section id="content" class="float-left">
         <figure id="logo" class="float-left"><a href="$relDir/index.php"><img src="$relDir/images/logo-siue.png" /></a></figure>
         <aside id="title">Pharmacy Game Portal</aside>
      </section>
   
      <aside id="user-welcome">Welcome $user</aside>
   </header>
_HD;
   
?>