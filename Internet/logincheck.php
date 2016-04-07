<?php
	if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		if($user == "" || $psw == "")
		{
			echo "<script>alert('please input username and php_strip_whitespace'); history.go(-1);</script>";
		}
		else
		{
			mysql_connect("localhost","sql_blacktech","kevin9694");
			mysql_select_db("sql_blacktech");
			mysql_query("set names 'gbk'");
			$sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			if($num)
			{
				$row = mysql_fetch_array($result);	//将数据以索引方式储存在数组中
				echo $row[0];
			}
			else
			{
				echo "<script>alert('un or pw is not correct');history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('submit is not success'); history.go(-1);</script>";
	}

?>