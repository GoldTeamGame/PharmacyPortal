<?php
   /* File: /php/inc.viewPhotos.php
    *
    * Loads the photo data from a json file and then builds the table to house the data.
    */
   
   function showContent() {
      /* This function acts as the entry point to this script. If first loads the json data, since the data is needed
       * regardless of what happens next. It then decides on what action to carry out, base on information passed in
       * through the $_GET or $_POST superglobals.
       *
       * using the $_GET superglobal:
       * If 'col' is passed in: The user has clicked on a column, so sort the json object and update the table.
       *
       * if 'pIndex' is passed in: The user clicked on the delete icon, so remove the photo record from the json
       * object, update the table and save the new json data back to the json file on the server.
       *
       */
      
      /* Save user's name in the GLOBALS array for easy access */
//      $GLOBALS['user'] = $user;
      
      $json = loadJsonData();
      
      $col = isset($_GET['col'])? $_GET['col'] : '';
      $pIndex = isset($_GET['pIndex'])? $_GET['pIndex'] : '';
      
      if      ( !empty($col) )        { sortPhotoTable($json, $col);       saveJsonFile($json); buildPhotoTable($json);  }
      else if ( is_numeric($pIndex) ) { removePhotoRecord($json, $pIndex); saveJsonFile($json); buildPhotoTable($json);  }
      else                            { buildPhotoTable($json);                                                          }
   }// end showContents()
/*-----------------------------------------------------------------------------------------------------------------------*/
   
   function loadJsonData() {
      /* Attempt to load the json data first. */
      $jsonString = file_get_contents('../data/photoDetails.json');

      /* If successful, return the json object, else return NULL. */
      if ($jsonString) { return json_decode($jsonString); }
      else             { return NULL;                     }
   }// end loadJsonData()
   
/*-----------------------------------------------------------------------------------------------------------------------*/
   
   function removePhotoRecord(&$json, $pIndex) {
      /* Removes the photo record at $pIndex from the $json object. */
      unset($json->photo[$pIndex]);
      
      /* Reindex the array, starting with 0 */
      $json->photo = array_values($json->photo);
   }// end removePhotoRecord()
   
/*-----------------------------------------------------------------------------------------------------------------------*/
   function saveJsonFile($json) {
      /* Saves the json data back to the file on the server. */
      $jsonString = json_encode($json, JSON_PRETTY_PRINT);
      file_put_contents("../data/photoDetails.json", $jsonString);
   }// end saveJsonFile()
/*-----------------------------------------------------------------------------------------------------------------------*/

   function buildPhotoTable($json) {
      $user = isset($GLOBALS['user'])? $GLOBALS['user'] : '';
      
      /* The upload form is not shown for a guest. */
      if ($user !== 'Guest') { showUploadForm($user); }
      
      /* The headers are fixed in name basically, but for addeded flexibility I will read them from
       * the object. This will synchronize the column header with the contents, so if in the future
       * the json objects have a different key arrangement, this code will still work.
       */
      echo '
         <table>
            <!-- The column headers -->
            <thead id="col-headers">
            <tr>';

      /* Add a link that navigates to the currently viewed page (viewPhotos.php), and pass the col header in the query string. */
      foreach($json->photo[0] as $property => $value) {
         if ($user == 'Guest' && $property == 'delete') { echo "<th></th>\n"; }
         elseif ($property == 'photo' || $property == 'delete') {
            /* last two fields are not sortable, so don't add the link. Since the exact key value is used here, we may have to
             * make a small edit if those two were to be renamed.
             */
            echo "<th>" . ucfirst($property) . "</th>\n";
            
         } else {
            echo "<th><a href=\"{$_SERVER['PHP_SELF']}?col=$property&user=$user\">" . ucfirst($property) . "</a></th>\n";
         }
      }
      
      echo '
            </tr>
            </thead>
      
            <!-- The table body -->
            <tbody>';
      
      /* The body will be build by iterating through the $json object for all the data. */
      
      /* For each photo object, build a table row for it. */
      foreach($json->photo as $pIndex => $photoDetail) {
         echo "<tr>";
         foreach($photoDetail as $property => $detail) {
            if ($property == 'photo') {
               echo '<td class="photo"><a target="_blank" href="../images/smiley.jpeg"><img src="' . $detail . '" /></a></td>';
               
            } else if ($property == 'delete') {
               if ($user !== 'Guest') {
                  /* pass the photo index in the query string, so you know what what is to be deleted. */
                  echo '<td class="delete"><a href="' . "{$_SERVER['PHP_SELF']}?pIndex=$pIndex&user=$user" . '"><img src="' . $detail . '" /><a></td>' . "\n";
               }
            } else {
               /* list all other properties. */
               echo "<td>$detail</td>";
            }
         }
         echo "</tr>";
      }
      
      /* Close off the table. We are done. */
      echo '
      </tbody>
      </table>';
      
   }// end buildPhotoTable()
/*-----------------------------------------------------------------------------------------------------------------------*/
   
   function sortPhotoTable($json, $colName) {
      /* This performs a selection sort on the $json object and then rebuilds the table. */
      for ($topIndex = 0; $topIndex <= count($json->photo) - 2; $topIndex++) {
         swap( $json, $topIndex, indexOfSmallestElement($json, $topIndex, $colName) );
      }
   }// end sortPhotoTable()
/*-----------------------------------------------------------------------------------------------------------------------*/

   function indexOfSmallestElement(&$json, $topIndex, $colName) {
      $minIndex = $topIndex;
      
      for($index = $topIndex + 1; $index <= count($json->photo) - 1; $index++) {
         $curPhoto = $json->photo[$index];
         $minPhoto = $json->photo[$minIndex];
         
         $minIndex = ($curPhoto->$colName < $minPhoto->$colName)? $index : $minIndex;
      }

      return $minIndex;
   }// end indexOfSmallestElement()
/*-----------------------------------------------------------------------------------------------------------------------*/
   
   function swap(&$json, $topIndex, $minIndex) {
      $tmp = $json->photo[$topIndex];
      $json->photo[$topIndex] = $json->photo[$minIndex];
      $json->photo[$minIndex] = $tmp;
   }// end swap()
/*-----------------------------------------------------------------------------------------------------------------------*/
 
   function showUploadForm($user) {
      echo <<<_HD
         <form id="upload-form" method="post" action="uploadFile.php?user=$user" enctype="multipart/form-data">
         <fieldset>
            <legend>Upload a file</legend>
      
            <input id="uploaded-file" type="file" name="uploaded-file[]" multiple="true" />
            <button id="upload"><img src="../images/upload.png" alt="upload" /></button>
            
            <!-- Fields describing the photo details -->
            <p id="photo-metadata">
            <input type="text" name="date" placeholder="date taken" />
            <input type="text" name="location" placeholder="location taken" />
            <input type="text" name="album" placeholder="album" />
            <input type="text" name="occassion" placeholder="occassion" /></p>
         </fieldset>
         </form>
_HD;
   }// end showUploadForm()
?>