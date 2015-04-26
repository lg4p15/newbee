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
$ck=$_COOKIE['user'];
if(empty($ck)) die("<script>window.location='../msg.html?ctt=请先登录&rl=joinus/joinus.html'</script>");
if($con = mysql_connect('localhost', $user, $pwd)){
	if(mysql_select_db('tree_newbee')){
		mysql_query("set character set 'utf8'");
		$name = $_POST['name'];
		$sex=$_POST['sex'];
		$stuid=$_POST['stuid'];
		$ins=$_POST['ins'];
		$phone=$_POST['phone'];
		$mail=$_POST['mail'];
		$dep=$_POST['dep'];
		$intro=check_input($_POST['intro']);
		if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$name)) echo "<script>window.location='../msg.html?ctt=姓名含有非法字符&rl=joinus/joinus.html'</script>";
		else if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$sex)) echo "<script>window.location='../msg.html?ctt=性别含有非法字符&rl=joinus/joinus.html'</script>";
		else if(!ereg("^[0-9]+$",$stuid)) echo "<script>window.location='../msg.html?ctt=学号含有非法字符&rl=joinus/joinus.html'</script>";
		else if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$ins))echo "<script>window.location='../msg.html?ctt=学院含有非法字符&rl=joinus/joinus.html'</script>";
		else if(!ereg("^[0-9]+$",$phone))echo "<script>window.location='../msg.html?ctt=手机号码含有非法字符&rl=joinus/joinus.html'</script>";
		else if(!ereg("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$mail))echo "<script>window.location='../msg.html?ctt=邮箱不合法&rl=joinus/joinus.html'</script>";
		else if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$dep))echo "<script>window.location='../msg.html?ctt=申请部门含有非法字符&rl=joinus/joinus.html'</script>";
		else{
			$str="update user set name='$name',sex= '$sex',stuid='$stuid',ins='$ins',phone='$phone',mail='$mail',depjob='$dep',intro=$intro,rights='wantjoin' where id='$ck'";
			if(mysql_query($str))
				echo "<script>window.location='../msg.html?ctt=申请成功，请等待管理员确认&rl=index.html'</script>";
			else
				echo "<script>window.location='../msg.html?rl=joinus/joinus.html'</script>";
		}
	}else{
		echo "<script>window.location='../msg.html?rl=joinus/joinus.html'</script>";
	}
	mysql_close($con);
}else{
	echo "<script>window.location='../msg.html?rl=joinus/joinus.html'</script>";
}
?>	