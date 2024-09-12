

<?php
$smallest=$biggest=$b=$c="";
if(isset($_POST["btnls"]))
  {
   		$biggest=$smallest=$_POST["txtnum1"];
		$b=$_POST["txtnum2"];	
		$c=$_POST["txtnum3"];
		if($b>$biggest)
			$biggest=$b;
		if($b<$smallest)
			$smallest=$b;
		if($c>$biggest)
			$biggest=$c;
		if($c<$smallest)
			$smallest=$c;
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Largest and Samallest</title>

</head>
<body>

<form method="post">
<center>
<table border="1" rules="none">
<tr>
<td>Number 1:</td>
<td><input Type= "text" name="txtnum1"></td>
</tr>
<tr>
<td>Number 2:</td>
<td><input Type= "text" name="txtnum2"></td>
</tr>
<tr><td>Number 3:</td>
<td><input Type= "text" name="txtnum3"></td>
</tr>
<tr>
<td colspan="2"><p align="right"><input type="submit" name="btnls" value="find" /></p></td>
</tr>
</table>
<?php
echo "Biggest Number= ",$biggest,"<br>";
echo "Smallest Number=", $smallest;
?></center>
</form>

</body>
</html>