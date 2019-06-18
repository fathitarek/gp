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
    <!-- <br /> -->

  </select>
  <?php
  session_start();
  $id = $_SESSION["uid"];
  echo "<h3>welcome " .$id."</h3>";
  echo "<h3>welcome " .$_SESSION['username']."</h3>";
  $con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
  mysqli_select_db($con,"test1") or die (" can not select db ");

  $statment = "SELECT * from reg WHERE reg.grade=1 and  uid = '$id'";
  $result =mysqli_query($con,$statment);
  if ($result==false)
  {
    die ("sql statment NOT excuted: ".mysqli_error($con));
  }
  $old_courses=array();
  while($row = mysqli_fetch_array($result)){
    array_push($old_courses,$row['cid']);
  }
       // print_r($old_courses);

  if(mysqli_affected_rows($con) >0){
		//header("Location: sh.php");
    $_SESSION["isReg"] = true;
  }
  
  $statment1="select * from reg where reg.uid='$id' ";
  $result =mysqli_query($con,$statment1);
  if(mysqli_num_rows($result)>0){
    $number_of_sub=mysqli_num_rows($result);

    $number_of_hours=$number_of_sub*3;
    // echo "nummm";
    var_dump($number_of_hours);
// die();
    if ($number_of_hours>159) {
      header("Location: profile.php");
    }
if ($number_of_hours>=18&&$number_of_hours <36) {// term2
  echo "term2";
  $courses_sql = "SELECT * from courses where courses.term=2 and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
}
if ($number_of_hours>=36&&$number_of_hours <54) { //term3
  // echo "term3";
  $courses_sql = "SELECT * from courses where (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
}
if ($number_of_hours>=54&&$number_of_hours <75) {//term4
  // echo "term4";
  $courses_sql = "SELECT * from courses where (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1) ";
// } and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1)";
}
if($number_of_hours>=75&&$number_of_hours <96) { //term5
// echo "term5";
 // term5
  $courses_sql = "SELECT * from courses where (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 ) ";
// }and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";
}


if($number_of_hours>=96&&$number_of_hours <117) {// term6
// echo "term6";
  $courses_sql = "SELECT * from courses where  (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1) ";
// }and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
// }and courses.id!=courses.pre_id
}

if($number_of_hours>=117&&$number_of_hours <138) { // term7

  $courses_sql = "SELECT * from courses where (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1) ";
// })and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' )";
// } where courses.id!=course.pre_id
}

if($number_of_hours>=138&&$number_of_hours <159) { // term 8

  $courses_sql = "SELECT * from courses where  (courses.term=1 OR courses.term=2 OR courses.term=3 OR courses.term=4 OR courses.term=5 OR courses.term=6 OR courses.term=7 OR courses.term=8 )and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 ) ";
// }
}

if ($number_of_hours==0) {
  $courses_sql = "SELECT * from courses where courses.term=1 ";
}
}else{
// print_r("expression");
// if ($number_of_hours==0) {
  $courses_sql = "SELECT * from courses where courses.term=1 ";
}

$result =mysqli_query($con,$courses_sql);

