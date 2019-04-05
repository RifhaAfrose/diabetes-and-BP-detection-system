<html>
 <head>
  <title> Online scholarship Portal</title>
	<meta name="Author" content="Harshit S K">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.js"></script>

	<script src="js/bootstrap.min.js"></script>

 </head>
<body>
	<?php
		include "header.php";
		require 'db.php';
		if(isset($_POST['reg']))
	{
		$app=$_POST['app'];
		$aa=$_POST['aa'];
		$sql="select A.sname,A.addres,C.collnme,B.criter,B.schamt FROM application A,college C,scholar B where A.collid=C.collid and A.schid=B.schid and appid='$app' and aadhar='$aa'";
		$result=$conn->query($sql);
		if($result->num_rows > 0){
		$f = $result->fetch_assoc();
		echo "<script type='text/javascript'>  alert('Dear $f[sname], Your scholarship Amount $f[schamt] and College is $f[collnme] '); </script>";
		}else{ 
			echo "<script type='text/javascript'>  alert('Invalid id or aadhar number'); </script>";
		}
	}
	?>
	<br><br><br><br>
	<center>
	<form class="form-horizontal form" name="reg" action="" method="post" enctype="multipart/form-data">
		<div id="form" class="box x row-fluid">	
			<div class="step">
				<h4>Track your application</h4>
				   <div class="form-group">
					<label for="app" class="col-sm-2 control-label">Application ID </label>
					<div class="col-sm-10">
					  <input type="text" name="app" class="form-control" id="app" placeholder="Enter Application ID"  required>
					</div>
				  </div>
				   <div class="form-group">
					<label for="aadhar" class="col-sm-2 control-label">Aadhar </label>
					<div class="col-sm-10">
					  <input type="number" name="aa"  class="form-control" id="aadhar" placeholder="Enter Aadhar Number"  required>
					</div>
				  </div>	
			</div>		
			<div class="row">
			  <div class="col-sm-12">
			      <div class="pull-right">
					<button type="submit" name="reg" class="action btn-hot text-capitalize submit btn">Submit</button>
			      </div>
			  </div>
			</div>		
		</div>
	</form>
	</center>
	 <div class="video-background">
		<div class="video-foreground">
		  <video autoplay loop id="video-background" muted plays-inline>
				<source src="images/bg2.mp4" type="video/mp4">
			</video>
		</div>
	</div>
	<?php include "footer.php" ?>
</body>
</html>