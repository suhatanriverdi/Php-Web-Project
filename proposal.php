<?php session_start(); require 'session.php'; require 'db_connect.php'; ?>
<html>
    <link rel="stylesheet" href="form.css" type="text/css">
    <title>CANCLUB Proposal</title>
    <div align="center" class="body-content module">
            <fieldset>
                    <?php
                        if(isset($_POST['submit'])) {
                            // Escape all $_POST variables to protect against SQL injections
                            $owner = $_SESSION['id'];
                            $type = $_POST['type'];
                            $description =  $db->real_escape_string($_POST['text']);
                            $likeCount =  0;
                            $dislikeCount = 0;
                            $createdAt = date('Y-m-d');
                            $query="INSERT INTO proposal (mem_id, type, description, likeCount, dislikeCount, createdAt) values ('".$owner."','".$type."','".$description."','".$likeCount."','".$dislikeCount."', '".$createdAt."')";

                            if(mysqli_query($db, $query)) {
                                echo "<p class='pad-green'>Proposal Created successfully! Redirecting to Show Proposals Page..</p>";
                                //redirect the user to welcome.php
                                //header("location: welcome.php");
                                $_POST['submit'] = NULL;
                                header( "refresh:2; url=listproposals.php" );
                            } 
                            else {
                                echo "<p class='pad'>Proposal Could not be Added!</p>";
                            }
                            mysqli_close($db);
                        }
                    ?>
                <form class="form module" method="POST" autocomplete="off">
                    <legend>Create A New Proposal</legend>
                    <textarea id="teb" name="text" placeholder="Write Proposal Description" required /></textarea>       
                    <label>Activity Type:</label>
                        <select name="type">
                            <option value="seminar">Seminar</option>
                            <option value="technical trip">Technical Visit</option>
                            <option value="social project">Social Responsibility Project</option>
                            <option value="club">Club Project</option>
                            <option value="meeting">Meeting</option>
                            <option value="other">Other</option>
                        </select>
                    <input class='btn btn-primary' type="submit" name="submit" value="Create"/>
                    <a class="btn btn-primary" href="welcome.php">Back</a>
                </form>
            </fieldset>
        </form>
    </div>
</html>
