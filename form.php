<?php
    //$_SESSION variables become available on this page
    //The session_start() function must be the very first thing in your document. 
    //Before any HTML tags.
    session_start();
    $_SESSION['error'] = '';
    $_SESSION['success'] = '';
    require 'db_connect.php';
    require 'validate.php';
?>
<html>
<title>Register</title>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create Your Canclub Account!</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['error'] ?></div>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <input type="text" placeholder="First Name" name="fname" required />
        <input type="text" placeholder="Last Name" name="lname" required /><br> 
        <p id="date-text" size="30">Birth Date</p>
        <input size="30" type="date" id="date" name="bdate" placeholder="Birth Date YYYY-MM-DD" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="text" placeholder="Department" name="dept" required />
        <input type="text" placeholder="User Name" name="username" required />
        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
        <label id="date-text">Select Your Photo: </label><input id="date-text" type="file" name="file">
        <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
        <p>Already Have an account?</p><br><a class="btn btn-primary" href="login.php">Sign In</a>
    </form>
  </div>
</div>
</html>
