<?php
    session_start();
    require 'db_connect.php';
    require 'session.php';
    $id=$_GET['id'];
    $query=mysqli_query($db, "SELECT * FROM member WHERE id = '$id' ");
    $row=mysqli_fetch_array($query);
?>

<html>
<title>CANCLUB Edit</title>
<link rel="stylesheet" href="form.css" type="text/css">
    <div class="body-content">
        <div class="module">
            <h2>Edit Member Information</h2><br><br>
            <?php
                $imgName = $id;
                $files = glob("img/$imgName.*"); // Will find 2.txt, 2.php, 2.gif from webterm/img
                if(!glob("img/$imgName.*")) {
                    $files = glob("img/default.ico"); // Will find default.png
                    echo "<img style='width:55px; height:55px;' src='".$files[0]."'></div>";
                } else {
                    echo "<img style='width:55px; height:55px;' src='".$files[0]."'></div>";
                }
            ?>
            <form class="form module" method="POST" action="update.php?id=<?php echo $id; ?>" enctype="multipart/form-data" autocomplete="off">
                <label>Firstname:</label>
                <input type="text" placeholder="First Name" value="<?php echo $row['fname']; ?>" name="fname" required />
                <label>Lastname:</label>
                <input type="text" placeholder="Last Name" value="<?php echo $row['lname']; ?>" name="lname" required /><br>
                <p id="date-text-reg" size="30">Birth Date:</p>
                <input size="30" type="date" id="date" name="bdate" value="<?php echo $row['birthdate']; ?>" required />
                <br><br>
                <label>Email:</label>
                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required />
                <label>Department:</label>
                <input type="text" placeholder="Department" name="dept" value="<?php echo $row['department']; ?>" required />
                <label>Username:</label>
                <input type="text" placeholder="User Name" name="username" value="<?php echo $row['username']; ?>" required />
                <label>Password:</label>
                <input type="text" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" autocomplete="new-password" required />
                <label id="date-text">Select Your Photo: </label><input id="date-text" type="file" name="file">
                <input class="btn btn-primary" type="submit" name="submit" value="Update">
                <a class="btn btn-primary" href="welcome.php">Back</a>
            </form>
        </div>
    </div>
</html>