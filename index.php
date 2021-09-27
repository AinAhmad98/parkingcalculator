<?php 
	include 'template.php';

	require 'controller.php';


	if (isset($_POST["calculate"]) ) {
		if (day($_POST) <= 4) { //If the day inserted was from Monday-Thursday
			if(weekdayparked($_POST) == true ) { //Do weekdayparked
				echo "<script>
					
					</script>";
				} else {
				echo "<script>
						alert ('A. Please try again!');
						
						</script>";
				return false;
				}
		} else
		if (day($_POST) == 5) { //If the day inserted was on Friday
			if (fridayparked($_POST)==true ) {
				echo "<script>
					
					</script>";
			} else {
			echo "<script>
						alert ('B. The logic is still under maintenance :)');
						
						</script>";
				return false;
				}
		} else
		if (day($_POST) == 6 ) { //If the day inserted was on Saturday
			if (saturdayparked($_POST) == true) { //Do saturdayparked
				echo "<script>
					
					</script>";
				} else {
				echo "<script>
						alert ('C. Please try again!');
						</script>";
				}
		} else
		if (day($_POST) == 7 ) { //If the day inserted was on Sunday
			if (sundayparked($_POST) == true) { //Do sundayparked
				echo "<script>
					
					</script>";
				} else {
				echo "<script>
						alert ('D. Please try again!');
						</script>";
				}
		} else
		if (day($_POST) == 8 ) { //If the day inserted was not listed
				echo "<script>
					alert ('E. Day inserted is not valid!');
					</script>";
				} 

}
 ?>

  <style>
 	select {
    width: 300px;
    padding: 5px;
    font-size: 16px;
    line-height: 1;
    border: 0;
    border-radius: 5px;
    height: 34px;
    background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat right #ddd;
    -webkit-appearance: none;
    background-position-x: 98%;
}
 </style>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>

<body> -->
	<div class="container">
		<!-- <div class="m-3 title">PENANG<span>SENTRAL</span></div> -->
		<div class="mt-5 pb-3">This parking rate calculator fee. Plan your time and save money before park!</div>
		<div class="row">
			<div class="col-md">
				<table class="table table-bordered">
					<thead>
						<tr class="table-primary">
							<th colspan="2" class="text-center">DAYS</th>
						</tr>
						<tr>
							<th>Days</th>
							<th>No</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Monday</td>
							<td>[1]</td>
						</tr>
						<tr>
							<td>Tuesday</td>
							<td>[2]</td>
						</tr>
						<tr>
							<td>Wednesday</td>
							<td>[3]</td>
						</tr>
						<tr>
							<td>Thursday</td>
							<td>[4]</td>
						</tr>
						<tr>
							<td>Friday</td>
							<td>[5]</td>
						</tr>
						<tr>
							<td>Saturday</td>
							<td>[6]</td>
						</tr>
						<tr>
							<td>Sunday</td>
							<td>[7]</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md">
				<table class="table table-bordered border-primary ">
					<thead class="">
						<tr class="table-primary">
							<th colspan="2" class="text-center">PARKING FEES</th>
						</tr>
						<tr>
							<th>Hour</th>
							<th>Rate</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>First 2 hour</td>
							<td>RM 5</td>
						</tr>
						<tr>
							<td>Office hour</td>
							<td>RM 3</td>
						</tr>
						<tr>
							<td>After office hour</td>
							<td>RM 4</td>
						</tr>
						<tr>
							<td>Saturday & Sunday</td>
							<td>RM 2</td>
						</tr>
						<tr>
							<td class="table-danger">Public Holiday</td>
							<td class="table-danger">RM 2</td>
						</tr>
					</tbody>
				</table>
			</div>
			

			
			<div class="col-md">
				
				<div class="form-group">
					<label for="day" class=" btn badge-warning" > Maximum hour park only 1 day or 24 hour.</label>
				</div> 
				
				<form action="" method="post">
					<div class="form-group">
						<!-- <label for="day"> Number corresponding to day</label> -->
					 		<select class="form-control" name="day" id="day">
					 			<option selected>Pick your day</option>
					 			<option  value="monday" >Monday</option>
					 			<option  value="tuesday" >Tuesday</option>
					 			<option  value="wednesday" >Wednesday</option>
					 			<option  value="thursday" >Thursday</option>
					 			<option  value="friday" >Friday</option>
					 			<option  value="saturday" >Saturday</option>
					 			<option  value="sunday" >Sunday</option>
					 		</select>
					</div>  

					<div class="input-group mb-3">
						<!-- <label for="entrance">Entrance hour: </label> -->
					 		<select class=" form-select " name="entrance" id="entrance" required="">
								<option selected="">Entrance hour</option>
								<?php  for ($x = 1; $x <= 12; $x++) :?>
					 			<option  class="form-control" value="<?php echo $x; ?>" ><?php echo $x; ?></option>
								 <?php endfor ?>
					 		</select> 

					 		 <select class="form-select input-group-text" name="enter_typography" id="enter_typography">
					 			<option  value="1" >AM</option>
					 			<option  value="2" >PM</option>
					 		</select> 
					</div>

					<div class="input-group mb-3">
						<!-- <label for="Exit">Exit hour: </label> -->
					 		<select class=" form-select " name="exit" id="exit" required="">
								<option selected="">Exit hour</option>
								<?php  for ($x = 1; $x <= 12; $x++) :?>
					 			<option  class="form-control" value="<?php echo $x; ?>" ><?php echo $x; ?></option>
								 <?php endfor ?>
					 		</select> 

					 		 <select class="form-select input-group-text" name="exit_typography" id="exit_typography">
					 			<option  value="1" >AM</option>
					 			<option  value="2" >PM</option>
					 		</select> 
					</div>

					

					<button type="submit" name="calculate" class="btn btn-info" href="controller.php">Calculate now!</button>
				</form>
			</div>
		</div> 
	</div>

    <footer class="bg-dark text-white">
    	<div class="container">
    		<div class="row">
    			<div class="col py-3">
    				<div class="text-center">Copyright@NurulAin Ahmad</div>
    			</div>
    		</div>
    	</div>
    </footer>
