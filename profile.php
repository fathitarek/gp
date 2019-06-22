<?php
session_start();
$id = $_SESSION["uid"];

$username = $_SESSION["username"];
$faculty = $_SESSION["faculty"];
$department = $_SESSION["department"];
$period = $_SESSION["period"];
$GPA = $_SESSION["GPA"];
$AchievedHours = $_SESSION["AchievedHours"];

$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
mysqli_select_db($con,"test1") or die (" can not select db ");
$gpa_sql="select * from gpa_student where id='$id'";
$gpa_result =mysqli_query($con,$gpa_sql);
$gpa_array=array();
while($row_gpa = mysqli_fetch_array($gpa_result)){
  array_push($gpa_array,$row_gpa['gpa']);
}
$statment1="select * from reg where reg.uid='$id' and grade=1 ";
  $result =mysqli_query($con,$statment1);
  if(mysqli_num_rows($result)>0){
    $number_of_sub=mysqli_num_rows($result);
     $number_of_hours=$number_of_sub*3;

if ($number_of_hours>18&&$number_of_hours <=36) {// term2
  // echo "term2";
  //$_SESSION['no_term'];
  $_SESSION['num_term']=2;
  $courses_sql = "SELECT * from courses where (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 ) and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
}
if ($number_of_hours>36&&$number_of_hours <=54) { //term3
 $_SESSION['num_term']=3;

}
if ($number_of_hours>54&&$number_of_hours <=75) {//term4
 $_SESSION['num_term']=4;
}
if($number_of_hours>75&&$number_of_hours <=96) { //term5
 $_SESSION['num_term']=5;
}

if($number_of_hours>96&&$number_of_hours <=117) {// term6
 $_SESSION['num_term']=6;

}

if($number_of_hours>117&&$number_of_hours <=138) { // term7
 $_SESSION['num_term']=7;
}

if($number_of_hours>138&&$number_of_hours <=159) { // term 8
 $_SESSION['num_term']=8;
}
}
?>
<html lang="en" dir="ltr"><head>
  <meta charset="utf-8">
  <title>Profile</title>
  <meta name="description" content="Just Descriptain">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- NOTE: For Mobile Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <!-- NOTE: For IE Responsive -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="mystyle.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: #162145; color: black; overflow-x: hidden;">
  <div class="container" style="margin:20px auto">
    <div class="jumbotron" style="display:flex;">
      <div class="card" style="width: 40%;">
        <img class="card-img-top" src="images/university.jpg" alt="Card image cap">
        <div class="card-body">
          <h6><?php  echo $username  ?></h6>
        </div>
      </div>
      <div class="card" style="width: 59%;">
        <table class="table table-hover" style=" margin: auto;">
          <tbody>
            <tr>
              <td class="text-primary">Faculty</td>
              <td><?php  echo $faculty  ?></td>
            </tr>
            <tr>
              <td class="text-primary">Department </td>
              <?php
              $insert = "select * from dept where uid='$id'";
              $result = mysqli_query($con,$insert);
              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                 if ($row['dept']=='CS') {
                  echo "<td> your Minor Department is Computer science (". $row['dept'].")</td>";
                }
                if ($row['dept']=='SE') {
                  echo "<td> your Minor Department is Software engineering (". $row['dept'].")</td>";
                }
                if ($row['dept']=='GM') {
                  echo "<td> your Minor Department is Graphics & multimedia (". $row['dept'].")</td>";
                }
                if ($row['dept']=='IS') {
                  echo "<td> your Minor Department is Informations systems (". $row['dept'].")</td>";
                }


              }
            }else {?>
              <td> Not Register Department Till Now</td>
            <?php }
            ?>

          </tr>
          <tr>
            <td class="text-primary">Period </td>
            <td><?php  
            $statment1="select * from reg where reg.uid='$id' ";
            $result =mysqli_query($con,$statment1);
            if(mysqli_num_rows($result)==0){
              echo 1;}
              elseif(isset($_SESSION['num_term'])){ 
                echo $_SESSION['num_term']; }

                else{}
                  ?></td>
              </tr>
              <tr>
                <td class="text-primary">GPA </td>
                <td><?php  echo $gpa_array[0];  ?></td>
              </tr>
              <tr>
                <td class="text-primary">Achieved Hours </td>
                <?php
                $statment1="select * from reg where reg.uid='$id' and grade=1";
                $result =mysqli_query($con,$statment1);
                if(mysqli_num_rows($result)>0){
                  $number_of_sub=mysqli_num_rows($result);

                  $number_of_hours=$number_of_sub*3;
                  if($number_of_hours<=54){
                   echo "<td>".$number_of_hours."</td>";  
                 }
    if ($number_of_hours>54&&$number_of_hours <=75) {//term4

 $fail="select * from reg where reg.uid='$id' and grade=0";
                $result_fail =mysqli_query($con,$fail);
                if(mysqli_num_rows($result_fail)>0){
                  $number_of_sub_fail=mysqli_num_rows($result_fail);
        echo "<td>".$number_of_hours."</td>"; 
                  }else{
          $number_of_hours-=3;
      echo "<td>".$number_of_hours."</td>"; 
                  }
    }
if($number_of_hours>75&&$number_of_hours <=96) { //term5
$fail="select * from reg where reg.uid='$id' and grade=0";
                $result_fail =mysqli_query($con,$fail);
                if(mysqli_num_rows($result_fail)>0){
                  $number_of_sub_fail=mysqli_num_rows($result_fail);
        echo "<td>".$number_of_hours."</td>"; 
                  }else{
  $number_of_hours-=6;
  echo "<td>".$number_of_hours."</td>";  
}
}
if($number_of_hours>96&&$number_of_hours <=117) {// term6
$fail="select * from reg where reg.uid='$id' and grade=0";
                $result_fail =mysqli_query($con,$fail);
                if(mysqli_num_rows($result_fail)>0){
                  $number_of_sub_fail=mysqli_num_rows($result_fail);
        echo "<td>".$number_of_hours."</td>"; 
                  }else{
  $number_of_hours-=9;
  echo "<td>".$number_of_hours."</td>";  
}
}
if($number_of_hours>117&&$number_of_hours <=138) { // term7
$fail="select * from reg where reg.uid='$id' and grade=0";
                $result_fail =mysqli_query($con,$fail);
                if(mysqli_num_rows($result_fail)>0){
                  $number_of_sub_fail=mysqli_num_rows($result_fail);
        echo "<td>".$number_of_hours."</td>"; 
                  }else{
  $number_of_hours-=12;
  echo "<td>".$number_of_hours."</td>"; 
  // echo "ggg"; 
}
}
if($number_of_hours>138&&$number_of_hours <=159) { // term 8
$fail="select * from reg where reg.uid='$id' and grade=0";
                $result_fail =mysqli_query($con,$fail);
                if(mysqli_num_rows($result_fail)>0){
                  $number_of_sub_fail=mysqli_num_rows($result_fail);
        echo "<td>".$number_of_hours."</td>"; 
                  }else{
  $number_of_hours-=15;
  echo "<td>".$number_of_hours."</td>";  
}
}
}else{?>
 <td> Not Register Courses Till Now</td>

<?php  }
?>
</tr>
</tbody>
</table>
</div>

</div>

<div class="jumbotron" style="display:flex;">
  <div class="card" style="width: 100%;">
    <div class="btn-group-vertical" style="width:100%;">
      <a class="btn btn-outline-primary" href="insertCourse.php" role="button"> Register Courses</a>

      <a class="btn btn-outline-primary" href="#" role="button">Minor Study</a>
      <a class="btn btn-outline-primary" href="#" role="button">Community&amp;E-Learning</a>
      <a class="btn btn-outline-primary" href="#" role="button">Open Access</a>
      <a class="btn btn-outline-primary" href="#" role="button">Link</a>
      <a class="btn btn-outline-primary" href="department.php" role="button">Minor Department</a>
      <a class="btn btn-outline-primary" href="history.php" role="button">History</a>

      <a class="btn btn-outline-primary" href="#" role="button">...</a>
    </div></div></div>
  </div>


</body></html>