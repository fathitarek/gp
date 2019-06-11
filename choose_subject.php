<?php
$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
    mysqli_select_db($con,"test1") or die (" can not select db ");
    session_start();
    $uid = $_SESSION["uid"];
 
    $statment1 = "SELECT * from reg WHERE uid = '$uid'";
    $result =mysqli_query($con,$statment1);
    if ($result==false)
    {
        die ("sql statment NOT excuted: ".mysqli_error($con));
    }
    
    while($row = mysqli_fetch_array($result)){
echo $row[1]."<br>";
    }



?>