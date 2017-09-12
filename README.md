# gbook
simpy gbook and management system<br>
it is my first project in php, and it took me about 8 days to complete it,there are still a lot of details should be modify and <br>
maybe there are also some bugs there<br>

database:gbook<br>
table:gbook:id,username,subject,content,reply,date,redate<br>
      user:id,username,password<br>
      admin:id,username,password<br>
      
      
user page：<br>
index.php: user main page,it shows all the guestbook,users can review them after login<br>
login.php:login processing page<br>
register.php:register page<br>
register_user:register processing page <br>
add.php:add new review to main page<br>
reply.php:user review page, it shows all review below the subject,and users can add review there<br>
add_reply.php:add reply to reply.php<br>
clear_cookie.php:clear cookie after logout<br>

admin page：<br>
admin.php:admin main page, it shows all guestbook and review in database,, admin user can delete certain guestbook or review. There is no <br>
register function there, admin user infomation should be added to database directly<br>
login_admin.php:admin user login processing page<br>
clear_cookie.php:clear cookie after logout<br>


参考链接：http://blog.csdn.net/jordanhill27/article/details/77323421
----------------------

PHP个人博客大全-独立博客 : http://blog.sina.com.cn/s/blog_71ed1b870102vu7y.html
-------------------------
《PHP经典编程265例》书籍：https://baike.baidu.com/item/PHP%E7%BB%8F%E5%85%B8%E7%BC%96%E7%A8%8B265%E4%BE%8B/4239107?fr=aladdin
-----------------
