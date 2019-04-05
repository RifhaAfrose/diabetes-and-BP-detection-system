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

<h4>Statistics -> Logs </h4>
<hr style="color:#cccccc">

    <form action="" method="post"> <input type="text" name="s" placeholder="Search by Application ID" required> <input type="submit" name="search" value="Search"></form>
	<?php
	require "db.php";
	$q="select  count(A.sname) as seltot,sum(B.schamt)as totalamt,avg(B.schamt) as avg FROM application A,scholar B where  A.schid=B.schid and  A.schid like 'SH0__'";
	$r=$conn->query($q);
	$ro = $r->fetch_array(MYSQLI_ASSOC);
	echo "<h3> Number of Application Selected : $ro[seltot]</h3><br><h3> Total Cost : $ro[totalamt]</h3><br><h3> Average amount sanctioned : $ro[avg]</h3><br>";
		if(isset($_POST['search'])){
			$q=$_POST['s'];
			
			$sql="SELECT * FROM application where appid='".$q."' order by sname" ;
			$result=$conn->query($sql);
			if($result->num_rows > 0) {
			echo "<table border=1 cellpadding=5>";
			echo "<th>Application ID</th><th>Aadhar number</th><th>Student Name</th><th>Address</th><th>Gender</th><th>Course</th><th>Date of Birth</th><th>SSLC %</th><th>PUC %</th><th>Sports</th><th>Income</th><th>Bank account number</th><th>Documents</th>";
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				echo "<tr><td>$row[appid]</td> <td>$row[aadhar]</td> <td>$row[sname]</td> <td>$row[addres]</td> <td>$row[gen]</td> <td>$row[course]</td> <td>$row[dob]</td> <td>$row[sslper]</td> <td>$row[puper]</td> <td>$row[sports]</td> <td>$row[income]</td> <td>$row[baccn]</td><td><a href=\"docs/$row[doc]\">File</a></td></tr>";
					}
			echo "</table>";
			}
			else
			{
				echo "<h3> No data found</h3>";
			}
		}
?>
</body>
</html>
