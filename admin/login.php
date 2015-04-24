<?php
if(isset($_POST['name'])){ 
	$user='treenewbee';
	$pwd='shuxinfeng';
	$con = mysql_connect('localhost', $user, $pwd) or die("<script>window.location='error.html'</script>");	
	mysql_select_db('tree_newbee') or die("<script>window.location='error.html'</script>");
	$name = $_POST['name'];
	$pwd=$_POST['pwd'];
	if(!ereg("^[_0-9a-zA-Z]+$",$name))die("<script>window.location='ban.html'</script>");
	if(!ereg("^[_0-9a-zA-Z]+$",$pwd))die("<script>window.location='ban.html'</script>");
	$res=mysql_query("select name from su where name='".$name."' and pwd='".$pwd."' limit 1;")or die("<script>window.location='error.html'</script>");
	mysql_close($con);
	if(mysql_fetch_array($res)){
	echo "<script>window.location='success.html'</script>";
	}else{
	echo "<script>window.location='pwd.html'</script>";
	}
}else{
	echo "<script>window.location='login.html'</script>";
}
?>