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
<br />

</select>
<?php
	session_start();
	$id = $_SESSION["uid"];
	echo "welcome " .$id;
 
	$con = mysqli_connect("localhost","root","") or die (" can not establish connection ");
	mysqli_select_db($con,"test1") or die (" can not select db ");
	
	$statment1 = "SELECT * from reg WHERE uid = '$id'";
	$result =mysqli_query($con,$statment1);
	if ($result==false)
	{
		die ("sql statment NOT excuted: ".mysqli_error($con));
	}

	if(mysqli_affected_rows($con) >0){
		header("Location: sh.php");
		$_SESSION["isReg"] = true;
	}
?>
 
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 1</h3></legend>
<span class='olr-label'>Please Select Course 1 </span>
<select name='c1'>

  <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451-Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>


</select>

</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 2</h3></legend
<span class='olr-label olr-required'>Please Select Course 2</span>
<select name='c2'>
  <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451	Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>

 
 </select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 3</h3></legend>
  <span class='olr-label olr-required'>Please Select Course 3</span>
<select name='c3'>
  <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451	Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>
  
</select>
</fieldset>
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 4</h3></legend>
 <span class='olr-label olr-required'>Please Select Course 4</span>
<select name='c4'>
  <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451	Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>
  </select>

</fieldset>
<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 5</h3> </legend>
  <span class='olr-label olr-required'>Please Select Course 5</span>
<select name='c5'>
    <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451	Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>
  
  
	</select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> <h3> Course 6</h3> </legend>
  <span class='olr-label olr-required'>Please Select Course 6</span>
<select name='c6'>
    <option value='BA101'>BA101-Calculus 1</option>
  <option value='BA113'>BA113-Physics</option>
  <option value='CS111'>CS111-Introduction to Computers</option>
  <option value='IS171'>IS171-Introduction to Information systems</option>
  <option value='LH135'>LH135-English For Specific Purposes I</option>
  <option value='NC172'>NC172-Fundamentals of Business</option>
  <option value='BA102'>BA102-Calculus 2</option>
  <option value='CS143'>CS143-Introduction to Problem Solving and Programming</option>
  <option value='EC134'>EC134-Fundamentals of Electronics</option>
  <option value='GM311'>GM311-Introduction to Multimedia</option>
  <option value='LH136'>LH136-English For Specific Purposes II</option>
  <option value='NC133'>NC133-Communication Skills</option>
  <option value='BA201'>BA201-Calculus III</option>
  <option value='BA203'>BA203-Probability and Statistics</option>
  <option value='BA216'>BA216-Advanced Physics</option>
  <option value='CE216'>CE216-Digital Logic Design</option>
  <option value='CS202'>CS202-Discrete Structures</option>
  <option value='CS243'>CS243-Object Oriented Programming</option>
  <option value='CE231'>CE231-Introduction to Networks</option>
  <option value='CE243'>CE243-Intro.to Computer Architecture</option>
  <option value='CS212'>CS212-Data Structures and Algorithms</option>
  <option value='CS244'>CS244-Advanced Programming Applications</option>
  <option value='IS273'>IS273-Database Systems</option>
  <option value='IT321'>IT321-Professional Training in Programming I (.Net 1)</option>
  <option value='SE291'>SE291-Introduction to Software Engineering</option>
  <option value='BA301'>BA301-Advanced Statistics</option>
  <option value='BA304'>BA304-Linear Algebra</option>
  <option value='CS321'>CS321-Systems Programming</option>
  <option value='CS333'>CS333-Web Programming</option>
  <option value='CS352'>CS352-Computer Graphics</option>
  <option value='IT322'>IT322-Professional Training in Programming II (.Net 2)</option>
  <option value='CS481'>CS481-Computers & Society</option>
  <option value='CS366'>CS451	Human Computer Interaction</option>
  <option value='CS366'>CS366-Introduction to Artificial Intelligence</option>
  <option value='CS322'>CS322-Operating Systems</option>
  <option value='CS401'>CS401-Project 1</option>
  <option value='CS402'>CS402-Project 2</option>
  
  
	</select>
</fieldset>

<fieldset class='olr-line-ht-150'>
  <legend> Professional Training </legend>
  <span class='olr-label olr-required'>Please Select Professional Training Courses</span>

<select name='pt'>
   <option value='IT331'>IT331-Professional Training in Networking 1</option>
   <option value='IT332'>IT332-Professional Training in Networking 2</option>
   <option value='IT333'>IT332	Professional Training in Networking 3</option>
   <option value='IT371'>IT371	Professional Training in Databases 1</option>
   <option value='IT372'>IT372-Professional Training in Databases 2</option>
   <option value='IT373'>IT372-Professional Training in Databases 3</option>
   <option value='IT480'>IT480-Professional Training in Multimedia 1</option>
   <option value='IT481'>IT481-Professional Training in Multimedia 2</option>
   <option value='IT482'>IT482-Professional Training in Multimedia 3</option>
  
  
	</select>
	
	<p style='text-align:center;'><input name="submit" type="submit" value="Insert Course" />

</fieldset>
</div>
</body>
</html>
