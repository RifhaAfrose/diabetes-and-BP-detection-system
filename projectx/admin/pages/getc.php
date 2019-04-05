<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['selected'];
require "../connet.php";
if(isset($_POST['reg']))
	{
		$name=$_POST['name'];
		$e=$_POST['email'];
		$ph=$_POST['phone'];
		$usn=$_POST['usn'];
		$i=$_POST['i'];
		$cgpa=$_POST['cgpa'];
		$pn=$_POST['pname'];
		$us=$_POST['us'];
		$d=date('mdYHis'); 	
		$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
		$sql="INSERT INTO `application` VALUES ('$name','$e','$ph','$usn','$i','$cgpa','$pn','$us','$d','$ip')";
		$result=$conn->query($sql);
		echo "<table border=1 cellpadding=5>";
		echo "<th>Application ID</th><th>Aadhar number</th><th>Student Name</th><th>Address</th><th>Gender</th><th>Course</th><th>Date of Birth</th><th>SSLC %</th><th>PUC %</th><th>Sports</th><th>Income</th><th>Bank account number</th><th>Documents</th>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr><td>$row[appid]</td> <td>$row[aadhar]</td> <td>$row[sname]</td> <td>$row[addres]</td> <td>$row[gen]</td> <td>$row[course]</td> <td>$row[dob]</td> <td>$row[sslper]</td> <td>$row[puper]</td> <td>$row[sports]</td> <td>$row[income]</td> <td>$row[baccn]</td><td><a href=\"docs/$row[doc]\">File</a></td></tr>";
				}
		echo "</table>"
	}
?>
</body>
</html>
