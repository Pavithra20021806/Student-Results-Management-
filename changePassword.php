<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$msg="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$msg="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al,"UPDATE faculty SET password='$p2' WHERE email='$email'");
		$msg="Successfully Changed your Password";
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
<span class="subhead">Change Password</span>
<br />
<br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="design" align="center">
<tr><td colspan="2" class="msg" align="center"><?php echo $msg;?></td></tr>
<tr><td class="labels">Faculty Name :</td><td><input type="text" name="name" size="25" class="fields" placeholder="Enter Your Name" required="required" /></td></tr>
<tr><td class="labels">Faculty Email :</td><td><input type="email" name="email" size="25" class="fields" placeholder="Enter Your email" required="required" /></td></tr>
<tr><td class="labels">Old Password :</td><td><input type="password" name="old" size="25" class="fields" placeholder="Enter Old Password" required="required" /></td></tr>
<tr><td class="labels">New Password :</td><td><input type="password" name="p1" size="25" class="fields" placeholder="Enter New Password" required="required"  /></td></tr>
<tr><td class="labels">Re-Type Password :</td><td><input type="password" name="p2" size="25"  class="fields" placeholder="Re-Type New Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<br />
<a href="home.php" class="cmd">HOME</a>
</div>
<body>
</body>
</html>