if ($result==false)
{
  die ("sql statment NOT excuted: ".mysqli_error($con));
}
$new_courses_ids=array();
$new_courses_names=array();
// print_r(mysqli_fetch_array($result));
while($row = mysqli_fetch_array($result)){
  if ($row['pre_id']==null&&$row['term']!=1) {
   continue;
 }
 if ($row['id']=='IT322') {
  continue;
}
//Pre-Request
            // echo  "***".$row['pre_id']."-----";
$statment1="select * from reg where reg.uid='$id' ";
$res =mysqli_query($con,$statment1);
   // if(mysqli_num_rows($result)>0){
$number_of_sub=mysqli_num_rows($res);
// print_r($number_of_sub);
$number_of_hours=$number_of_sub*3;
if ($number_of_hours!=0) {
 // print_r("expression");
                        // echo strpos($row['pre_id'], ',');
  if ($row['id']=='CS401' && $number_of_hours>117&&$number_of_hours <=138) {
    array_push($new_courses_ids,$row['id']);
    array_push($new_courses_names,$row['name']);
  }
  if (strpos($row['pre_id'], ',') !== false) {
                          // print_r($old_courses);
                    // echo  "***".$row['pre_id']."-----";
    $ones=array();
    foreach (explode(",",$row['pre_id']) as  $pre_id) {
                 // echo"-----" .$pre_id."<br>";

      if(in_array($pre_id, $old_courses)){
        array_push($ones, 1);

                      //  array_push($new_courses_ids,$row['id']);
                       // array_push($new_courses_names,$row['name']);

                      }//for
                      // print_r(explode(",",$row['pre_id']));
                      if (sizeof($ones)==sizeof(explode(",",$row['pre_id']))) {
                       array_push($new_courses_ids,$row['id']);
                       array_push($new_courses_names,$row['name']);
                     }
                    }//if
                     // print_r(sizeof($ones));
                  }//end strpos
                  if(in_array($row['pre_id'], $old_courses)){

                    array_push($new_courses_ids,$row['id']);
                    array_push($new_courses_names,$row['name']);

                }//if
              }if($number_of_hours==0){
                // print_r("expressionttt");
                array_push($new_courses_ids,$row['id']);
                array_push($new_courses_names,$row['name']);
              }

}// while el kebera ely btgeb el data 

$courses_sql_fail = "SELECT * from courses , reg  where reg.grade=0 and reg.uid='$id' and reg.cid=courses.id";
$result =mysqli_query($con,$courses_sql_fail);

while($row = mysqli_fetch_array($result)){
  array_push($new_courses_ids,$row['id']);
  array_push($new_courses_names,$row['name']);
}
$statment1="select * from reg where reg.uid='$id' ";
$result =mysqli_query($con,$statment1);
if(mysqli_num_rows($result)>0){
  $number_of_sub=mysqli_num_rows($result);
// var_dump($number_of_sub);
  $number_of_hours=$number_of_sub*3;
// }
if($number_of_hours>96&&$number_of_hours <117) {// term6

  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['dept'];
   $my_dept= $row['dept'];
   $courses_sql2 = "SELECT * from courses where courses.Dept='$my_dept' and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
   $result2 =mysqli_query($con,$courses_sql2);
   while($row = mysqli_fetch_array($result2)){
// Pre Request
    array_push($new_courses_ids,$row['id']);
    array_push($new_courses_names,$row['name']);
  }
}

}


if($number_of_hours>117&&$number_of_hours <=138) { // term7

  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['dept'];
   $my_dept= $row['dept'];
   $courses_sql2 = "SELECT * from courses where courses.Dept='$my_dept' and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
   $result2 =mysqli_query($con,$courses_sql2);
   while($row = mysqli_fetch_array($result2)){
    array_push($new_courses_ids,$row['id']);
    array_push($new_courses_names,$row['name']);
  }
}
}   

if($number_of_hours>138&&$number_of_hours <=159) { // term 8

  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['dept'];
   $my_dept= $row['dept'];
   $courses_sql2 = "SELECT * from courses where courses.Dept='$my_dept' and  courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
   $result2 =mysqli_query($con,$courses_sql2);
   while($row = mysqli_fetch_array($result2)){
    array_push($new_courses_ids,$row['id']);
    array_push($new_courses_names,$row['name']);
  }
}
}

}

   // var_dump($new_courses_ids);

//   $statment1 = "SELECT * from courses where courses.id NOT IN (SELECT reg.cid from reg where reg.uid='$id' and reg.grade=1 )";
//    // echo $statment1;
//     $result =mysqli_query($con,$courses_sql);

