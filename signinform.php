<?php
session_start();
include("connection/connection.php");

if(isset($_POST['submit']))
{
    $v_email = ($_POST['v_email']);
    $v_phone =($_POST['v_phone']);
    $sql = "SELECT * FROM vendor WHERE v_email='$v_email' AND v_phone='$v_phone'";
    
    $qry = oci_parse($conn,$sql);
    oci_define_by_name($qry, 'VENDORID', $ADMINID);         
    oci_define_by_name($qry, 'V_FIRSTNAME', $A_USERNAME);
    oci_define_by_name($qry, 'V_LASTNAME', $A_PASSWORD);
    oci_define_by_name($qry, 'V_PHONE', $ASSISTANTID);
    oci_define_by_name($qry, 'V_EMAIL', $ADMINID);         
    oci_define_by_name($qry, 'V_ADDRESS', $A_USERNAME);
    oci_define_by_name($qry, 'V_ZIPCODE', $A_PASSWORD);
    oci_define_by_name($qry, 'V_CITY', $ASSISTANTID);
    
    oci_execute($qry);
    $nrows = oci_fetch_all($qry,$res);


    if($nrows>0)
    {
      
    
      $_SESSION['vendorid']= $res['VENDORID'][0];
      $_SESSION['v_firstname']= $res['V_FIRSTNAME'][0];
      $_SESSION['v_lastname']=$res['V_LASTNAME'][0];
      $_SESSION['v_phone']=$res['V_PHONE'][0];
      $_SESSION['v_email']=$res['V_EMAIL'][0];
      $_SESSION['v_address']=$res['V_ADDRESS'][0];
      $_SESSION['v_zipcode']=$res['V_ZIPCODE'][0];
      $_SESSION['v_city']=$res['V_CITY'][0]; 
       
    header("Location: listProduct.php");//tukar vendor pagelist



    }
    else 
  {

      echo "<script language = 'javascript'>
      alert ('Email or phone number not found.');
      window.location='index.php';
      </script>";
  }

  }


?>