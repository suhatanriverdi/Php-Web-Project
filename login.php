<?php session_start(); ?>
<html>
    <link rel="stylesheet" href="form.css" type="text/css">
    <title>Login</title>
    <body>
        <div class="body-content">
            <div class="module">
            <h1>Log Into Your Account</h1>
                <form method="post">
                    <input type="text" placeholder="Username" name="user" required />
                    <input type="password" placeholder="Password" name="pass" required />
                    <input type="submit" value="Login" class="btn btn-block btn-primary" />
                    <p>Don't Have an account?</p><br><a class="btn btn-primary" href="form.php">Sign Up</a><br><br>
                    <?php
                        $field_names = array("user", "pass");
                        $n_fields = 2;
                        $count = 0;
                        for($i = 0; $i < $n_fields; $i++) {
                            $field_name = $field_names[$i];
                            if(array_key_exists($field_name, $_POST)) {
                                $count++;
                            }
                        }
                        if($count == $n_fields) {
                            require 'db_connect.php';
                            // Escape all $_POST variables to protect against SQL injections
                            $username = $db->real_escape_string($_POST['user']);
                            $password = $db->real_escape_string($_POST['pass']);

                            // BU Şekilde de kaydedebiliriz username veya email unique ise! daha güevnli olur DBiçin
                            //$password = $db->real_escape_string( password_hash($_POST['pass'], PASSWORD_BCRYPT) );
                            //$hash = $db->real_escape_string( md5( rand(0,1000) ) );

                            //$username = $_POST["user"];
                            //$password = $_POST["pass"];
                            $query_str = "SELECT id, username, password, lname FROM member WHERE username = \"" . $username . "\" and password = \"" . $password. "\" LIMIT 1";
                            $result = $db->query($query_str);
                            $row = $result->fetch_assoc(); // Returned Result from Query
                            $id = $row["id"]; // We get ID to check if user is president
                            $lname = $row["lname"];
                            $n_rows = mysqli_num_rows($result);
                            if($n_rows == 1) {
                                $_SESSION['id'] = $id;
                                $_SESSION['username'] = $username;
                                $_SESSION['lname'] = $lname;
                                if($id == 1) { // If President
                                    echo "<p class='pad-green'>Login Succesful. You Are Club President, Redirecting To Welcome Page...</p>";
                                    header( "refresh:2; url=welcome.php" );
                                    //header('Location: http://localhost/webterm/welcome.php');
                                }
                                else { // If Member
                                    echo "<p class='pad-green'>Login Succesful. You Are Club Member, Redirecting To Welcome Page...</p>";
                                    header( "refresh:2; url=welcome.php" );
                                    //header('Location: http://localhost/webterm/welcome.php');
                                }
                            }
                            else {
                                echo "<p class='pad'>Password or username mismatch!</p>";
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>