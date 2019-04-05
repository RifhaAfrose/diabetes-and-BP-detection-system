<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
require "db.php";
$sql="select * from `college`";
$result=$conn->query($sql);

?>
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
	<?php include "header.php" ?>
    <script src="js/jssor.slider-23.1.6.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/slider.js">    </script>
	 <div id="jssor_1" style="position:relative;margin:20px auto;top:0px;left:0px;width:600px;height:300px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('images/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">
            <div>
				<img data-u="image" src="images/1.jpg" />
            </div>
            <div>
                <img data-u="image" src="images/2.jpg" />
            </div>
            <div>
                <img data-u="image" src="images/3.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
        <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
   <div id="reg" class="container">
	<br><br>
	<form class="form-horizontal form" name="reg" action="success.php" method="post" enctype="multipart/form-data">
	  <div class="col-md-8 col-md-offset-2">   	
		<div class="progress">
		  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		
		<div class="box row-fluid">	
			<br>
			<div class="step">
				<h4 align="center"> Basic Details </h4>
				  <div class="form-group">
				    <label for="name" class="col-sm-2 control-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
				    </div>
				  </div>			  
				  <div class="form-group">
				    <label for="phone" class="col-sm-2 control-label">Phone</label>
				    <div class="col-sm-10">
				      <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
				    </div>
				  </div>			  
				  <div class="form-group">
					<label for="aadhar" class="col-sm-2 control-label">Aadhar </label>
				    <div class="col-sm-10">
				      <input type="number" name="aadhar" class="form-control" id="aadhar" placeholder="Aadhar number" min="12" size="12">
				    </div>
			
				    </div>
				  <div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-10">
						  <input type="radio" name="gen" class="form-control" id="gen" value="Male"> Male
						  <input type="radio" name="gen" class="form-control" id="gen" value="Female"> Female 
						</div>
				  </div>			  
				 <div class="form-group">
						<label for="dob" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-10">
						  <input type="date" name="date" class="form-control" id="date" placeholder="Date of Birth" required> 
						</div>
				  </div>		
				<div class="col-sm-10">
					<label for="course" class="col-sm-2 control-label">Course</label>
					<div class="col-sm-10">
				      <select class="form-control" name="course" id="course">
				      	<option value="" disabled selected>Select</option>
				      	<option value="be">B E/ B Tech</option>
				      	<option value="mbbs">M B B S</option>
				      </select>
					  </div>
				</div>
				<div class="col-sm-10">
					<label for="college" class="col-sm-2 control-label">College</label>
					<div class="col-sm-10">
				      <select name="college" class='form-control'> 
							<option disabled selected> ---- Select college ---- </option>
							<?php				
								while($rows = $result->fetch_array(MYSQLI_ASSOC)){
								echo "<option value='$rows[collid]'>$rows[collnme]</option>";
								}
							?>	
						</select>
				    </div>
					</div>
				 
			</div>
		
			<div class="step">
				<h4 align="center"> Personal Details </h4>
				  <div class="form-group">
					 <label for="orphan" class="col-sm-2 control-label">Are you Orphan?</label>
				    <div class="col-sm-10">
				      <input type="checkbox" name="orphan" id="orphan" onclick="disableMyText()" value="true">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="fname" class="col-sm-2 control-label">Father:</label>
				    <div class="col-sm-10">
				      <input type="text" name="fname" value="" class="form-control" id="fname" placeholder="Enter Father Name" required>
				    </div>
				  </div>
				 <div class="form-group">
				    <label for="mname" class="col-sm-2 control-label">Mother:</label>
				    <div class="col-sm-10">
				      <input type="text" name="mname" value="" class="form-control" id="mname" placeholder="Enter Mother Name" required>
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="gname" class="col-sm-2 control-label">Guardian :</label>
				    <div class="col-sm-10">
				      <input type="text" name="gname" value="" class="form-control" id="gname" placeholder="Enter Guardian Name" required disabled>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="caste" class="col-sm-2 control-label">Caste :</label>
				    <div class="col-sm-10">
				      <input type="text" name="caste" value="" class="form-control" id="caste" placeholder="Enter Caste Name" required>
				    </div>
				  </div>
				  <div class="form-group">
				    
						<label for="country" class="col-sm-2 control-label">Category</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="cat" id="country">
				      	<option value="" disabled selected>Select</option>
				      	<option value="SC/ST">SC/ST</option>
				      	<option value="obc">OBC</option>
				      	<option value="general">General</option>
				      </select>
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="add" class="col-sm-2 control-label">Address:</label>
				    <div class="col-sm-10">
				      <input type="text" name="add" class="form-control" id="mname" placeholder="Enter Address" rows="5" required>
				    </div>
				  </div>
				  
			</div>
			<div class="step">
				<h4>Acadamics Details</h4>
				   <div class="form-group">
				    <label for="puc" class="col-sm-2 control-label">P U C :</label>
				    <div class="col-sm-10">
				      <input type="number" name="pu" class="form-control" id="pu" placeholder="Enter PU Percentage"  required>
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="sslc" class="col-sm-2 control-label">S S L C :</label>
				    <div class="col-sm-10">
				      <input type="number" name="sslc"  class="form-control" id="sslc" placeholder="Enter SSLC Percentage"  required>
				    </div>
				  </div>			  
				 <div class="form-group">
				    <label for="ai" class="col-sm-2 control-label">Annual Income:</label>
				    <div class="col-sm-10">
				      <input type="number" name="ai"  class="form-control" id="ai" placeholder="Enter Annual Income" required>
				    </div>
				 </div>			  
				 <div class="form-group">
				    <label for="sports" class="col-sm-2 control-label">Sports:</label>
				   <div class="col-sm-10">
				      <select class="form-control" name="sports" id="sports">
				      	<option value="none" selected>none</option>
				      	<option value="state">State</option>
				      	<option value="NATIONAL">National </option>
				      	<option value="INTERNATIONAL">International</option>
				      </select>
				    </div>
				 </div>	
				<div class="form-group">
				    <label for="bname" class="col-sm-2 control-label">Bank:</label>
				    <div class="col-sm-10">
				      <input type="text" name="bname" value="" class="form-control" id="bname" placeholder="Enter Bank name" required>
				    </div>
				 </div>
				 <div class="form-group">
				    <label for="ac" class="col-sm-2 control-label">A/c Number:</label>
				    <div class="col-sm-10">
				      <input type="number" name="ac" value="" class="form-control" id="ac" placeholder="Enter Bank account number" required>
				    </div>
				 </div>
				 <div class="form-group">
				    <label for="file" class="col-sm-2 control-label">Attach file:</label>
				    <div class="col-sm-10">
				      <input type="file" name="file" class="form-control" id="file" placeholder="Upload zip or rar file" required>
					  <span> Make zip of all required documents ( Bonafide,income, marks cards, bank passbook & college addmission ) and attach </span>
				    </div>
				 </div>
			</div>

			<div class="row">
			  <div class="col-sm-12">
			      <div class="pull-right">
					<button type="button" class="action btn-sky text-capitalize back btn">Back</button>
					<button type="button" class="action btn-sky text-capitalize next btn">Next</button>
					<button type="submit" name="reg" class="action btn-hot text-capitalize submit btn">Submit</button>
			      </div>
			  </div>
			</div>			

		</div>
		
	  </div> 
	</form> 
   </div>
   <div class="video-background">
		<div class="video-foreground">
		  <video autoplay loop id="video-background" muted plays-inline>
				<source src="images/bg.mp4" type="video/mp4">
			</video>
		</div>
	</div>
	<?php include "footer.php" ?>
	
 </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");
		orphan		= $('#orphan');
		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function(){
			if(current < widget.length){
				// Check validation
				if($(".form").valid()){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
				}
			}
			hideButtons(current);
		})
		
		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				if(current < widget.length){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
					setProgress(current);
				}
			}
			hideButtons(current);
		})

	    $('.form').validate({ // initialize plugin
			ignore:":not(:visible)",			
			rules: {
				name     : "required",
				email    : {required : true, email:true},
				country  : "required",
				aadhar  : "required",
				phone  : "required",
				username : "required",
				course: "required",
				college: "required",
				gen : "required",
				password : "required",
				rpassword: { required : true, equalTo: "#password"},
			},
	    });

	});

	// Change progress bar action
	setProgress = function(currstep){
		var percent = parseFloat(100 / widget.length) * currstep;
		percent = percent.toFixed();
		$(".progress-bar").css("width",percent+"%").html(percent+"%");		
	}

	// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();

		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { 
			// Show entered values
			$(".display label:not(.control-label)").each(function(){
				console.log($(this).find("label:not(.control-label)").html($("#"+$(this).data("id")).val()));	
			});
			btnnext.hide(); 
			btnsubmit.show();
		}
	}
function disableMyText(){  
          if(document.getElementById("orphan").checked == true){  
              document.getElementById("mname").disabled = true;  
              document.getElementById("mname").value = "NULL";  
              document.getElementById("fname").disabled = true;  
              document.getElementById("fname").value = "NULL";  
			  document.getElementById("gname").disabled = false;
			  
          }else{
           document.getElementById("mname").disabled = false;  
              document.getElementById("fname").disabled = false;  
			  document.getElementById("gname").disabled = true;
			  document.getElementById("orphan").value = "false";
			  document.getElementById("gname").value = "NULL";
          }  
     }  
</script>