//     if ($result==false)
//     {
//         die ("sql statment NOT excuted: ".mysqli_error($con));
//     }
//     $new_courses_ids=array();
//     $new_courses_names=array();
//     while($row = mysqli_fetch_array($result)){
//       if (strpos($row['pre_id'], ',') !== false) {
//     echo  $row['pre_id']."-----";
//     foreach (explode(",",$row['pre_id']) as  $pre_id) {

//     if(in_array($pre_id, $old_courses)){
//         array_push($new_courses_ids,$row['id']);
//         array_push($new_courses_names,$row['name']);

//       }//for
//     }//if
//   }//while

// if(in_array($row['pre_id'], $old_courses)){

  // array_push($new_courses_ids,$row['id']);
//   array_push($new_courses_names,$row['name']);

// }


//     }
// print_r($new_courses_names);

?>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 1</h3></legend>
  <span class='olr-label'>Please Select Course 1 </span>
  <select name='c1'>
    <?php  
       // while($row = mysqli_fetch_array($result)){  
    for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

      ?>
      <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
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
       // while($row = mysqli_fetch_array($result)){  
    for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

      ?>
      <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
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
       // while($row = mysqli_fetch_array($result)){  
    for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

      ?>
      <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
      <?php 
    }
    ?>
  </select>
</fieldset>
<?php if (sizeof($new_courses_ids)>3) {
  ?>
  <fieldset class='olr-line-ht-150'>
    <legend> <h3> Course 4</h3></legend>
    <span class='olr-label olr-required'>Please Select Course 4</span>
    <select name='c4'>

      <?php  
       // while($row = mysqli_fetch_array($result)){  
      for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

        ?>
        <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
        <?php 
      }
      ?>
    </select>

  </fieldset>
<?php } ?>
<?php if (sizeof($new_courses_ids)>4) {
  ?>
  <fieldset class='olr-line-ht-150'>
    <legend> <h3> Course 5</h3> </legend>
    <span class='olr-label olr-required'>Please Select Course 5</span>
    <select name='c5'>
      <?php  
       // while($row = mysqli_fetch_array($result)){  
      for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

        ?>
        <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
        <?php 
      }
      ?>
    </select>
  </fieldset>
<?php } ?>
<?php if (sizeof($new_courses_ids)>5) {
  ?>
  <fieldset class='olr-line-ht-150'>
    <legend> <h3> Course 6</h3> </legend>
    <span class='olr-label olr-required'>Please Select Course 6</span>
    <select name='c6'>
      <?php  
       // while($row = mysqli_fetch_array($result)){  
      for ($i=0; $i <sizeof($new_courses_ids) ; $i++) { 

        ?>
        <option value="<?php echo $new_courses_ids [$i];?>"><?php  echo $new_courses_ids [$i].'-'. $new_courses_names [$i];  ?></option>
        <?php 
      }
      ?>
    </select>

  </fieldset>
<?php }?>

<?php
$statment1="select * from reg where reg.uid='$id' ";
$result =mysqli_query($con,$statment1);
$number_of_sub=mysqli_num_rows($result);
// var_dump($number_of_sub);
$number_of_hours=$number_of_sub*3;
if ($number_of_hours>54&&$number_of_hours <75) {//term4

  ?>
  <fieldset class='olr-line-ht-150'>
    <legend> Professional Training </legend>
    <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

    <select name='pt'>
      <!-- IT321- Professional Training in Programming I (.Net 1) -->
      <option value='IT321'>IT321- Professional Training in Programming I (.Net 1)</option>
  <!--  <option value='IT332'>IT332-Professional Training in Networking 2</option>
   <option value='IT333'>IT332-Professional Training in Networking 3</option>
   <option value='IT371'>IT371-Professional Training in Databases 1</option>
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option> -->


 </select>
<?php } ?>
<?php
if($number_of_hours>=75&&$number_of_hours <96) { //term5

  ?>
  <fieldset class='olr-line-ht-150'>
    <legend> Professional Training </legend>
    <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

    <select name='pt'>
      <!-- IT321- Professional Training in Programming I (.Net 1) -->
      <!-- <option value='IT331'>IT331-Professional Training in Networking 1</option> -->
      <option value='IT322'>IT322-Professional Training in Programming II(.Net 2)</option>
   <!--<option value='IT333'>IT332-Professional Training in Networking 3</option>
   <option value='IT371'>IT371-Professional Training in Databases 1</option>
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option> -->


 </select>
<?php } ?>

