<?php
header("Content-type: text/html; charset=utf-8");
$user='treenewbee';
$pwd='shuxinfeng';
$con = mysql_connect('localhost', $user, $pwd) or die("<script>window.location='error.html'</script>");	
mysql_select_db('tree_newbee') or die("<script>window.location='error.html'</script>");
mysql_query("set character set 'utf8'");
	$name = $_POST['id'];
	$userpwd=$_POST['pwd'];
	if(!ereg("^[_a-z0-9A-Z]+$",$name))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_a-z0-9A-Z]+$",$userpwd))die("<script>window.location='ban.html'</script>");
	$re=mysql_query("select id from user where id = '$name'" );
	echo "ok";
	if(mysql_fetch_array($re)){
		echo "<script>window.location='rep.html'</script>";
	}else{
		$str="insert into user (id,pwd) values('$name','$userpwd')";
		mysql_query($str)or die("<script>window.location='error.html'</script>");
		echo "<script>window.location='lgscs.html'</script>";
	}
	mysql_close($con);
?>