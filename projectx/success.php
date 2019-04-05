<html>
 <head>
  <title> Online scholarship Portal</title>
	<meta name="Author" content="Harshit S K">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.min.js"></script>
  

	<script src="js/bootstrap.min.js"></script>

 </head>
<?php
include "header.php";
require 'db.php';
error_reporting(0);
if(isset($_POST['reg']))
	{
		$name=$_POST['name'];
		$e=$_POST['email'];
		$ph=$_POST['phone'];
		$aa=$_POST['aadhar'];
		$gen=$_POST['gen'];
		$date=$_POST['date'];
		$or=$_POST['orphan'];
		$fn=$_POST['fname'];
		$mn=$_POST['mname'];
		$gn=$_POST['gname'];
		$caste=$_POST['caste'];
		$cat=$_POST['cat'];
		$add=$_POST['add'];
		$pu=$_POST['pu'];
		$sslc=$_POST['sslc'];
		$ai=$_POST['ai'];
		$sports=$_POST['sports'];
		$bn=$_POST['bname'];
		$ac=$_POST['ac'];
		$co=$_POST['course'];
		$cid=$_POST['college'];
		$file=$_POST['file'];
		$d=date('mdYHis'); 		
		$appid='S'.$d;
		if($or=='true' && $pu>=75 && $ss>=75 && $ai<='250000')
			{
			 $scid="SH001";
			}
		elseif($sports=='INTERNATIONAL' && $pu>=90 && $sslc>=90 && $ai<='250000')
			{
			  $scid="SH002";
			}
		elseif($category=='SC/ST' && $pu>=65 && $sslc>=70 && $ai<='250000')
         {
           $scid="SH003";
         }
         elseif($puper>=80 && $sslc>=80 &&$ai<='250000')
             {
              $scid="SH004";
             }
              elseif($sports==('INTERNATIONAL'||'NATIONAL') && $pu>=70 && $sslc>=70 &&$ai<='250000')
                  {
                   $scid="SH005";
                  }
                  else
                   {
                     $scid="SHXXX";
                   }
		$target_dir = "docs/";
		$target_file = $target_dir . basename($_FILES['file']['name']);
		$file=$_FILES['file']['name'];
		$sql = "INSERT INTO `application` VALUES ('$appid','$aa','$name','$fn','$mn','$gn','$or','$add','$gen','$co','$cid','$date','$sslc','$pu','$sports','$caste','$cat','$ai','$scid','$ph','$e','$bn','$ac','$file')";
		if ($conn->query($sql) === TRUE) {
			echo "<center><br><h4>Succesfully registered! Your application id is $appid<br> We will process in 2-4 working days!</h4>";
			move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}
include "footer.php";
?>