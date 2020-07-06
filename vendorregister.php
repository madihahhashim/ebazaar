<?php
session_start();
//register user

if(isset($_POST['submit']))
{
  //connect to database
  include("connection.php");
  //$accessId = $_SESSION['accessID'];
  //if($accessId == 1)
  //{
$fname =($_POST['fname']);
$lname = ($_POST['lname']);
$phone =($_POST['phone']);
$email = ($_POST['email']);
$address = ($_POST['address']);
$poscode = ($_POST['poscode']);
$city = ($_POST['city']);

    
  $sqlcheck = "SELECT v_email FROM vendor WHERE v_email = $email";
  $qrycheck = oci_parse($conn,$sqlcheck);

  $rowcheck = oci_num_rows($qrycheck);
    
  if($rowcheck == 0)
  {
    $sqlinsert="INSERT into vendor (v_firstname,v_lastname,v_phone,v_email,v_address,v_zipcode,v_city)VALUES ('".$fname."','".$lname."','".$phone."','".$email."','".$address."','".$poscode."','".$city."')";
    $qryinsert = oci_parse($conn,$sqlinsert);
    if(!$qryinsert){
      echo oci_error($conn);
       
    }

     echo "<script language='javascript'> alert('Vendor sudah berjaya di tambah!');window.location='signup.html';</script>";

  }
  else{
     echo "<script language='javascript'> alert('Pendaftaran sebagai vendor tidak berjaya.');window.location='signup.html';</script>";
  }
//}
//else{
   //echo "<script language='javascript'> alert('hanya super admin yang boleh tambah.');window.location='test2.php';</script>";
//}

}
 ?>