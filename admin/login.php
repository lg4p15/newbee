<?php
header("Content-type: text/html; charset=utf-8");
$user='treenewbee';
$pwd='shuxinfeng';
$con = mysql_connect('localhost', $user, $pwd) or die("<script>window.location='error.html'</script>");	
mysql_select_db('tree_newbee') or die("<script>window.location='error.html'</script>");
mysql_query("set character set 'utf8'");
if(isset($_POST['name'])){ 
	$name = $_POST['name'];
	$pwd=$_POST['pwd'];
	if(empty($name))die("<script>window.location='noname.html'</script>");
	if(empty($pwd))die("<script>window.location='pwd.html'</script>");
	if(!ereg("^[_0-9a-zA-Z]+$",$name))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_0-9a-zA-Z]+$",$pwd))die("<script>window.location='ban.html'</script>");
//这里还需要对密码进行加密，明文存储有风险
	$res=mysql_query("select name from su where name = '$name' and pwd= '$pwd' limit 1")or die("<script>window.location='error.html'</script>");
	if(mysql_fetch_array($res)){
	setcookie("admin", $user, time()+3600);
	echo "<script target='_top'>window.location='success.html'</script>";
	}else{
	echo "<script>window.location='pwd.html'</script>";
	}
}else{
	$ck=$_COOKIE['admin'];
//这里也是要cookie加密
	if(!empty($ck)&&!ereg("^[_0-9a-zA-Z]+$",$ck))die("<script>window.location='ban.html'</script>");
	$res=mysql_query("select name from su where name='".$ck."' limit 1;")or die("<script>window.location='error.html'</script>");
	if(mysql_fetch_array($res)){
		$res=mysql_query("select * from wantjoin")or die("<script>window.location='error.html'</script>");
		while( $row = mysql_fetch_array($res) ){
			echo "姓名:\t".$row['name']."\t性别:\t".$row['sex']."\t学号:\t".$row['stu_id']."\t学院:\t".$row['institute']."\t手机号码:\t".$row['phone_num']."\t邮箱:\t".$row['mail']."\t意向部门:\t".$row['dep']."\t自我介绍:\t".$row['intro']."<br />";
		}
	}else{
	echo "<script>window.location='login.html'</script>";
	}
}
mysql_close($con);
?>