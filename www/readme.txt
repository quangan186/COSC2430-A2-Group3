COSC2430 - Full Stack Web Application
InstaKilogram 

I. Project description: 
InstaKilogram is a social media application which is developed based on Instagram, which is one of the most popular social media applications. Similar to Instagram, users can use InstaKilogram to post and share their lovely images to other users. In order to develop the InstaKilogram, our group uses basic languages ​​in web making such as HTML, and CSS combined with Javascript to develop the frontend. On the other hand, we use PHP language to build the web backend.
 
Three members developed this application, including
Bui Quang An - s3877482
Nguyen Chau Loan - s3880115
Duong My Uyen - s3904418

II. Contribution score:
Bui Quang An: 5
Nguyen Chau Loan: 5
Duong My Uyen: 1

III. GitHub URL: https://github.com/quangan186/COSC2430-A2-Group3.git

IV. Video URL: https://youtu.be/0hKXwjLS4Vg

IV. How to use our website
Run locally:
- Open the command prompt and cd to the located file  
- Open web server locally “php - S localhost:(port number)
For example:  php -S localhost:2000

- User site
Before users or guests interact with anything on the page, a box requiring for Cookie permission will appear as they enter the site, and any user of the website have to accept the Cookies before continuing their experience with the website.

REGISTER: To register an account from the main page (index.php): click the red button “Log In” located in the top right corner, it would then redirect you to the login page (login.php). On this page, you can either choose to log in with your existing account (listed in part V) or create a new account. Since you are a new user, click on “Register” to start signing up at the registration page (register.php). 
You must fill in information of the correct format, if you don't, the registration page will return errors message instruct the correct format required for your input.
If every input field has a green check icon, you are good to go, click “Register” to complete the form. The form will be sent to the server and it will be validated one more time to check if there are any errors such as having the same email address as the other accounts. 

LOGIN: After having your account successfully registered, log in to the website by clicking the “Sign in” link below the registration form, it leads you back again to the login page. Fill in your registered email and password then click the submit button, the system will then validate the information, if the input is not correct, the system will display 'Invalid username or password'. If the input is correct, the system will redirect you to the homepage (index.php).
In the upper right corner of the screen this time, the login button will show the user's name

HOME: if user is logged in, user can see an input form to create posts. User can choose the post status as public, internal or private. If user is not logged in, user cannot see this create post form. “Public” will make the post available even though the user has not logged in, “Internal” will make the post only available when the user has logged in, and the “Private” will make the post only show for the user. If the user does not choose it, it will set the default type which is public. 

MY ACCOUNT: After logged in, the red button beside the search bar on top menu will display user's name. If the user clicked on it, the user will be taken to My Account Page - a page with information about them. On my account page, users can update their profile picture. Below the information will have a “Logout” button. If a user clicks on it, the login page will appear and users have to log in again if they want to use it. 

On the FOOTER of each page, except the Login and Register page, there are some useful links such as About, Copyright, Privacy and Help.

- Admin site

LOGIN: From homepage (index.php), navigate to the footer with the redirect icon, click on the icon to be redirected to the admin login page. If you are not logged in, you cannot access any page of admin.  After logging in successfully, the dashboard which demonstrates the number of users and posts using the application will appear.

ACCOUNT LIST:
On the left, there is a navigation bar menu with three buttons: Dashboard, Account list, and Post list. 
If the admin clicks on the “Account list” button, the page will show the list of registered users from the latest to oldest. 
On each row, there is a “View” button, and if the admin clicks on it, the page which contains the user’s information on that row will appear, and on that page, if the admin wants to reset the user’s password, clicking on the “Edit password” button, typing the new password and saving it. 

VIEW POSTS: To view posts created by users, click on the “Post list” on the left navigation bar. The page will display all from the latest to the oldest. Each post will have a “Delete” button, which will make the post hidden if the button is clicked.

V. Existed account

- User:
Username: quangan186@gmail.com
Password: HelloAn186

Username: loid123@gmail.com
Password: Loidsama123

Username: diablo186@gmail.com
Password: Diablo186

- Admin:
Username: group3@rmit.edu.vn
Password: 012345



