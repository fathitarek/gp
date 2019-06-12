 <?php
session_start();
$id = $_SESSION["uid"];
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];
$c4 = $_POST["c4"];
$c5 = $_POST["c5"];
$c6 = $_POST["c6"];
// $pt = $_POST["pt"];

$con = mysqli_connect("localhost","root","") or die("Error in Server");
$db = mysqli_select_db($con,"test1") or die("Error in DB");

$insertCourse1 = "Insert into reg (uid,cid) VALUES ('$id','$c1')";
$insertCourse2 = "Insert into reg (uid,cid) VALUES ('$id','$c2')";
$insertCourse3 = "Insert into reg (uid,cid) VALUES ('$id','$c3')";
$insertCourse4 = "Insert into reg (uid,cid) VALUES ('$id','$c4')";
$insertCourse5 = "Insert into reg (uid,cid) VALUES ('$id','$c5')";
$insertCourse6 = "Insert into reg (uid,cid) VALUES ('$id','$c6')";
// $insertCourse7 = "Insert into reg (uid,cid) VALUES ('$id','$pt')";
$flag1 = mysqli_query($con,$insertCourse1);
$flag2 = mysqli_query($con,$insertCourse2);
$flag3 = mysqli_query($con,$insertCourse3);
$flag4 = mysqli_query($con,$insertCourse4);
$flag5 = mysqli_query($con,$insertCourse5);
$flag6 = mysqli_query($con,$insertCourse6);
// $flag7 = mysqli_query($con,$insertCourse7);

if($flag1&&$flag2&&$flag3&&$flag4&&$flag5&&$flag6){
	//echo "Done";
header("Location: sh.php");
	$_SESSION["isReg"] = true;
}
else {
	echo "Error ".mysqli_error($con);
}

?>