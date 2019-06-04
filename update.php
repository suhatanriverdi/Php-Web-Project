<?php
    session_start();
	require 'db_connect.php';
    require 'session.php';
	$id=$_GET['id'];

    $_SESSION['lname'] = "";
    $_SESSION['username'] = "";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $dept = $_POST['dept'];
    
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['username'] = $_POST['username'];

    if( file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']) ) { // If Image is Uploaded
        //Set up valid image extensions
        $extsAllowed = array('ico');
        $extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
        //Check if the uploaded file extension is allowed
        if (in_array($extUpload, $extsAllowed) ) { 
            //Upload the file on the server
            $imgName = $id; // Selected Member's ID
            $imgName .= ".".$extUpload; // We add file extention again
            $_FILES['file']['name'] = $imgName;
            $name = "img/{$_FILES['file']['name']}";
            //unlink('path_to_filename'); // we remove the old file
            $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);

            // Informations are Updated into Database
            mysqli_query($db,"UPDATE `member` SET 
            fname = '$fname',
            lname = '$lname',
            email = '$email',
            department = '$dept',
            username = '$username',
            password = '$password',
            birthdate = '$bdate'
            WHERE id = '$id' ");

            if(mysqli_query($db, $query_str)) {
                echo "<p class='pad-green'>Update successful!</p>";
                //redirect the user to welcome.php
                //header( "refresh:1; url=welcome.php" );
                header("location: welcome.php");
            } 
            else {
                echo "<p class='pad'>Update Failed!</p>";
                $_SESSION['error'] = 'User could not be added to the database!';
            }
            mysqli_close($db);
        } 
        else { 
            echo 'File is not valid. Please try again';
            $_SESSION['error'] = 'File is not valid. Please only upload ICO images!';
        }
    }
    else {
        // Informations are Updated into Database
        mysqli_query($db,"UPDATE `member` SET 
        fname = '$fname',
        lname = '$lname',
        email = '$email',
        department = '$dept',
        username = '$username',
        password = '$password',
        birthdate = '$bdate'
        WHERE id = '$id' ");

        $_SESSION['lname'] = $lname;
        $_SESSION['username'] = $username;
        //redirect the user to welcome.php
        $_SESSION['success'] = "Update succesful! $username Updated! Photo is not Uploaded!";
    }
	header('location:welcome.php');
?>