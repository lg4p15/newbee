<?php
$user='treenewbee';
$pwd='shuxinfeng';
$con = mysql_connect('localhost', $user, $pwd) or die("<script>window.location='error.html'</script>");	
mysql_select_db('tree_newbee') or die("<script>window.location='error.html'</script>");
if(isset($_POST['name'])){ 
	$name = $_POST['name'];
	$pwd=$_POST['pwd'];
	if(!ereg("^[_0-9a-zA-Z]+$",$name))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_0-9a-zA-Z]+$",$pwd))die("<script>window.location='ban.html'</script>");
//这里还需要对密码进行加密，明文存储有风险
	$res=mysql_query("select name from su where name='".$name."' and pwd='".$pwd."' limit 1;")or die("<script>window.location='error.html'</script>");
	if(mysql_fetch_array($res)){
	setcookie("admin", $user, time()+3600);
	echo "<script>window.location='success.html'</script>";
	}else{
	echo "<script>window.location='pwd.html'</script>";
	}
}else{
	$ck=$_COOKIE['admin'];
//这里也是要cookie加密
	if(!ereg("^[_0-9a-zA-Z]+$",$ck))die("<script>window.location='ban.html'</script>");
	$res=mysql_query("select name from su where name='".$ck."' limit 1;")or die("<script>window.location='error.html'</script>");
	if(mysql_fetch_array($res)){
		echo "success";
	}else{
	echo "<script>window.location='login.html'</script>";
	}
}
mysql_close($con);
?>