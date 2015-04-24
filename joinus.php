<?php
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
	$intro=$_POST['intro'];
	if(!ereg("^[_%0-9a-zA-Z]+$",$name))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_%0-9a-zA-Z]+$",$sex))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[0-9]+$",$stuid))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_%0-9a-zA-Z]+$",$ins))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_%0-9a-zA-Z]+$",$phone))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$mail))die("<script>window.location='email.html'</script>");
	if(!ereg("^[_%0-9a-zA-Z]+$",$dep))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_%0-9a-zA-Z]+$",$intro))die("<script>window.location='ban.html'</script>");
	echo "sql中加入申请信息的还没写";
	mysql_close($con);
?>