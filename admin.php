<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>留言管理系统</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script>
function validation()
{
      var name = document.getElementById("username").value;
	  var pwd = document.getElementById("password").value;
      var postStr = "username="+name+"&password="+pwd;
	  ajax("login_admin.php",postStr,function(result){
	  document.getElementById("login_admin").innerHTML = result;
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





<body>
<h2 style = "text-align:center">管理员系统</h2>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
  
<div class="table-content" style = "margin-left:100px"> 
<table width="1000" border="1px" cellspacing="0" cellpadding="0"> 
<tr> 
<td width="100">用户</td> 
<td width="150">主题</td> 
<td width="250">内容</td> 
<td width="250">回复</td>
<td width="100">时间</td>
<td width="100">回复时间</td>
<td width="50">操作</td>

</tr> 
<?php 
session_start();
 require_once('conn.php');
 $database ="gbook";
 $conn = new mysqli($servername,$username,$password,$database);
 $sql = "select * from gbook where subject is not null order by ID";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
do { ?>
    <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['subject']; ?></td>
      <td><?php echo $row['content']; ?></td>
	  <td><?php echo $row['reply']; ?></td>
      <td><?php echo $row['date']; ?></td>
	  <td><?php echo $row['redate']; ?></td>
	  
	  <td><form action = "#">
          <input type = "submit"  id = "id" name = "id" value="删除" > 
         <input type="hidden" name="id" value='<?php echo $row['ID']; ?>' /> 
          </form>
      </td>
    </tr>
    <?php }while($row = $result->fetch_assoc()) ;
		if (isset($_SESSION['adminname'])&&!empty($_GET['id']))
		{  $del_id = $_GET['id'];
	       $sql = "select * from gbook where id = '$del_id' ";
		   $result = $conn->query($sql);
		   $num = $result->num_rows;
	       $sql = "delete from gbook where id ='$del_id' ";
	       $result = $conn->query($sql);
		   if(($result === TRUE)&&($num == 1))
		   {echo "<script>history.go(0);alert(\"delete complished\");</script>";}
		}
	?>
   
    
	


</table> 
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
 <div id="login_admin">
  <form id="form1" action ="#">
  <div style="width:100px;float:left;">
  用户名：
  </div>
  <input type = "text" name="username" id="username" value="<?php if(isset($_COOKIE['adminname'])){echo $_COOKIE['adminname'];}?>">
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
 var log_status = <?php echo isset($_COOKIE['adminname']);?>;
	 
	  if(log_status == 1)
	  {
	    document.getElementById("login_admin").innerHTML = "欢迎："+"<?php echo $_COOKIE['adminname'];?><br><form action =\"clear_cookie.php\" method =\"get\"><input type=\"submit\"  name = \"relogin\" value = \"重新登陆\"><input type = \"hidden\" name = \"relogin\" value = 2></form><br><br>";
		
	  }
	  
	  </script>
 
</body>
</html>