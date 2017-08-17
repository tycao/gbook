

<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>留言系统</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script>
function validation()
{
      var name = document.getElementById("username").value;
	  var pwd = document.getElementById("password").value;
      var postStr = "username="+name+"&password="+pwd;
	  ajax("login.php",postStr,function(result){
	  document.getElementById("login_user").innerHTML = result;

	  });
}
function ajax(url,postStr,onsuccess)
{
var xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); 
     //url = base64_encode(url);
    xmlhttp.open("POST", url, true); 

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4) 
        {
            if (xmlhttp.status == 200) 
            {   
			     
			   
                   onsuccess(xmlhttp.responseText);
				
            }
            else
            {
                alert("AJAX服务器返回错误！");
            }
        }

    }
	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xmlhttp.send(postStr);
	}

</script>
<style>


body {
	background-color: #FFE4B5;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<h2 style = "text-align:center">评论</h2>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
  
<div class="table-content" style = "margin-left:100px"> 
<table width="600" border="1px" cellspacing="0" cellpadding="0"> 
<tr> 
<td width="100">用户</td> 
<td width="150">主题</td> 
<td width="250">评论</td> 
<td width="100">时间</td>

</tr> 
<?php 
 session_start();
 require_once('conn.php');
 $database ="gbook";
 $conn = new mysqli($servername,$username,$password,$database);
if(!empty($_POST['subject']))
{
	$subject = $_POST['subject'];
    setcookie('subject',$subject,time()+3600);	
}
else if(empty($_POST['subject'])||!isset($_POST['subject']))
{
	$subject = $_COOKIE['subject'];
}
else
{
	echo "fault page";
	exit;
}
 $sql = "select * from gbook where subject ='$subject' and reply is not null";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
do { ?>
    <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['subject']; ?></td>
      <td><?php echo $row['reply']; ?></td>
      <td><?php echo $row['redate']; ?></td>
    </tr>
    <?php }while($row = $result->fetch_assoc()) 
	?>
   
    
	


</table> 
</div>


  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <form id="form1" method="POST" action="add_reply.php">
  
  
  
   <div style="width:100px;float:left;">
  评论:
  </div>
  
  <div>
   <input type="text" name="reply" id="reply" style="width:1000px">
  </div>

  <br>
  <input type="submit" name="button6" id="button6" value="提交" style="margin-left:100px">
  <input type="reset" name="button7" id="button7" value="重置">
  <br>
  <br>
  <input type="hidden" name="subject" value='<?php echo $_COOKIE['subject'] ?>' />
  </form>
  
  
  
   <div id="login_user">
  <form id="form1" action ="#">
  <div style="width:100px;float:left;">
  用户名：
  </div>
  <input type = "text" name="username" id="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>">
  <br>
  <br>
  <div style="width:100px;float:left;">
  密码: 
  </div>
  <input type ="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
  <br>
  <br>
   
  </form>
  <input type = "submit" id = "button3" value="登录" style="margin-left:100px" onclick="validation()">
    <a href="register.php">注册</a>
  </div>
<script>
 var log_status = <?php echo isset($_COOKIE['username']);?>;
	 
	  if(log_status == 1)
	  {
	    document.getElementById("login_user").innerHTML = "欢迎："+"<?php echo $_COOKIE['username'];?><br><form action =\"clear_cookie.php\" method =\"get\"><input type=\"submit\"  name = \"relogin\" value = 1\"重新登陆\"><input type = \"hidden\" name = \"relogin\" value = 2></form><br><br>";
	  }
	  </script>
 
 
</body>
</html>