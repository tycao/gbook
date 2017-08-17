# gbook
simpy gbook and management system
it is my first project in php, and it took me about 8 days to complete it,there are still a lot of details should be modify and 
maybe there are also some bugs there

database:gbook
table:gbook:id,username,subject,content,reply,date,redate
      user:id,username,password
      admin:id,username,password
      
      
user page：
index.php: user main page,it shows all the guestbook,users can review them after login
login.php:login processing page
register.php:register page
register_user:register processing page 
add.php:add new review to main page
reply.php:user review page, it shows all review below the subject,and users can add review there
add_reply.php:add reply to reply.php
clear_cookie.php:clear cookie after logout

admin page：
admin.php:admin main page, it shows all guestbook and review in database,, admin user can delete certain guestbook or review. There is no 
register function there, admin user infomation should be added to database directly
login_admin.php:admin user login processing page
clear_cookie.php:clear cookie after logout
