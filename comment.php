<?php session_start(); require 'session.php'; require 'db_connect.php'; 
    $proposal_id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM proposal WHERE id = '$proposal_id' ");
    $row = mysqli_fetch_array($query);
?>
<html>
    <link rel="stylesheet" href="form.css" type="text/css">
    <title>Comment</title>
    <div align="center" class="body-content module">

            <?php 
                $id = $row["id"];
                $owner = $row["mem_id"];
                $type = $row["type"];
                $description = $row["description"];
                $likeCount = $row["likeCount"];
                $dislikeCount = $row["dislikeCount"];
                $createdAt = $row["createdAt"];
                $query = "SELECT fname, lname FROM member WHERE id = \"" . $owner . "\" LIMIT 1";
                $result = $db->query($query);
                $row = $result->fetch_assoc(); // Returned Result from Query
            ?>
                <legend><?= $type ?></legend>
                <div>
                <?php
                    echo '<h2>';
                    echo $description;
                    echo '</h2>';

                    echo '<p>';
                    echo $createdAt;
                    echo '</p>';

                    echo '<p> Created By ';
                    echo $row["fname"]." ".$row["lname"] ;
                    echo '</p>';
                ?>

            <div style="padding: 20px;">
                <fieldset>
                    <?php
                        if(isset($_POST['submit'])) {
                            // Escape all $_POST variables to protect against SQL injections
                            $mem_id = $_SESSION['id'];
                            $prop_id = $proposal_id;
                            $comment = $db->real_escape_string($_POST['text']);
                            $date = date('Y-m-d');
                            $query="INSERT INTO comments (comment, date, prop_id, mem_id) values ('".$comment."','".$date."','".$prop_id."','".$mem_id."')";

                            if(mysqli_query($db, $query)) {
                                echo "<p class='pad-green'>Commented successfully! Redirecting to Show Proposals Page..</p>";
                                //redirect the user to welcome.php
                                //header("location: welcome.php");
                                $_POST['submit'] = NULL;
                                header( "refresh:2; url=listproposals.php" );
                            } 
                            else {
                                echo "<p class='pad'>Comment Could not be Added!</p>";
                            }
                            mysqli_close($db);
                        }
                    ?>
                    <form class="form module" method="POST" autocomplete="off">
                        <legend>Make A New Comment</legend>
                        <textarea id="teb" name="text" placeholder="Write Your Comment" required /></textarea>       
                        <input class='btn btn-primary' type="submit" name="submit" value="Comment"/>
                        <a class="btn btn-primary" href="listproposals.php">Back</a>
                    </form>
                </fieldset>
            </div>
        </form>
    </div>
</html>
