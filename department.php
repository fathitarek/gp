
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minor Department</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    
</head>

<body>
<?php
    session_start();
    $id = $_SESSION["uid"];
    echo "welcome " .$id;
    $con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insert = "select * from dept where uid='$id'";
$result = mysqli_query($con,$insert);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
       
  echo "<h3> your Minor Department is ". $row['dept']."</h3>";
}
}else{

    ?>
    <div class="">
        <h3> Minor Department</h3>
   <!-- Computer science  ( CS )
Software engineering ( SE )
Graphics & multimedia (GM)
Informations systems ( IS )
Seen by AhMed AbdAlah at 3:14 AMSeen by Islam Mohamed at 3:14 AM
 -->
<form method="post" action="departmentHandler.php">

<select name="dept">
    <option value="Computer science(CS)">Computer science(CS)</option>
    <option value="Software engineering(SE)">Software engineering(SE)</option>
    <option value="Graphics & multimedia(GM)">Graphics & multimedia(GM)</option>
    <option value="Informations systems(IS)">Informations systems(IS)</option>
</select>
    <p style='text-align:left;'><input name="submit" type="submit" value="OK" />

</form>
    </div>
<?php } ?>
</body>
</html>