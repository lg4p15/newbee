<?php
header("Content-type: text/html; charset=utf-8");
$user='treenewbee';
$pwd='shuxinfeng';
if($con = mysql_connect('localhost', $user, $pwd)){
	if(mysql_select_db('tree_newbee')){
		mysql_query("set character set 'utf8'");
		$ck=$_COOKIE['user'];
		if($res=mysql_query("select id from user where id='$ck' and find_in_set('sadmin',rights)>0 limit 1;")){
			if(mysql_fetch_array($res)){
				echo "这里将会有人员处理页面，安全原因这些将不会静态化";
			}
		}
	}
	mysql_close($con);
}
?>