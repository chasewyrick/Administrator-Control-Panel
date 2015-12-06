<h1>Administrator Control Panel </h1> <b>(Or to simply put it... an Admin Dashboard) </b>
<p>This is a project I created to give every developer a dashboard to use for their clients. <p>
<p>Read this document fully before downloading or using.</p>
<b>Key Features: </b>

1. Edit pages of your website.

2. Messaging system. 

3. Upload files to a specific directory.

4. Change password.

5. Create to-do lists with progress bars.

6. Fully working mail system with send, inbox and trash functionalities.

7. Update notifier! Get told when new updates come! 

8. Multiple Users with different permissions.

9. Automatic setup!

10. View uploaded files each with unique icon per file type! 

11. With heaps more to come!

<b>How to implement:</b>

1. Extract the zip file in the root directory of your server

2. Navigate to http://{you host name}/admin/setup.php

3. Follow the prompts

4. Done!

Your panel can be accessed like this: http://{your host name}/admin/

<h3>Implementation on your website</h3>
<p>This tutorial gives instructions on how to add the necessary code to allow things such as messages and page editing to work.<p>

<i>To get messages to function:</i>

You will need to copy and paste some extra code. They are in the utilities folder.

Firstly create a three template page in your website directory under a messages directory with the file names index.php, reply.php, send.php. 

Then copy and paste the corresponding part into the body section of your new page.

Then go through the send.php section and modify the message as per your wishes.

<i>To get page editing to work:</i>
Copy and paste section one of the editing part in the code.php file to the top of the page you wish the edits to be displayed.
Then copy and paste section two to where you want the text to be displayed. And change the row name to that of the corresponding column in the MySQL database. (See below how to add extra pages to edit)

NOTE: Seeing I cannot see your page structures and which pages you have if you want to change fields or add more pages to edit there are a few steps to take. This is what to do:

1. Copy and paste the home folder in the edits folder. Change it to the page name. Them open the new folder and open index.php find and replace every word that has homepage to the name of your new page. Then change the title from Edit Home Page to Edit {Your Page Name} Page.

2. Then open the index.php file in the edit folder. 

3. Go down to the page list section and copy and paste the Page Link line I have marked out and paste it below and rename the link from ./home to ./{newpagename} and the Home Page text to {New Page Name} Page 

4. Then you will need to access your MySQL database. This can usually be done from your webhosting provider. Open your database that you are using for this system and create a new table with the page name as the title. Then add a new column for each of your text areas you wish to have. But make sure the first column is called id and the default value is 1.

5. After the table is created take not of the order in which the columns are in.

6. Open the process.php file in the /edit/newpage/ directory. And go to line 13 and change `homepage` to the name of the new page. 

7. Then you will need to change the SET title='$title', content='$content', aim='$aim' to the fields in the datatable. Just add ", aim='$aim'" after the last field in the SET statement. Then as done before change the names to the corresponding fields. Save file and continue.

8. Next you will need to go into the root of the admin dashboard and open nav.php

9. Go down to line 70 and copy and paste the indicated code under the last of the pages that is in that list.

10. Change the content of the new list item to that of the new page. But make sure the href="" is the address to the folder you created before otherwise the link wont function.

11. Follow section two on How to implement into your website. 

12. This is the most important step. Go back to your MySQL database and INSERT into your database all the text sections of the new page. 

13. Next you need to edit the index.php file in the /edit/newpage/ directory. Go and copy and paste the indicated form sections paste it under the next for each page field you have. Then go through and change each of the keywords to that of the field that form section will account for.

14. Next access the control panel and go to the edit section of the navbar and click it. If it works your new page should show there. Click it and it should take you to your editing page. If the new text shows in the text fields. Then all is well. 
15. Now navigate to your website and see if the text is showing. If it is. Try making a edit to the page. If the edit shows it’s all good.

16. Any issues create a new issue in the issues section and I will assist the best I can. 

<h3>Condition of Use:</h3>
By using this "software" you agree to abide by the following terms. Failure to do so may result in persecution.
The Footer.php file must not be removed or changed without direct permission of the author (LaughingQuoll).
The LICENCE.md file must remain in all copies / distributions of the "software" and not be modified.

<h3>Disclaimer:<h3>

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
