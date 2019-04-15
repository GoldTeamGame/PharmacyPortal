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
 <!-- Slideshow container -->
 <div class="slideshow-container">

   <!-- Full-width images with number and caption text -->
   <div class="mySlides fade">
   <div class="numbertext">1 / 3</div>
   <img src="images/main_page_1.jpg" style="width:100%">
   <div class="text">Caption Text</div>
   </div>

   <div class="mySlides fade">
   <div class="numbertext">2 / 3</div>
   <img src="images/main_page_2.jpg" style="width:100%">
   <div class="text">Caption Two</div>
   </div>

   <div class="mySlides fade">
   <div class="numbertext">3 / 3</div>
   <img src="images/main_page_3.jpg" style="width:100%">
   <div class="text">Caption Three</div>
   </div>

   <!-- Next and previous buttons -->
   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
   <a class="next" onclick="plusSlides(1)">&#10095;</a>
   </div>
   <br>

   <!-- The dots/circles -->
   <div style="text-align:center">
   <span class="dot" onclick="currentSlide(1)"></span> 
   <span class="dot" onclick="currentSlide(2)"></span> 
   <span class="dot" onclick="currentSlide(3)"></span> 
   </div>
</div>
      <!-- footer template -->
      <?php include 'php/inc.footer.php'; ?>
      
   