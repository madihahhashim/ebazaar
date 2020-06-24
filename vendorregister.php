<?php
session_start();
//register user



if(isset($_POST['submit']))
{
    //connect to database
include("testdatabase.php");

        $fname = mysqli_real_escape_string($conn,$_POST['v_firstname']);
        $lname = mysqli_real_escape_string($conn,$_POST['v_lastname']);
        $phone = mysqli_real_escape_string($conn,$_POST['v_phone']);
        $email = mysqli_real_escape_string($conn,$_POST['v_email']);
        $address = mysqli_real_escape_string($conn,$_POST['v_address']);
        $poscode = mysqli_real_escape_string($conn,$_POST['v_zipcode']);
        $city = 
        mysqli_real_escape_string($conn,$_POST['v_city']);

	
$sqlcheck = "SELECT * FROM vendor WHERE v_email = $email";
$qrycheck = mysqli_query($conn,$sqlcheck);
    $rowcheck = mysqli_num_rows($qrycheck);
    if($rowcheck==0)
    {
        $sqlinsert="INSERT into vendor (v_firstname,v_lastname,v_phone,v_email,v_address,v_zipcode,v_city)VALUES ('".$fname."','".$lname."','".$phone."','".$email."','".$address."','".$poscode."','".$city."')";
        
    
    
        $qryinsert=mysqli_query($conn,$sqlinsert);
       
        if($qryinsert)
        {
            echo mysqli_error($conn);
        }
        
     
        echo "<script language='javascript'>alert('Permohonan telah berjaya dihantar!');</script>";

    }
    else 
    {
	    echo "<script language='javascript'>alert('Data ahli telah wujud');</script>";
     } 
        
        
    
}


?>