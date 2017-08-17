
<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>留言系统</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function submit_user()
{
      var name = document.getElementById("username").value;
	  var pwd = document.getElementById("password").value;
	  var pwd_1 = document.getElementById("password1").value;
	  if( pwd == pwd_1)
	  {
		  
	  
      var postStr = "username="+name+"&password="+pwd;
	  ajax("register_abc.php",postStr,function(result){
	  document.getElementById("register_log").innerHTML = result;});
	  }
	  else
	  {
		  document.getElementById("register_log").innerHTML ="密码输入不一致，请重试";
	  }
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
<h2 style = "text-align:center">用户注册</h2>
<form action="">
 <div style="width:100px;float:left;">
  用户名：
  </div>
  <input type = "text" name="username" id="username"><br>
 <div style="width:100px;float:left;">
  输入密码：
  </div>
  <input type ="password" name="password" id="password"><br>
 <div style="width:100px;float:left;">
  确认密码：
  </div> <input type ="password" name="password1" id="password1">
<br>
<br>
</form>
 <input type = "submit" id = "button4" value="注册" style="margin-left:100px" onclick="submit_user()">

<p id="register_log"></p>

</body>
</html>