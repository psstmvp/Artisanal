
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
<?php
$sum=0;
if(isset($_POST["btnadd"]))
{  
	
	$a=$_POST["txtnum1"];
	$b=$_POST["txtnum2"];
	$sum=$a+$b;
	 echo "the sum of $a and $b is :", $sum;

}
$diff=0;
if(isset($_POST["btnsub"]))
{  
	
	$a=$_POST["txtnum1"];
	$b=$_POST["txtnum2"];
	$diff=$a-$b;
	echo "the difference of $a and $b is :", $diff;

}
$prod=0;
if(isset($_POST["btnprod"]))
{  
	
	$a=$_POST["txtnum1"];
	$b=$_POST["txtnum2"];
	$prod=$a*$b;
	echo "the product of $a and $b is :", $prod;

}
$quo=0;
if(isset($_POST["btnquo"]))
{  
	
	$a=$_POST["txtnum1"];
	$b=$_POST["txtnum2"];
	$quo=$a/$b;
	echo "the quoient of $a and $b is :", $quo;

}
?>
</head>
<body>

<form method= "post">
<table border="1">
<tr><td>first Number: </td>
<td><input type="text" name="txtnum1" /></td>
</tr>
<tr>
<td>Second Number</td>
<td><input type= "text" name="txtnum2"/></td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" name="btnadd" value="+"/>
<input type="submit" name="btnsub" value="-"/>
<input type="submit" name="btnprod" value="*"/>
<input type="submit" name="btnquo" value="/"/>
</center>
</td>
</tr>

</table>
</form>

</body>
</html>