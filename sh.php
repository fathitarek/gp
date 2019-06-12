
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Online Registration Demo MAX Registrations</title>
<style>
body, p, td, input {font-family:arial,sans-serif; font-size:14px;}
.olr-table1 {border-collapse: collapse;}
.olr-table1 th, .olr-table1 td {padding: 3px; border: 1px solid #666666;}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: Auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<div id='olr-content'>
<h3>Registrations for Online Registration Demo MAX</h3>
<script type='text/javascript' language='javascript'>
   function ExcelExport(){
      document.form1.cmd.value='excel';
      document.form1.submit();
   }
</script>
<form name='form1' method='post' action='olr-print-regs.php'>
<input type='hidden' name='cmd' value='data' />
<input type='submit' name='excel' value=' Export to Excel '
 onclick='ExcelExport();' />
</form>

<?php
	session_start();
	$id = $_SESSION["uid"];
	$isReg = $_SESSION["isReg"];
	
	if($isReg){
		echo "<input type='button' value='Edit Courses' onclick=\"window.location='updateCourse.php'\" />";
	}

	$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
	mysqli_select_db($con,"test1") or die (" can not select db ");
	
	$statment1 = "SELECT * from reg WHERE uid = '$id'";
	$result =mysqli_query($con,$statment1);
	if ($result==false)
	{
		die ("sql statment NOT excuted: ".mysqli_error($con));
	}
	
	$courses = array();
	while($row = mysqli_fetch_array($result)){
		array_push($courses,$row ["cid"]);
	}

	$courses_day = array();
	$courses_period = array();
	$courses_name = array();
	
	foreach($courses as $key=>$value){
		$statment1 = "SELECT * from courses WHERE id = '$value'";
		$result =mysqli_query($con,$statment1);
		if ($result==false)
		{
			die ("sql statment NOT excuted: ".mysqli_error($con));
		}
		
		$row = mysqli_fetch_array($result);
		$calc_day = $row["time_day"]-1;
		array_push($courses_day,$calc_day);
		$calc_period = $row["time_period"]-1;
		array_push($courses_period,$calc_period);
		array_push($courses_name,$row["name"]);
	}
	
	
	
	
	$courses_array = array
	  (
		  array("_","_","_","_"),
		  array("_","_","_","_"),
		  array("_","_","_","_"),
		  array("_","_","_","_"),
		  array("_","_","_","_"),
		  array("_","_","_","_")
	  );
	  
	for($i=0; $i<6; $i++){ //7
		if($courses_array[$courses_day[$i]][$courses_period[$i]]!="_"){
			$courses_array[$courses_day[$i]][$courses_period[$i]] = $courses_array[$courses_day[$i]][$courses_period[$i]]."<br>*CONFLICT*<br>".$courses_name[$i];
		}
		else{
			$courses_array[$courses_day[$i]][$courses_period[$i]] = $courses_name[$i];
		}
	}	

	
	echo "<table>
			<tr>
				<td>
				Day/Time
				</td>
				<td>
				8:30-10:10
				</td>
				<td>
				10:30-12:10
				</td>
				<td>
				12:30-02:10
				</td>
				<td>
				2:30-04:00
				</td>
			</tr>";
			
	$courses_days = array("Sat","Sun","Mon","Tue","Wed","Thu");
	for($i=0; $i<6;$i++){
		echo "<tr>";
		echo "<td>".$courses_days[$i]."</td>";
		for($j=0; $j<4;$j++){
			echo "<td>".$courses_array[$i][$j]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	
?>



</div>
</body>
</html>
