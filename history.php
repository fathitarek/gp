
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    
</head>

<body>

<?php
function storey_sort($building_a, $building_b) {
    return $building_a["term"] - $building_b["term"];
}

    session_start();
    var_dump($_SESSION['term60']);

    $id = $_SESSION["uid"];
    $username = $_SESSION["username"];
    $con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insert = "select * from reg,courses where reg.uid='$id' and reg.grade=1 and reg.cid=courses.id order by courses.term";
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
        if ($row['term']!=0) {
      
       
  echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : ".$row['term']."</li>";
}}}else{?>
    <li> No Course Found</li>
<?php
}
?>
</ul>

<h3>Minor Department Courses :</h3>
<ul>
   <?php 
   $insert = "select * from reg,courses where reg.uid='$id' and reg.grade=1 and reg.cid=courses.id order by courses.term";
$result = mysqli_query($con,$insert);
$result_history=array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        if ($row['term']==0) {
            // if (isset($_SESSION['term6'])) {
                
            
           if ((isset($_SESSION['term60'])&&$row['id']==$_SESSION['term60'])||(isset($_SESSION['term61'])&&$row['id']==$_SESSION['term61'])||(isset($_SESSION['term62'])&&$row['id']==$_SESSION['term62'])||(isset($_SESSION['term63'])&&$row['id']==$_SESSION['term63'])||(isset($_SESSION['term64'])&&$row['id']==$_SESSION['term64'])||(isset($_SESSION['term65'])&&$row['id']==$_SESSION['term65'])||(isset($_SESSION['term66'])&&$row['id']==$_SESSION['term66'])) {
               $row['term']=6;
                 // echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : 6</li>";
$term6=array("id"=>$row['id'],'name'=>$row['name'],'term'=>6);
array_push($result_history, $term6);

           }
       if ((isset($_SESSION['term70'])&&$row['id']==$_SESSION['term70'])||(isset($_SESSION['term71'])&&$row['id']==$_SESSION['term71'])||(isset($_SESSION['term72'])&&$row['id']==$_SESSION['term72'])||(isset($_SESSION['term73'])&&$row['id']==$_SESSION['term73'])||(isset($_SESSION['term74'])&&$row['id']==$_SESSION['term74'])||(isset($_SESSION['term75'])&&$row['id']==$_SESSION['term75'])||(isset($_SESSION['term76'])&&$row['id']==$_SESSION['term76'])) {
               $row['term']=7;
                 // echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : 7</li>";
$term7=array("id"=>$row['id'],'name'=>$row['name'],'term'=>7);
array_push($result_history, $term7);
           }
       
   if ((isset($_SESSION['term80'])&&$row['id']==$_SESSION['term80'])||(isset($_SESSION['term81'])&&$row['id']==$_SESSION['term81'])||(isset($_SESSION['term82'])&&$row['id']==$_SESSION['term82'])||(isset($_SESSION['term83'])&&$row['id']==$_SESSION['term83'])||(isset($_SESSION['term84'])&&$row['id']==$_SESSION['term84'])||(isset($_SESSION['term85'])&&$row['id']==$_SESSION['term85'])||(isset($_SESSION['term86'])&&$row['id']==$_SESSION['term86'])) {
               $row['term']=8;  
                 // echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : 8</li>";
                 $term8=array("id"=>$row['id'],'name'=>$row['name'],'term'=>8);
array_push($result_history, $term8);
   
}       
}
}
 usort($result_history, "storey_sort");
foreach($result_history as $row) {
    echo "<li> ". $row['id'].'-'.$row['name']."  In  Term : ".$row['term']."</li>";
}
}else{?>
    <li> No Course Found</li>
<?php
}
?>
</ul>
    </div>

</body>
</html>