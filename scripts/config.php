<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '787876';
$dbname = 'FINVISION';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}

if (!mysql_select_db($dbname)) {
    die('Could not select database: ' . mysql_error());
}

mysql_set_charset('utf8');


/*
mysql_close($conn);
*/

?>