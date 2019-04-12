<?php
   /* File: /php/uploadFile.php
    *
    * Receives the image file(s) and saves it(them) to the images folder.
    *
    * using the $_POST superglobal:
    * if 'date', 'location', 'album', 'occassion', are passed in, then the user has just uploaded an image. Add
    * the photo details to the json object, add a table entry, and update the json file on the server.
    */
   include 'inc.viewPhotos.php';
   
   $date = empty( $_POST['date'] )? date( "Y.m.d" ) : $_POST['date'];
   $location = empty( $_POST['location'] )? "NA" : $_POST['location'];
   $album = empty( $_POST['album'] )? "NA" : $_POST['album'];
   $occassion = empty( $_POST['occassion'] )? "NA" : $_POST['occassion'];

   $uploadedFiles = isset( $_FILES['uploaded-file'] )? $_FILES['uploaded-file'] : NULL;

   
   if ( $uploadedFiles ) {
      /* The $_FILES array is always set, so this creates a bit of a logic problem, since
       * I want the error.php to report the error message. So, even though I know the 
       * array will be set, but empty, I will test anyway, so I can redirect to the error
       * page.
       
      /* check the image type (.jpg, .jpeg, .tiff) */
      $validExtensions = ["jpg", "jpeg", "tiff", "tif"];
      $validMIMETypes = ["image/jpeg", "image/tiff"];
      
      foreach ($uploadedFiles['name'] as $keyIndex => $fileName) {
         $extension = end( explode( ".", $fileName ) );
         $mimeType = $uploadedFiles['type'][$keyIndex];

         if ( !in_array($mimeType, $validMIMETypes) || !in_array($extension, $validExtensions) ) {
            /* invalid extension identified, so give error. */
            $errMsg = 'Invalid image extension found.' . $extension;
            $errRes = 'Please <a href="viewPhotos.php?user=' . $_GET['user'] . '">try</a> again';
            
            header("Location: error.php?err_msg=$errMsg&err_res=$errRes");
         }// end if
      }// end foreach
      
      /* Image type has been accepted, so move the file(s). */
      foreach ($uploadedFiles['tmp_name'] as $keyIndex => $serverFile) {
         $phpSelf = $_SERVER['PHP_SELF'];
         $rootDir = substr( $phpSelf, 0, strrpos($phpSelf, "php/") );
         $filename = $uploadedFiles['name'][$keyIndex];
         
         $clientFile = $_SERVER['DOCUMENT_ROOT'] . $rootDir . "images/$filename";
         
         $photo = "../images/$filename";
         $delete = "../images/delete.png";
         
         if ( !move_uploaded_file($serverFile, $clientFile) ) {
            $errMsg = 'Error uploading at this time.';
            $errRes = 'Please <a href="viewPhotos.php?user=' . $_GET['user'] . '">try</a> again';
            
            header("Location: error.php?err_msg=$errMsg&err_res=$errRes");
         } else {
         
         /* File(s) has(have) been uploaded, now update the $json object, save it to its file, and request the viewPhotos.php page. This
          * will update the UI in essense.
          */
         $photoObject = json_encode(['filename' => $filename,
                                    'date' => $date,
                                    'location' => $location,
                                    'album' => $album,
                                    'occassion' => $occassion,
                                    'photo' => $photo,
                                    'delete' => $delete],
                                    JSON_PRETTY_PRINT);
         $json = loadJsonData();
         $json->photo[] = json_decode($photoObject);
         saveJsonFile($json);
         
         header("Location: viewPhotos.php?user={$_GET['user']}");
         }
      }// end foreach
   } // end if
?>