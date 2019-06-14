<?php
    session_start();
    $username = $_SESSION["username"];
    $faculty = $_SESSION["faculty"];
    $department = $_SESSION["department"];
    $period = $_SESSION["period"];
    $GPA = $_SESSION["GPA"];
    $AchievedHours = $_SESSION["AchievedHours"];


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
              <td><?php  echo $department  ?></td>
            </tr>
            <tr>
              <td class="text-primary">Period </td>
              <td><?php  echo $period  ?></td>
            </tr>
            <tr>
              <td class="text-primary">GPA </td>
              <td><?php  echo $GPA  ?></td>
            </tr>
            <tr>
              <td class="text-primary">Achieved Hours </td>
              <td><?php  echo $AchievedHours  ?></td>
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