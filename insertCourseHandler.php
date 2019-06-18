 <?php
 session_start();
 $term6=array();
 $term7=array();
 $term8=array();

 $id = $_SESSION["uid"];
 $con = mysqli_connect("localhost","root","") or die (" can not establish connection ");

 mysqli_select_db($con,"test1") or die (" can not select db ");

 $statment1="select * from reg where reg.uid='$id' ";

 $result =mysqli_query($con,$statment1);
   // if(mysqli_num_rows($result)>0){
 $number_of_sub=mysqli_num_rows($result);
// var_dump($number_of_sub);
 $number_of_hours=$number_of_sub*3;
 $c1 = $_POST["c1"];
 $c2 = $_POST["c2"];
 $c3 = $_POST["c3"];
 $c4 = $_POST["c4"];
 $c5 = $_POST["c5"];
 if (isset($_POST["c6"])) {
 	$c6 = $_POST["c6"];
 }
 if (isset($_POST["pt"])) {
 	$pt = $_POST["pt"];

 	if($number_of_hours>=96&&$number_of_hours <117) {
 		$_SESSION['term60']=$pt;
 	}
 	if($number_of_hours>=117&&$number_of_hours <138) {
 		$_SESSION['term70']=$pt;
 	}
 	if($number_of_hours>126&&$number_of_hours <=144) {
 		$_SESSION['term80']=$pt;

 	}	
 }


 if($number_of_hours>=96&&$number_of_hours <117) {
 	$_SESSION['term61']=$c1;
 	$_SESSION['term62']=$c2;
 	$_SESSION['term63']=$c3;
 	$_SESSION['term64']=$c4;
 	$_SESSION['term65']=$c5;
 	if (isset($_POST["c6"])) {
 		$_SESSION['term66']=$c6;
 	}
// $_SESSION['term6']=$term6;
// var_dump($_SESSION['term6']);
// print_r("expression");
// die();
 }
 if($number_of_hours>=117&&$number_of_hours <138) {
 	$_SESSION['term71']=$c1;
 	$_SESSION['term72']=$c2;
 	$_SESSION['term73']=$c3;
 	$_SESSION['term74']=$c4;
 	$_SESSION['term75']=$c5;
 	if (isset($_POST["c6"])) {
 		$_SESSION['term76']=$c6;
 	}
// $_SESSION['term7']=$term7;
// var_dump($_SESSION['term7']);
// print_r("expression");
// die();
 }

if($number_of_hours>=138&&$number_of_hours <159) { // term 8

 	$_SESSION['term81']=$c1;
 	$_SESSION['term82']=$c2;
 	$_SESSION['term83']=$c3;
 	$_SESSION['term84']=$c4;
 	$_SESSION['term85']=$c5;
 	if (isset($_POST["c6"])) {
 		$_SESSION['term86']=$c6;
 	}
// $_SESSION['term8']=$term8;
 }

 $select_courses=array();
 array_push($select_courses,$_POST ["c1"]);
 array_push($select_courses,$_POST ["c2"]);
 array_push($select_courses,$_POST ["c3"]);
 array_push($select_courses,$_POST ["c4"]);
 array_push($select_courses,$_POST ["c5"]);
 array_push($select_courses,$_POST ["c6"]);
 if (isset($_POST["pt"])) {
 	array_push($select_courses,$_POST ["pt"]);
 }
 $_SESSION['select_courses']=$select_courses;

 $con = mysqli_connect("localhost","root","") or die("Error in Server");
 $db = mysqli_select_db($con,"test1") or die("Error in DB");

 $exist1="select * from reg where reg.uid='$id' and cid='$c1' and grade=0";
 $exist2="select * from reg where reg.uid='$id' and cid='$c2' and grade=0";
 $exist3="select * from reg where reg.uid='$id' and cid='$c3' and grade=0";
 $exist4="select * from reg where reg.uid='$id' and cid='$c4' and grade=0";
 $exist5="select * from reg where reg.uid='$id' and cid='$c5' and grade=0";
 if (isset($_POST["c6"])) {
 	$exist6="select * from reg where reg.uid='$id' and cid='$c6' and grade=0";
 }
 $result1 =mysqli_query($con,$exist1);
 $result2 =mysqli_query($con,$exist2);
 $result3 =mysqli_query($con,$exist3);
 $result4 =mysqli_query($con,$exist4);
 $result5 =mysqli_query($con,$exist5);
 if (isset($_POST["c6"])) {
 	$result6 =mysqli_query($con,$exist6);
 }
 // print_r(mysqli_num_rows($result1));

 if(mysqli_num_rows($result1)>0){
 	$insertCourse1= "update reg   set reg.grade=1 where  reg.uid='$id' and cid='$c1'";
 }else{
 	print_r("else");
 	$insertCourse1 = "Insert into reg (uid,cid) VALUES ('$id','$c1')";
 }


 if(mysqli_num_rows($result2)>0){
 	$insertCourse2="update reg   set reg.grade=1 where  reg.uid='$id' and cid='$c2'";
 }else{
 	$insertCourse2 = "Insert into reg (uid,cid) VALUES ('$id','$c2')";

 }


 if(mysqli_num_rows($result3)>0){
 	$insertCourse3="UPDATE reg   set reg.grade=1 where  reg.uid='$id' and cid='$c3'";
 }else{
 	$insertCourse3 = "Insert into reg (uid,cid) VALUES ('$id','$c3')";
 }

 if(mysqli_num_rows($result4)>0){
 	$insertCourse4="UPDATE reg   set reg.grade=1 where  reg.uid='$id' and cid='$c4'";
 }else{
 	$insertCourse4 = "Insert into reg (uid,cid) VALUES ('$id','$c4')";
 }

 if(mysqli_num_rows($result5)>0){
 	$insertCourse5="UPDATE reg   set reg.grade=1 where  reg.uid='$id' and cid='$c5'";
 }else{
 	$insertCourse5 = "Insert into reg (uid,cid) VALUES ('$id','$c5')";
 }
 if (isset($_POST["c6"])) {
 	if(mysqli_num_rows($result6)>0){
 		$insertCourse6="UPDATE reg   set reg.grade=1 where  reg.uid='$id' and cid='$c6'";
 	}else{

 		$insertCourse6 = "Insert into reg (uid,cid) VALUES ('$id','$c6')";
 	}


 }
 if (isset($_POST["pt"])) {
 	$insertCourse7 = "Insert into reg (uid,cid) VALUES ('$id','$pt')";}

// $insertCourse7 = "Insert into reg (uid,cid) VALUES ('$id','$pt')";
 	$flag1 = mysqli_query($con,$insertCourse1);
 	$flag2 = mysqli_query($con,$insertCourse2);
 	$flag3 = mysqli_query($con,$insertCourse3);
 	$flag4 = mysqli_query($con,$insertCourse4);
 	$flag5 = mysqli_query($con,$insertCourse5);
 	$flag6 = mysqli_query($con,$insertCourse6);

 	if (isset($_POST["pt"])) {

 		$flag7 = mysqli_query($con,$insertCourse7);
 	}
 	if($flag1&&$flag2&&$flag3&&$flag4&&$flag5&&$flag6){
	//echo "Done";
 		header("Location: sh.php");
 		$_SESSION["isReg"] = true;
 	}
 	else {
 		echo "Error ".mysqli_error($con);
 	}

 	?>