<?php 
session_start();
date_default_timezone_set("Asia/Shanghai");
require_once('conn.php'); 

$database ="gbook";
  $conn = new mysqli($servername,$username,$password,$database);

if ((isset($_POST['button1'])&&isset($_SESSION['username']))||isset($_COOKIE['username']))
{
$sql_subject = $_POST['subject'];
$sql_content = $_POST['content'];
if(isset($_SESSION['username']))
{$sql_name = $_SESSION['username'];}
else
{$sql_name = $_COOKIE['username'];}
$sql_date = date("Y-m-d H:i:s");
Session_destroy();
$sql="insert into gbook(username,subject,content,date) values ('$sql_name','$sql_subject','$sql_content','$sql_date')";
//$conn->query($sql);
if($conn->query($sql) === true)
{


echo "<script>location:href = \"index.php\";alert(\"发送成功\");history.go(-1);</script>";
exit;
}
}
else
{   
    
    echo "<script>location:href = \"index.php\";alert(\"尚未登录\");history.go(-1);</script>";
	//header("location:index.php");
    exit;
}


?>