<?php
/**
 * Created by PhpStorm.
 * User: stornarSIUE
 * Date: 3/14/15
 * Time: 8:31 AM
 *
 * NOTE: This file was saved in a directory (db) under the web root. This
 * was only done so you could have access to it when these files are uploaded
 * to the course web site. In a live situation, place this directory outside
 * the web root directory.
 */

/* Define the four constants that can be used with either PDO or mysqli */
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'Courses');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PWD', '');

/* Define the constant for PDO use. */
$_conString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
DEFINE ('DB_CONNECTION_STRING', $_conString);