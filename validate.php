<?php
session_start();
//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        // Avoidance SQL Injection!
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);
        $email = $db->real_escape_string($_POST['email']);
        $fname = $db->real_escape_string($_POST['fname']);
        $lname = $db->real_escape_string($_POST['lname']);
        $bdate = $db->real_escape_string($_POST['bdate']);
        $dept = $db->real_escape_string($_POST['dept']);

        if( file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']) ) { // If Image is Uploaded
            if($_FILES['image']['error'] > 0) { 
                echo 'Error during uploading, try again';
            }
            else {
                //Set up valid image extensions
                $extsAllowed = array('ico');
                $extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
                //Check if the uploaded file extension is allowed
                if (in_array($extUpload, $extsAllowed) ) { 
                    // Informations are Written into Database
                    $query_str="INSERT INTO member (fname, lname, email, department, username, password, birthdate) values ('".$fname."','".$lname."','".$email."','".$dept."','".$username."','".$password."','".$bdate."')";
                    if(mysqli_query($db, $query_str)) {
                        //Upload the file on the server
                        $query_str = "SELECT max(id) as id FROM member";
                        $result = $db->query($query_str);
                        $row = $result->fetch_assoc(); // Returned Result from Query
                        $id = $row["id"]; // We get ID to check if user is president
                        $lname = $row["lname"];
                        $imgName = $row["id"]; 
                        $imgName .= ".".$extUpload; // We add file extention again
                        $_FILES['file']['name'] = $imgName;
                        $name = "img/{$_FILES['file']['name']}";
                        $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);

                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        $_SESSION['lname'] = $_POST['lname'];
                        //echo "<p class='pad-green'>Registration successful!</p>";
                        $_SESSION['success'] = "Registration succesful! Redirecting To Welcome Page...";
                        //redirect the user to welcome.php
                        header("refresh:2; url=welcome.php");
                    } 
                    else {
                        //echo "<p class='pad'>Registration Failed!</p>";
                        $_SESSION['error'] = 'User could not be added to the database!';
                    }
                    mysqli_close($db);
                } 
                else { 
                    //echo 'File is not valid. Please try again';
                    $_SESSION['error'] = 'File is not valid. Please only upload extention .ICO images!';
                }
            } 
        }
        else { // If no photo uploaded
            // Informations are Updated into Database
            $query="INSERT INTO member (fname, lname, email, department, username, password, birthdate) values ('".$fname."','".$lname."','".$email."','".$dept."','".$username."','".$password."','".$bdate."')";
            if(mysqli_query($db, $query)) {
                //Get SESSION variables latest from DB
                $query_str = "SELECT max(id) as id FROM member";
                $result = $db->query($query_str);
                $row = $result->fetch_assoc(); // Returned Result from Query
                $id = $row["id"]; // We get ID to check if user is president

                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['lname'] = $_POST['lname'];
                //echo "<p class='pad-green'>Registration successful!</p>";
                $_SESSION['success'] = "Registration succesful! Redirecting To Welcome Page...";
                //redirect the user to welcome.php
                header("refresh:2; url=welcome.php");
            } 
        }
    }
    else {
        $_SESSION['error'] = 'Two passwords do not match!';
    }
}
?>