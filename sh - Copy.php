
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Online Registration Demo MAX Registrations</title>
<style>
body, p, td, input {font-family:arial,sans-serif; font-size:14px;}
.olr-table1 {border-collapse: collapse;}
.olr-table1 th, .olr-table1 td {padding: 3px; border: 1px solid #666666;}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: Auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<div id='olr-content'>
<h3>Registrations for Online Registration Demo MAX</h3>
<script type='text/javascript' language='javascript'>
   function ExcelExport(){
      document.form1.cmd.value='excel';
      document.form1.submit();
   }
</script>
<form name='form1' method='post' action='olr-print-regs.php'>
<input type='hidden' name='cmd' value='data' />
<input type='submit' name='excel' value=' Export to Excel '
 onclick='ExcelExport();' />
</form>
<h4>Paid Registrations: count = 4</h4>
<table class='olr-table1'>
<thead>
<tr>
<th></th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>

</tr>
<tr>
<th>Saturday</th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</thead>
<tbody>
<tr>
<th>Sunday</th>
<td>communication Skills (NC133)<br> Lect./Room:406<br> Reem El Gendy</td>
<td></td>
<td>Decision Support Systems (IS461)<br> Lect./Room:303<br> Khalled Mahar</td>
<td>Mobile Computig Application<br> (IS433) Sec./Room:106 <br> alaa said ahmed</td>
<td></td>


</tr>
<tr>
<th>Monday<th>
<td></td>
<td></td>
<td></td>
<td></td>




</tr>
<tr>
<th>Tuesday</th>
<td>Decision Support Systems (IS461 )<br>
Sec. / Room: 302 <br>
هبةالله مصطفى انورمصطفى</td>
<td></td>
<td>Communication Skills (NC133 )<br>
Lect. / Room: 204 <br>
ريم فوزي زكي الجندي</td>
<td></td>
<td></td>


</tr>
<tr>
<th>Wednesday</th>
<td></td>
<td>Advanced Database Systems (IS374 )<br>
Lect. / Room: 303 <br>
اسامه محمد بدوى</td>
<td>Advanced Database Systems (IS374 )<br>
Lect. / Room: 303 <br>
اسامه محمد بدوى</td>
<td></td>
<td></td>


</tr>
<tr>
<th>Thrusday</th>
<td></td>
<td>Mobile Computing Applications (IS433 )<br>
Lect. / Room: 302 <br>
حسام عبداللطيف محمد سليم</td>
<td></td>
<td>Project II (IS402 )<br>
Lect.</td>
<td></td>


</tr>
<tr>
<th>Friday</th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>


</tr>
</tbody>
</table>


</div>
</body>
</html>
