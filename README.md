# Php-Web-Project
PHP Web Application which is capable of Create, Read, Update and Delete Operation(CRUD) for University Club Proposals.
I developed an easy-to-use, web-based application through which club members can propose, vote, and track the student club
activities such as seminars, technical visits, meetings, projects, etc. The name of the student
club activity proposal voting and tracking system. Firstly, club members
should register into the system. During registration process, some informations like username, password
filled by the club member.<br>
After the registration process, the club member can do the following operations:<br>

-> **A login system:** Only registered club members can have an access to the application.<br>
-> **Propose new activity to be voted by club members:** A registered club member can propose
a new activity by specifying the type of activity (e.g. seminar, technical visit, social
responsibility project, club project, etc.), and the description of the activity.<br>
-> **Like/Dislike activity proposals:** The users can approve or disapprove the activity
proposals of the other club members. All registered club members can like or dislike the
activity proposal. The activity proposal will be open for voting for only fifteen days. In
addition, the users can write comments on each activity proposal.<br>
-> **List/Delete Club Members:** Only the club president can list or delete the club member(s).<br>
-> **See Trend Activity proposals:** The users can see the most popular 5 activity proposals. The
popularity of an activity offer can be determined as (number of approves - number of
disapproves).<br>
-> **Update Personal Information:** The users can update his/her personal information.<br>

![2019-05-13 01_11_38-Welcome](https://user-images.githubusercontent.com/36234545/58898722-df266d80-8703-11e9-92ed-43010c5735ff.png)

## Dependencies
**-> PHP 7 (You can use WAMP stack or AppServer)<br>**
**-> MySQL and MySQL Workbench<br>**
**-> Chrome**

## Installation
  **1-) Creating the Database and Tables** <br>
I used MySQL database and MySQL workbench to manage application database that's why you also need to have MySQL. I assume that you have PHP 7 and MySQL installed on your machine. Execute the following SQL query in MySQL to create necassary tables inside your MySQL database. We will use this database for all of our future operations. You will have following tables created;

![2019-05-12 17_57_55-MySQL Workbench](https://user-images.githubusercontent.com/36234545/58898978-7ee3fb80-8704-11e9-87e3-c20198d45b96.png)
