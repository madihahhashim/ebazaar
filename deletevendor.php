<?php
session_start();
include("connection.php");
$v_firstname = ($_POST['v_firstname']);

$sqlA = "SELECT vendorid FROM vendor WHERE v_firstname = '$v_firstname'";
$qryA = oci_parse($conn,$sqlA);

oci_execute($qryA);
$data = oci_fetch_assoc($qryA);
$VENDORID=$data['VENDORID'];

$sqlven = "DELETE vendor WHERE vendorid = '$VENDORID'";
  
$qry = oci_parse($conn,$sqlven);
    oci_execute($qry);

  if($qry)
  {
    //echo "<script language='javascript'> alert('Information has been deleted');window.location='vendorlist.php';</script>";
  }
  else
  {
    echo "<script language='javascript'> alert('Failed to deleted');window.location='vendorlist.php';</script>";
  }



 ?>

