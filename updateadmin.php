<?php
session_start();
include("connection.php");
$a_username = ($_POST['a_username']);
$a_password = ($_POST['a_password']);
$assistantid = ($_POST['assistantid']);
$sqlA = "SELECT adminid FROM admin WHERE a_username = '$a_username'";
$qryA = oci_parse($conn,$sqlA);

oci_execute($qryA);
$data = oci_fetch_assoc($qryA);
$ADMINID=$data['ADMINID'];

$sqladmin = "UPDATE admin SET a_username = '$a_username', a_password = '$a_password' WHERE adminid = '$ADMINID'";
  
$qry = oci_parse($conn,$sqladmin);
    oci_execute($qry);
//echo $sqladmin;
  if($qry)
  {
    echo "<script language='javascript'> alert('Information has been updated');window.location='adminpage.php';</script>";
  }
  else
  {
    echo "<script language='javascript'> alert('Failed to updated');window.location='adminpage.php';</script>";
  }



 ?>

