<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Online Registration Demo MAX Online Registration</title>
<link rel='stylesheet' href='olr-styles.css'>
<style>
.olr-table1 { border-collapse: collapse;}
.olr-table1 th, .olr-table1 td { padding: 2px; border: 0;}
.olr-table2 { border-collapse: collapse;}
.olr-table2 th, .olr-table2 td { padding: 4px; border: 0;}
</style>
<script src='olr-validate.js'></script>
<script>
CheckShutdownDate('February 22, 2019', 0);
</script>
</head>
<body>
<div id='olr-content'>
<form method='post' id='OnlineRegForm' name='OnlineRegForm' action='insertCourseHandler.php'>
<h2 style='text-align:center;'>Online Registration Demo MAX<br />Online Registration</h2>
<p>Required fields are in <b>BOLD</b> </p>

<!-- list of required fields -->


  

  
</select>
<br />

</select>
<?php
	session_start();
	$id = $_SESSION["uid"];
	echo "welcome " .$id;
 
	$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
	mysqli_select_db($con,"test1") or die (" can not select db ");
	
	$statment = "SELECT * from reg WHERE uid = '$id'";
	$result =mysqli_query($con,$statment);
	if ($result==false)
	{
		die ("sql statment NOT excuted: ".mysqli_error($con));
	}

	if(mysqli_affected_rows($con) >0){
		//header("Location: sh.php");
		$_SESSION["isReg"] = true;
	}
  $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
   // echo $statment1;
    $result =mysqli_query($con,$statment1);
    var_dump( $result);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

?>
 
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 1</h3></legend>
<span class='olr-label'>Please Select Course 1 </span>
<select name='c1'>
  <?php  
        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>
 

</select>

</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 2</h3></legend>
<span class='olr-label olr-required'>Please Select Course 2</span>
<select name='c2'>
    <?php  
  $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";
    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>

 </select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 3</h3></legend>
  <span class='olr-label olr-required'>Please Select Course 3</span>
<select name='c3'>
    <?php  
       $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";

    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>
</select>
</fieldset>
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 4</h3></legend>
 <span class='olr-label olr-required'>Please Select Course 4</span>
<select name='c4'>
     <?php  
        $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";

    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>
  </select>

</fieldset>
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 5</h3> </legend>
  <span class='olr-label olr-required'>Please Select Course 5</span>
<select name='c5'>
      <?php  
         $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";

    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>
</select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 6</h3> </legend>
  <span class='olr-label olr-required'>Please Select Course 6</span>
<select name='c6'>
      <?php  

         $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";

    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }

        while($row = mysqli_fetch_array($result)){   
  ?>
 <option value="<?php echo $row ["id"];?>"><?php  echo $row ["id"].'-'. $row ["name"];  ?></option>
<?php 
 }
?>
</select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> Professional Training </legend>
  <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

<select name='pt'>
   <option value='IT331'>IT331-Professional Training in Networking 1</option>
   <option value='IT332'>IT332-Professional Training in Networking 2</option>
   <option value='IT333'>IT332-Professional Training in Networking 3</option>
   <option value='IT371'>IT371-Professional Training in Databases 1</option>
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option>
  
  
	</select>
	
	<p style='text-align:center;'><input name="submit" type="submit" value="Insert Course" />

</fieldset>
</div>
</body>
</html>
