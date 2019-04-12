<?php
/**
 * Created by PhpStorm.
 * User: stornarSIUE
 * Date: 3/14/15
 * Time: 8:47 AM
 */

require_once '../db/mysql-inc.connectDB.php';

/* Connect to the db first. */
$dbc = mysqli_connect(DB_HOST,DB_USER, DB_PWD, DB_NAME);

if ( mysqli_connect_errno() ) { die( mysqli_connect_error() ); }
else {
    /* No connection errors so far. */
    $sql = "SELECT * FROM photo";

    /* Run the query. */
    if ( $result = mysqli_query($dbc, $sql) ) {
        /* Process each record in the result set. */
        echo "<h1>'Photo' table listing</h1>";
        while ( $row = mysqli_fetch_assoc($result) ) {
            echo "{$row['id']},{$row['number']},{$row['title']},{$row['credits']}<br>";
        }

        /* Release resources. */
        mysqli_free_result($result);
        mysqli_close($dbc);
    } else {
        /* Error retrieving the result set. */
        die ( "Error retrieving data" );
    }
}