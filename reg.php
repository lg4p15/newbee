<?php
header("Content-type: text/html; charset=utf-8");
$user='treenewbee';
$pwd='shuxinfeng';
if($con = mysql_connect('localhost', $user, $pwd)){
	if(mysql_select_db('tree_newbee')){
		mysql_query("set character set 'utf8'");
		$name = $_POST['id'];
		$userpwd=$_POST['pwd'];
		if(!ereg("^[_a-z0-9A-Z]+$",$name)) echo "<script>window.location='ban.html'</script>";
		else if(!ereg("^[_a-z0-9A-Z]+$",$userpwd)) echo "<script>window.location='ban.html'</script>";
		else{
			$re=mysql_query("select id from user where id = '$name'" );
			echo "ok";
			if(mysql_fetch_array($re)){
				echo "<script>window.location='rep.html'</script>";
			}else{
				$str="insert into user (id,pwd) values('$name','$userpwd')";
				if(mysql_query($str)){
					echo "<script>window.location='lgscs.html'</script>";
				}else{
					echo "<script>window.location='error.html'</script>";
				}
			}
		}
	}else{
		 echo "<script>window.location='error.html'</script>";
	}
	mysql_close($con);
}else{
	echo "<script>window.location='error.html'</script>";
}
?>