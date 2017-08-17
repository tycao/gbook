<?php require_once('conn.php');

$database ="gbook";
  $conn = new mysqli($servername,$username,$password,$database);
  $username= $_POST['username'];
  $password= $_POST['password'];
  $sql = "insert into user (username,password) values('$username', '$password');";
  $result = $conn->query($sql); 
  if ( $result === TRUE) {
    echo "注册成功"."<a href=\"index.php\">返回主界面</a>";
  }
  else
  {
	  echo "注册失败";
  }
  ?>