<?php
include("connection.php");

if(isset($_POST['submit']))
{
    $a_username = ($_POST['a_username']);
    $a_password =($_POST['a_password']);
    $sql = "SELECT * FROM admin WHERE a_username='$a_username' AND a_password='$a_password'";
    
    $qry = oci_parse($conn,$sql);
    oci_execute($qry);
    $nrows = oci_fetch_all($qry,$res);


    if($nrows>0)
    {
      session_start();
      $data = oci_fetch_assoc($qry);

      $_SESSION['adminid']= $data['adminid'];
      $_SESSION['a_username']=$data['a_username'];
      $_SESSION['a_password']=$data['a_password'];
      $_SESSION['assistantid']=$data['assistantid']; 
      $_SESSION['accessID']=$data['accessID'];
      header("Location: adminpage.php");

    }
    else 
  {

      echo "<script language = 'javascript'>
      alert ('Username or password not found.');
      window.location='signup.html';
      </script>";
  }

  }


?>