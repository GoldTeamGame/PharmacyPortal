<?php
   /* File:  /php/viewPhotos.php */
   $relDir = '..';
   $GLOBALS['user'] = isset($_GET['user'])? $_GET['user'] : '';

   include 'inc.viewPhotos.php';
   include 'inc.header.php';
?>

<!-- Main content of each page. Each page will have one, but styled differently perhaps. -->
<main id="page-viewPhotos">

<div id="view">
   <p id="instructions">To sort the table, click on any column header. To view a larger version of the image, click it once.</p>
   
   <!-- On request build the table, on submit (user clicks a column header), first sort, then build. -->
   <?php showContent(); ?>
   
</div>
</main>

<?php include 'inc.footer.php'; ?>

</body>
</html>