<?php
include("config.php");
session_start();
if(isset($_SESSION['roll']))
{
	header("location:viewResult.php");
}
$email=mysqli_real_escape_string($al,$_POST['roll']);
$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
if($_POST['roll']==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM students WHERE roll='$roll' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['roll']=$roll;
		header("location:home.php");
	}
	else
	{
		$msg="Incorrect roll NO or Password";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<style>
body
{
	background-image:url(images/3rd.jpg);
    background-size: fill;
	margin-top:170px;
	background-repeat: no-repeat;
}
</style>
<br />

<div align="center">
<span class="head">STUDENT RESULT MANAGEMENT SYSTEM</span>
<hr class="hr" />
<br />
<br />
<span class="subhead">View Result</span>
<br />
<br />
<br />
<form method="post" action="viewResult.php">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Reg No.:</td><td><input type="text" required="required" name="roll" class="fields" size="15" placeholder="Enter Roll No." /></td></tr>
<tr><td class="labels">Password:</td><td><input type="password" required="required" name="pass" class="fields" size="15" placeholder="Enter Your Password" /></td></tr>

<tr><td colspan="2" align="center"><input type="submit" value="SHOW" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="register.php" class="link">Student Register</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="faculty.php" class="link">Faculty Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="registerFaculty.php" class="link">Faculty Registration</a>
</div>
<body>
</body>
</html>