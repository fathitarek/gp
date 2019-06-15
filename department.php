
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
       $username = $_SESSION["username"];
    echo "<h3>welcome : " .$username."</h3>";
    $con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insert = "select * from dept where uid='$id'";
$result = mysqli_query($con,$insert);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
       if ($row['dept']=='CS') {
            echo "<h3> your Minor Department is Computer science (". $row['dept'].")</h3>";
       }
       if ($row['dept']=='SE') {
            echo "<h3> your Minor Department is Software engineering (". $row['dept'].")</h3>";
       }
       if ($row['dept']=='GM') {
            echo "<h3> your Minor Department is Graphics & multimedia (". $row['dept'].")</h3>";
       }
       if ($row['dept']=='IS') {
            echo "<h3> your Minor Department is Informations systems (". $row['dept'].")</h3>";
       }


          if ($row['traning_dept']=='db') {
            echo "<h3> your Minor Department is Database</h3>";
       }
       if ($row['traning_dept']=='net') {
            echo "<h3> your Minor Department is Network </h3>";
       }
       if ($row['traning_dept']=='multi') {
            echo "<h3> your Minor Department is Multimedia </h3>";
       }
      
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

<select name="dept" required>
    <option value=""> Choose Minor Department</option>
    <option value="CS">Computer science(CS)</option>
    <option value="SE">Software engineering(SE)</option>
    <option value="GM">Graphics & multimedia(GM)</option>
    <option value="IS">Informations systems(IS)</option>
</select>

<!-- Professional Training Network
professional Training Database
professional Training Multimedia -->

<select name="traning_dept" required>
    <option value=""> Choose Traning Department</option>
    <option value="net"> Network</option>
    <option value="db">Database</option>
    <option value="multi">MultiMedia</option>
</select>
    <p style='text-align:left;'><input name="submit" type="submit" value="OK" />

</form>
    </div>
<?php } ?>
</body>
</html>