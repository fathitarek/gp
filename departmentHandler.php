 <?php
session_start();
$id = $_SESSION["uid"];
$dept = $_POST["dept"];
$traning_dept=$_POST['traning_dept'];
 
$con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insert = "Insert into dept (uid,dept,traning_dept) VALUES ('$id','$dept','$traning_dept')";

$flag1 = mysqli_query($con,$insert);


if($flag1){
    //echo "Done";
header("Location: profile.php");
   // $_SESSION["isReg"] = true;
}
else {
    echo "Error ".mysqli_error($con);
}

?>