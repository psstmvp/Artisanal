<?php
$name=$gender=$depart=$tmark=$percent=$grade="";
if(isset($_POST["btnSubmit"]))
	{
  	$fname=$_POST["txtfname"];
 	$lname=$_POST["txtlname"];
 	$gender=$_POST["gender"];
	if($gender=="Male")
	  $name="Mr. ".$fname." ".$lname;	
	else if($gender=="Female")
		$name="Ms. ".$fname." ".$lname;
 	$depart=$_POST["ddlDepartment"];
	
	$m1=$_POST["txtm1"];
  	$m2=$_POST["txtm2"];
 	$m3=$_POST["txtm3"];
	$tmark=$m1+$m2+$m3;
	
 	$percent=($tmark*(1/3))."%";
	
    if($percent>=95&&$percent<=100)
    	$grade="S";
	else if($percent>=80)
    	$grade="A";
	else if($percent>=60)
    	$grade="B";
	else if($percent>=40)
    	$grade="C";
	else if($percent>=20)
   		$grade="D";
		else 
		$grade="FAILED";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="497" height="336" border="1">
    <tr>
      <td width="125">First Name</td>
      <td width="356"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="gender" value="Male" />Male
      <label for="gender"></label>
      <input type="radio" name="gender" id="gender" value="Female" />Female
      <label for="gender2"></label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="ddlDepartment"></label>
        <select name="ddlDepartment" id="ddlDepartment">
        <option>---select---</option>
        <option value="BCA">BCA</option>
        <option value="B.com">B.com</option>
        <option value="BBA">BBA</option>
        <option value="CS">CS</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark-1</td>
      <td><label for="txtm1"></label>
      <input type="text" name="txtm1" id="txtm1" /></td>
    </tr>
    <tr>
      <td>Mark-2</td>
      <td><label for="txtm2"></label>
      <input type="text" name="txtm2" id="txtm2" /></td>
    </tr>
    <tr>
      <td>Mark-3</td>
      <td><label for="txtm3"></label>
      <input type="text" name="txtm3" id="txtm3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $name?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender; ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $depart; ?></td>
    </tr>
    <tr>
      <td>Total Mark</td>
      <td><?php echo $tmark; ?></td>
    </tr>
    <tr>
      <td>percentage(%)</td>
      <td><?php echo $percent; ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade;?></td>
    </tr>
  </table>
</form>
</body>
</html>