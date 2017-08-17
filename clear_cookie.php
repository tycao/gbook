<?php 
session_start();
 setcookie('username',"",time()-3600);
 setcookie('password',"",time()-3600);
 if($_GET['relogin'] == 1)//用户重新登陆
 {
 header("Location:". $_SERVER['HTTP_REFERER']);
 
 Session_destroy();
 }
  else if($_GET['relogin'] ==2)//管理页重新登陆
 { setcookie('adminname',"",time()-3600);
 header("Location:". $_SERVER['HTTP_REFERER']);
 Session_destroy();
 }
exit;


?>
