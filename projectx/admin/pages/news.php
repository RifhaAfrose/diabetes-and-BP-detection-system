<?php
    // Initialize the session.
    session_start();
    
    require_once("../inc/checkAdminPagePermissions.php");
    require_once("../inc/config.inc.php");

    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
    <title><?php echo _SITE_NAME; ?> :: Admin Panel :: Home</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <link href="css/style_<?php echo _CSS_STYLE;?>.css" type=text/css rel=stylesheet>
</head>


<!-- BEGIN MAIN CONTENT ARE -->
<body style="background: #ffffff;">

<h4>Scholarship details</h4>
<hr style="color:#cccccc">
Update amount : 
<form action="" method="post">
 <select name="scid" class='form-control' required> 
	<option disabled selected> ---- Select ID ---- </option>
	<?php		
		require "db.php";
		$sql="SELECT * FROM scholar" ;
		$result=$conn->query($sql);
		while($rows = $result->fetch_array(MYSQLI_ASSOC)){
		echo "<option value='$rows[schid]'>$rows[schid]</option>";
		}
	?>	
</select>
<input type="number" name="amt" placeholder="Enter amount" required>
<input type="submit" name="formx" value="SET">
</form>
  <?php
	require "db.php";
	if(isset($_POST['formx'])){
		$am=$_POST['amt'];
		$i=$_POST['scid'];
		
		$u="UPDATE scholar SET schamt='".$am."' WHERE schid='".$i."'";
		if($conn->query($u)){
			echo "<h5>Updation success</h5>";
		}else{
			echo "<h5>Some error found</h5>";
		}
	}
	
	$sql="SELECT * FROM scholar" ;
		$result=$conn->query($sql);
		echo "<table border=1 cellpadding=5>";
		echo "<th>Scholarship ID</th><th>Criteria </th><th>Amount</th>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr><td>$row[schid]</td> <td>$row[criter]</td> <td>$row[schamt]</td> ";
				}
		echo "</table>"
?>


</body>
</html>
