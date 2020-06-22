<?php

//PHP & Oracle DB connection file
$user = "project502";
$pass = "system";
$host = "localhost";

$conn = oci_connect($user, $pass, $host);

if(!$conn){
 $e = oci_error();
 trigger_error(htmlentities($e['message'] , ENT_QUOTES), E_USER_ERROR);
}
/*else
  echo "connection ok";*/
?>