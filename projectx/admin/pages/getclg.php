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
echo "Showing results for $q";
require "db.php";
$sql="SELECT * FROM application where collid='".$q."' and schid like 'SH0__'  order by sname";
		$result=$conn->query($sql);
		echo "<table border=1 cellpadding=5>";
		echo "<th>Application ID</th><th>Aadhar number</th><th>Student Name</th><th>Address</th><th>Gender</th><th>Course</th><th>Date of Birth</th><th>SSLC %</th><th>PUC %</th><th>Sports</th><th>Income</th><th>Bank account number</th><th>Documents</th>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr><td>$row[appid]</td> <td>$row[aadhar]</td> <td>$row[sname]</td> <td>$row[addres]</td> <td>$row[gen]</td> <td>$row[course]</td> <td>$row[dob]</td> <td>$row[sslper]</td> <td>$row[puper]</td> <td>$row[sports]</td> <td>$row[income]</td> <td>$row[baccn]</td><td><a href=\"docs/$row[doc]\">File</a></td></tr>";
				}
		echo "</table>"
?>
</body>
</html>