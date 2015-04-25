<?php
header("Content-type: text/html; charset=utf-8");
function check_input($value)
{
	if (get_magic_quotes_gpc()){
		$value = stripslashes($value);
	}
	if (!is_numeric($value)){
		$value = "'" . mysql_real_escape_string($value) . "'";
	}
	return $value;
}
$user='treenewbee';
$pwd='shuxinfeng';
$con = mysql_connect('localhost', $user, $pwd) or die("<script>window.location='error.html'</script>");	
mysql_select_db('tree_newbee') or die("<script>window.location='error.html'</script>");
	$name = $_POST['name'];
	$sex=$_POST['sex'];
	$stuid=$_POST['stuid'];
	$ins=$_POST['ins'];
	$phone=$_POST['phone'];
	$mail=$_POST['mail'];
	$dep=$_POST['dep'];
	$intro=check_input($_POST['intro']);
	if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$name))die("<script>window.location='ban.html'</script>");
	if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$sex))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[0-9]+$",$stuid))die("<script>window.location='ban.html'</script>");
	if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$ins))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[0-9]+$",$phone))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$mail))die("<script>window.location='email.html'</script>");
	if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$dep))die("<script>window.location='ban.html'</script>");
	$str="insert into wantjoin (name,sex,stu_id,institute,phone_num,mail,dep,intro) values('$name','$sex','$stuid','$ins','$phone','$mail','$dep',$intro)";
	echo $str;
	mysql_query($str)or die("<script>window.location='error.html'</script>");
	mysql_close($con);
?>