<?php
if($number_of_hours>96&&$number_of_hours <117) {// term6
  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['traning_dept'];
   $traning_dept= $row['traning_dept'];
   ?>
   <fieldset class='olr-line-ht-150'>
    <legend> Professional Training </legend>
    <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

    <select name='pt'>
      <?php if ($traning_dept=='db') {?>
       <option  selected value='IT371'>IT371-Professional Training in Databases 1</option>
     <?php }?>
     <?php if ($traning_dept=='multi') {?>
       <option  selected value='IT480'>IT480-Professional Training in Multimedia 1</option>
     <?php }?>
     <?php if ($traning_dept=='net') {?>
       <option  selected value='IT331'>IT331-Professional Training in Networking 1</option>
     <?php }?>
     <!-- <option value='IT331'>IT331-Professional Training in Networking 1</option> -->
     <!-- <option value='IT332'>IT331-Professional Training in Networking 2</option> -->
   <!--<option value='IT333'>IT332-Professional Training in Networking 3</option>
  
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option> -->


 </select>
<?php } 
}?>

<?php
if($number_of_hours>117&&$number_of_hours <=138) { // term7// term7
  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['traning_dept'];
   $traning_dept= $row['traning_dept'];
   ?>
   <fieldset class='olr-line-ht-150'>
    <legend> Professional Training </legend>
    <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

    <select name='pt'>
      <?php if ($traning_dept=='db') {?>
       <option  selected value='IT372'>IT371-Professional Training in Databases 2</option>
     <?php }?>
     <?php if ($traning_dept=='multi') {?>
       <option  selected value='IT481'>IT480-Professional Training in Multimedia 2</option>
     <?php }?>
     <?php if ($traning_dept=='net') {?>
       <option  selected value='IT332'>IT331-Professional Training in Networking 2</option>
     <?php }?>
     <!-- <option value='IT331'>IT331-Professional Training in Networking 1</option> -->
     <!-- <option value='IT332'>IT331-Professional Training in Networking 2</option> -->
   <!--<option value='IT333'>IT332-Professional Training in Networking 3</option>
  
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option> -->


 </select>
<?php } 
}?>


<?php
if($number_of_hours>141&&$number_of_hours <=195) {
  $dept="select * from dept where dept.uid='$id'";
  $result =mysqli_query($con,$dept);
  while($row = mysqli_fetch_array($result)){
        // echo $row['traning_dept'];
   $traning_dept= $row['traning_dept'];
   ?>
   <fieldset class='olr-line-ht-150'>
    <legend> Professional Training </legend>
    <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

    <select name='pt'>
      <?php if ($traning_dept=='db') {?>
       <option  selected value='IT373'>IT371-Professional Training in Databases 3</option>
     <?php }?>
     <?php if ($traning_dept=='multi') {?>
       <option  selected value='IT482'>IT480-Professional Training in Multimedia 3</option>
     <?php }?>
     <?php if ($traning_dept=='net') {?>
       <option  selected value='IT333'>IT331-Professional Training in Networking 3</option>
     <?php }?>
     <!-- <option value='IT331'>IT331-Professional Training in Networking 1</option> -->
     <!-- <option value='IT332'>IT331-Professional Training in Networking 2</option> -->
   <!--<option value='IT333'>IT332-Professional Training in Networking 3</option>
  
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option> -->


 </select>
<?php } 
}?>
<p style='text-align:center;'><input name="submit" type="submit" value="Insert Course" />

</fieldset>
</div>
</body>
</html>
