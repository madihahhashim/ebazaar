<?php
session_start();
include("connection.php");
$v_firstname = ($_POST['v_firstname']);
$v_lastname = ($_POST['v_lastname']);
$v_email = ($_POST['v_email']);
$v_address = ($_POST['v_address']);
$v_zipcode = ($_POST['v_zipcode']);
$v_city = ($_POST['v_city']);
$v_phone = ($_POST['v_phone']);
$sqlA = "SELECT vendorid FROM vendor WHERE v_firstname = '$v_firstname'";
$qryA = oci_parse($conn,$sqlA);

oci_execute($qryA);
$data = oci_fetch_assoc($qryA);
$VENDORID=$data['VENDORID'];

$sqlven = "UPDATE vendor SET v_firstname = '$v_firstname',v_lastname = '$v_lastname',v_email = '$v_email',v_address = '$v_address',v_zipcode = '$v_zipcode',v_city = '$v_city', v_phone = '$v_phone' WHERE vendorid = '$VENDORID'";
  
$qry = oci_parse($conn,$sqlven);
    oci_execute($qry);

  if($qry)
  {
    echo "<script language='javascript'> alert('Information has been updated');window.location='vendorlist.php';</script>";
  }
  else
  {
    echo "<script language='javascript'> alert('Failed to updated');window.location='vendorlist.php';</script>";
  }



 ?>

