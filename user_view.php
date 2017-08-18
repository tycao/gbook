
  
  <!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>用户查看系统 </title>
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
            if (xmlhttp.status == 200 )
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
<h2 style = "text-align:center">欢迎来到博主之家</h2>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<img src = 'images/<?php echo  $name = $_GET['name'];?>.jpg' width = "100px" height = "100px" style = "margin-left:100px">
<font size = "5">博主：<?php echo  $name = $_GET['name'];?></font>

 <h3 style = "margin-left:100px">他的主题</h3> 
<div class="table-content" style = "margin-left:100px"> 
<table width="650" border="1px" cellspacing="0" cellpadding="0"> 
<tr> 
<td width="100">用户</td> 
<td width="150">主题</td> 
<td width="250">内容</td> 
<td width="100">时间</td>
<td width="50">回复</td>
</tr> 
<?php 

 require_once('conn.php');
 $database ="gbook";
 $conn = new mysqli($servername,$username,$password,$database);
 $sql = "select * from gbook where content is not null and username = '$name' order by date";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
do { ?>
    <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $unique_subject = $row['subject']; ?></td>
      <td><?php echo $row['content']; ?></td>
      <td><?php echo $row['date']; ?></td>
	  <td><form action = "reply.php" method = "post">
          <input type = "submit"  id = "subject" name = "subject" value="评论" > 
          <input type="hidden" name="subject" value='<?php echo $unique_subject ?>' /> 
          </form>
      </td>
    </tr>
    <?php }while($row = $result->fetch_assoc()) 
	?>
   </table> 
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
    <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3 style = "margin-left:100px">他的回复</h3>
  <div class="table-content" style = "margin-left:100px"> 
<table width="650" border="1px" cellspacing="0" cellpadding="0"> 
<tr> 
<td width="100">用户</td> 
<td width="150">主题</td> 
<td width="250">回复</td> 
<td width="100">时间</td>
<td width="50">评论</td>
</tr> 
<?php 
 $sql = "select * from gbook where reply is not null and username = '$name' order by date";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
do { ?>
    <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $unique_subject = $row['subject']; ?></td>
      <td><?php echo $row['reply']; ?></td>
      <td><?php echo $row['redate']; ?></td>
	  <td><form action = "reply.php" method = "post">
          <input type = "submit"  id = "subject1" name = "subject" value="评论" > 
          <input type="hidden" name="subject" value='<?php echo $unique_subject ?>' /> 
          </form>
      </td>
    </tr>
    <?php }while($row = $result->fetch_assoc()) 
	?>
  
	
</table> 
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
    <p>&nbsp;</p>
  <p>&nbsp;</p>

</body>
</html>