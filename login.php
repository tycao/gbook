<?php 
session_start();
require_once('conn.php'); 
$database ="gbook";
  $conn = new mysqli($servername,$username,$password,$database);
  $username= $_POST['username'];
  $password= $_POST['password'];

	$sql = "select username,password from user where username = '$username' and password = '$password'";
	
    $result = $conn->query($sql);
	
	if($result->num_rows == 1)
		{$row = $result->fetch_assoc();
	     setcookie('username',$username,time()+3600);
         setcookie('password',$password,time()+3600);
		 $_SESSION['username']=$username;
	     echo "欢迎：".$username."<br><form action =\"clear_cookie.php\" method =\"get\"><input type=\"submit\"  name = \"relogin\" value = \"重新登陆\"><input type = \"hidden\" name = \"relogin\" value = 1></form><br><br>";
		 
		}
	else
	{
		echo "密码错误，请重新输入"."<a href=\"index.php\">"."重新输入</a>";
	}	

  ?>