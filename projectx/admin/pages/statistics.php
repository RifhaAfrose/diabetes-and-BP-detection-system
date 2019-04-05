<?php
    // Initialize the session.
    session_start();
    
    require_once("../inc/checkAdminPagePermissions.php");
    require_once("../inc/config.inc.php");
	require "db.php";
$sql="select * from `college`";
$result=$conn->query($sql);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
    <title><?php echo _SITE_NAME; ?> :: Admin Panel :: Home</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <link href="css/style_<?php echo _CSS_STYLE;?>.css" type="text/css" rel="stylesheet">
	  <script src="../js/jquery.min.js"></script>
</head>


<!-- BEGIN MAIN CONTENT ARE -->
<body style="background: #ffffff;">

<h4>Statistics -> Statistics </h4> 
<div style="display:-webkit-inline-box;">
<form>
<select id="list" name="list">
  <option value="" disabled selected>Select a filter of application selected</option>
  <option value="SH001">Orphan</option>
  <option value="SH002">Merit</option>
  <option value="SH003">SC/ST</option>
  <option value="SH004">Fee concession</option>
  <option value="SH005">Sports</option>
  </select>
</form>
<form name="form2">
<select id="c" name="c">
  <option value="" disabled selected>Select By Course</option>
  <option value="BE">B E/B Tech</option>
  <option value="MBBS">M B B S</option>
  </select>
</form>
<form>
<select id="clg" name="clg">
  <option disabled selected> ---- Select college ---- </option>
	<?php				
		while($rows = $result->fetch_array(MYSQLI_ASSOC)){
		echo "<option value='$rows[collid]'>$rows[collnme]</option>";
		}
	?>	
  </select>
</form>
</div>
<br>


<script>
$(document).ready(function() {
  $('#list').change(function() {
var selected=$(this).val();
  $.get("get-data.php?selected="+selected, function(data){
      $('.result').html(data);
	form2.form.reset();
    });
    });
	$('#clg').change(function() {
var selected=$(this).val();
  $.get("getclg.php?selected="+selected, function(data){
      $('.result').html(data);
    });
    });
$('#c').change(function() {
var selected=$(this).val();
  $.get("getc.php?selected="+selected, function(data){
      $('.result').html(data);
    });
    });
});
</script>
<hr style="color:#cccccc">
	<?php 
		require "db.php";
		$sql="select * from `application`";
		$result=$conn->query($sql);
		echo "<div class='result'><table border=1 cellpadding=5>";
		echo "<th>Application ID</th><th>Aadhar number</th><th>Student Name</th><th>Address</th><th>Gender</th><th>Course</th><th>Date of Birth</th><th>SSLC %</th><th>PUC %</th><th>Sports</th><th>Income</th><th>Bank account number</th><th>Documents</th>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr><td>$row[appid]</td> <td>$row[aadhar]</td> <td>$row[sname]</td> <td>$row[addres]</td> <td>$row[gen]</td> <td>$row[course]</td> <td>$row[dob]</td> <td>$row[sslper]</td> <td>$row[puper]</td> <td>$row[sports]</td> <td>$row[income]</td> <td>$row[baccn]</td><td><a href=\"docs/$row[doc]\">File</a></td></tr>";
				}
		echo "</table></div>";
	?>



</body>
</html>
