# Php-Web-Project
PHP Web Application which is capable of Create, Read, Update and Delete Operation(CRUD) for University Club Proposals.
I developed an easy-to-use, web-based application through which club members can propose, vote, and track the student club
activities such as seminars, technical visits, meetings, projects, etc. The name of the student club activity proposal voting and tracking system. Firstly, club members should register into the system. During registration process, some informations like username, password filled by the club member. After the registration process, the club member can do the following operations:<br>

**-> A login system:** Only registered club members can have an access to the application.<br>
**-> Propose new activity to be voted by club members:** A registered club member can propose
a new activity by specifying the type of activity (e.g. seminar, technical visit, social
responsibility project, club project, etc.), and the description of the activity.<br>
**-> Like/Dislike activity proposals:** The users can approve or disapprove the activity
proposals of the other club members. All registered club members can like or dislike the
activity proposal. The activity proposal will be open for voting for only fifteen days. In
addition, the users can write comments on each activity proposal.<br>
**-> List/Delete Club Members:** Only the club president can list or delete the club member(s).<br>
**-> See Trend Activity proposals:** The users can see the most popular 5 activity proposals. The
popularity of an activity offer can be determined as (number of approves - number of
disapproves).<br>
**-> Update Personal Information:** The users can update his/her personal information.<br>

![2019-05-13 01_11_38-Welcome](https://user-images.githubusercontent.com/36234545/58898722-df266d80-8703-11e9-92ed-43010c5735ff.png)

## Dependencies
**-> PHP 7 (You can use WAMP stack or AppServer)<br>**
**-> MySQL and MySQL Workbench<br>**
**-> Chrome (Or Edge, IE)**

## Installation
  **1-) Creating the Database and Tables** <br>
I used MySQL database and MySQL workbench to manage application database that's why you also need to have MySQL. I assume that you have PHP 7 and MySQL installed on your machine. Execute the **Database_backup.sql** in MySQL to create necassary tables inside your MySQL database. We will use this database for all of our future operations. You will have following tables created;

![2019-05-12 17_57_55-MySQL Workbench](https://user-images.githubusercontent.com/36234545/58898978-7ee3fb80-8704-11e9-87e3-c20198d45b96.png)

  **2-) PHP Database Connection Configuration** <br>
 After creating the tables, we need to modify the **db_connect.php** script in order to connect to the MySQL database server. Open this php script file and edit according to your MySQL database settings.(Edit username, password and database name)
![c](https://user-images.githubusercontent.com/36234545/58899740-59f08800-8706-11e9-8c4a-616c7c4caefd.png)

  **3-) Moving All Project Files into httdocs folder** <br>
Now you can move all project files in a folder then put this folder into **c:\wamp\www** (If you installed WAMP to c:\wamp).<br>
![d](https://user-images.githubusercontent.com/36234545/58900427-d172e700-8707-11e9-9b89-a6a1256c3685.png)

**3-) Running Project** <br>
Finally you can type **"localhost/ProjectFolderName/login.php"** into your Internet Explorer's address bar and you will see login page(Admin username: melo, Password: 123);<br>

![2019-05-12 17_38_35-Window](https://user-images.githubusercontent.com/36234545/58900757-71c90b80-8708-11e9-86d6-a77d6e93eee8.png)

## License
PHP Web Application is licensed under the MIT license. See LICENSE for more information.

## Project Status
You can download the latest release from this repository.

## Disclaimer
This project was prepared and shared for educational purposes only. You can use or edit any file in this project as you wish :)

## About
Süha TANRIVERDİ Çankaya University, Computer Engineering
