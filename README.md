<h1>Administrator Control Panel </h1> <b>(Or to simply put it... an Admin Dashboard) </b>
<p>This is a project I created to give every developer a dashboard to use for their clients. <p>

<b>Key Features: </b>

1. Edit pages of your website.

2. Messaging system. 

3. Upload files to a specific directory. - In the works.

4. Change password.

5. Create to-do lists with progress bars. - In the works.

6. Plus more on the way.

<b>How to implement:</b>

1.	Copy and paste whole .ZIP file into your public_html directory in your webserver.

2.	Open settings.php in edit mode and set each field as you wish. Then save it. Do not navigate to the panel via a web browser until this document is filled out. 
Information regarding the salt field: 
Make sure you change this. However after you create the data tables be sure not to change it or your passwords will no longer be recognized and you will need to re-install the whole system.

3.	Navigate to {your website hostname}/admin/mysql.php - It will run and create the data tables

4.	Then open {your website hostname}/admin/ and fix any errors. If there are none you can go and delete the MySQL.php file.

5.  Now log into the dashboard. The username is Administrator and the default password is Banana.

6.  You will need to now go and change the passcode which can be done under the user tab on your dashboard.

7.	Done. Enjoy your administration control panel.

Your panel can be accessed like this: http://{your host name}/admin/

<b>Implementation on your website</b>
<p>This tutorial gives instructions on how to add the necessary code to allow things such as messages and page editing to work.<p>

<i>To get messages to function:</i>

You will need to copy and paste some extra code. They are in the utilities folder.

Firstly create a three template page in your website directory under a messages directory with the file names index.php, reply.php, send.php. 

Then copy and paste the corresponding part into the body section of your new page.

Then go through the send.php section and modify the message as per your wishes.

<i>To get page editing to work:</i>
Copy and paste section one of the editing part in the code.php file to the top of the page you wish the edits to be displayed.
Then copy and paste section two to where you want the text to be displayed. And change the row name to that of the corrosponding collum in the MySQL database. (See below how to add extra pages to edit)

NOTE: Seeing I cannot see your page structures and which pages you have if you want to change fields or add more pages to edit there are a few steps to take. This is what to do:

1. Copy and paste the home folder in the edits folder. Change it to the page name. Them open the new folder and open index.php find and replace every word that has homepage to the name of your new page. Then change the title from Edit Home Page to Edit {Your Page Name} Page.

2. Then open the index.php file in the edit folder. 

3. Go down to the page list section and copy and paste the Page Link line I have marked out and paste it below and rename the link from ./home to ./{newpagename} and the Home Page text to {New Page Name} Page 

4. Then you will need to access your MySQL database. This can usually be done from your webhosting provider. Open your database that you are using for this system and create a new table with the page name as the title. Then add a new collum for each of your text areas you wish to have. But make sure the first collum is called id and the default value is 1.

5. After the table is created take not of the order in which the collums are in.

6. Open the process.php file in the /edit/newpage/ directory. And go to line 13 and change `homepage` to the name of the new page. 

7. Then you will need to change the SET title='$title', content='$content', aim='$aim' to the fields in the datatable. Just add ", aim='$aim'" after the last field in the SET statment. Then as done before change the names to the corrosponding fields. Save file and continue.

8. Next you will need to go into the root of the admin dashboard and open nav.php

9. Go down to line 70 and copy and paste the indicated code under the last of the pages that is in that list.

10. Change the content of the new list item to that of the new page. But make sure the href="" is the address to the folder you created before otherwise the link wont function.

11. Follow section two on How to impliment into your website. 

12. This is the most important step. Go back to your MySQL database and INSERT into your database all the text sections of the new page. 

13. Next you need to edit the index.php file in the /edit/newpage/ directory. Go and copy and paste the indicated form sections paste it under the next for each page field you have. Then go through and change each of the keywords to that of the field that form section will account for.

14. Next access the control panel and go to the edit section of the navbar and click it. If it works your new page should show there. Click it and it should take you to your editing page. If the new text shows in the text fields. Then all is well. 
15. Now navigate to your website and see if the text is showing. If it is. Try making a edit to the page. If the edit shows its all good.

16. Any issues create a new issue in the issues section and I will assist the best I can. 

NOTE: I am continually changing things on this repo. When I feel a release is in order I will release a new version in the releases. Otherwise the master branch is always changing and if you download it as a .zip file I do not guarantee it to work as intended. So do so at your own risk.   

Version: 2.4.5

If there are any issues please email me: me@laughingquoll.net

Changelog:
2.4.5:
Updated defunkt MySQL codes. Now running MySQLi
2.4.4
Added a unified settings file. Cleaned up code.
Also fixed an issue where login page would allow any password.	
