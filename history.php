
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
    $con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insert = "select * from reg,courses where reg.uid='$id' and reg.grade=1 and reg.cid=courses.id";
$result = mysqli_query($con,$insert);


    ?>
    <div class="">
        <h1>History</h1>
<h3> Name: <?php echo $username;?></h3>
<h3>id :<?php echo $id;?></h3>
<h3> Number of subjects is : <?php echo  mysqli_num_rows($result); ?> </h3>
<h3>Courses :</h3>
<ul>
   <?php if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
       
  echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : ".$row['term']."</li>";
}}else{?>
    <li> No Course Found</li>
<?php
}
?>
</ul>


    </div>

</body>
</html>