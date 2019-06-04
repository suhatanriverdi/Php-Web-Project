<?php session_start(); require 'session.php'; require 'db_connect.php'; 
    $proposal_id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM proposal WHERE id = '$proposal_id' ");
    $row = mysqli_fetch_array($query);
?>
<html>
    <link rel="stylesheet" href="form.css" type="text/css">
    <title>Vote</title>
    <div align="center" class="body-content module">

        <?php 
            $member_by = $_SESSION['id'];
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
        <fieldset>
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

                <?php
                    $query = "SELECT * FROM voted_by WHERE prop_id = \"" . $id . "\" AND mem_by = \"" . $_SESSION['id'] . "\" LIMIT 1";
                    $result = $db->query($query);
                    $row = $result->fetch_assoc(); // Returned Result from Query
                    //echo $row['liked'];
                    //echo $row['disliked'];
                ?>

            <div style="padding: 20px;">
                <form class="form module" method="POST" autocomplete="off">     
                    <div method="post" action="listproposals.php" style="padding-top: 10px;">
                        <label class="container">Like<?= " ".$likeCount ?>
                          <input type="radio" <?=$row['liked']==1 ? "checked" : ""?> value="1" name="radio">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Dislike<?= " ".$dislikeCount ?>
                          <input type="radio" <?=$row['disliked']==1 ? "checked" : ""?> value="0" name="radio">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <input class='btn btn-primary' type="submit" name="submit" value="Vote"/>
                    <a class="btn btn-primary" href="listproposals.php">Back</a>
                </form>
            </div>

            <?php
                $qu = $db->query("SELECT * FROM voted_by WHERE prop_id = \"" . $id . "\" AND mem_by = \"" . $_SESSION['id'] . "\" LIMIT 1");
                $tuple = $qu->fetch_assoc();
                if(isset($_POST['submit'])) {
                    if(!empty($tuple)) { // update, önceden voted yapmışız
                        // Informations are Updated into Database
                        $rdb_value = $_POST["radio"];
                        if($rdb_value == 1) { // If liked                   
                            $like = 1;
                            $dislike = 0;
                            // Like++ , Dislike--
                            $incLike_decDislike = "UPDATE proposal SET likeCount = likeCount + 1, dislikeCount = dislikeCount - 1 WHERE id = '$id'";
                            if (!mysqli_query($db, $incLike_decDislike)) {
                                $already = 'liked'; //.mysqli_error($db)
                            }
                        } 
                        if($rdb_value == 0) { // If Disliked
                            $like = 0;
                            $dislike = 1;
                            // Like --, Dislike ++
                             $decLike_incDislike = "UPDATE proposal SET likeCount = likeCount - 1, dislikeCount = dislikeCount + 1 WHERE id = '$id'";
                            if (!mysqli_query($db, $decLike_incDislike)) {
                                //$already = "<p class='pad'>You have already Disliked!</p>"; //.mysqli_error($db)
                                $already = 'disliked';
                            }
                        }
                        //echo "RDB VAlue: ".$rdb_value."\n";
                        //echo "Liked: ".$like;
                        //echo "Disliked: ".$dislike;
                        
                        $current_user = $_SESSION['id'];
                        $sql = "UPDATE voted_by SET 
                        liked = '$like',
                        disliked = '$dislike'
                        WHERE prop_id = '$id' AND mem_by = '$current_user' ";

                        if (mysqli_query($db, $sql)) {
                            if(isset($already) && !empty($already)) {
                                echo "<p>You have already $already!</p>";
                            } else {
                                echo "<p class='pad-green'>Voted Successfully!</p><br>";
                            }
                            header( "refresh:1; url=listproposals.php" );
                        } else {
                            echo "<p class='pad'>Vote Failed!</p>".mysqli_error($db);
                        }
                        mysqli_close($db);
                    }

                    else {  // Insert, First Vote, INITIALLY!
                        $rdb_value = $_POST["radio"];
                        if($rdb_value == 1) { // If liked INITIALLY!                   
                            $like = 1;
                            $dislike = 0;
                            // Like ++
                            $increaseLike = "UPDATE proposal SET likeCount = likeCount + 1 WHERE id = '$id'";
                            if (!mysqli_query($db, $increaseLike)) {
                                echo "<p class='pad'>Increase Like Failed!</p>".mysqli_error($db);
                            }
                        } 
                        if($rdb_value == 0) { // If Disliked INITIALLY!
                            $like = 0;
                            $dislike = 1;
                            // Dislike ++
                            $increaseDislike = "UPDATE proposal SET dislikeCount = dislikeCount + 1 WHERE id = '$id'";
                            if (!mysqli_query($db, $increaseDislike)) {
                                echo "<p class='pad'>Increase Dislike Failed!</p>".mysqli_error($db);
                            }
                        }
                        $current_user = $_SESSION['id'];
                        $query="INSERT INTO voted_by (prop_id, mem_by, liked, disliked) values ('".$proposal_id."','".$current_user."','".$like."','".$dislike."')";
                        if(mysqli_query($db, $query)) {
                            echo "<p class='pad-green'>Voted successfully! Redirecting to Show Proposals Page..</p>";
                            //redirect the user to welcome.php
                            //header("location: welcome.php");
                            $_POST['submit'] = NULL;
                            header( "refresh:1; url=listproposals.php" );
                        } 
                        else {
                            echo "<p class='pad'>Vote could not be inserted!</p>";
                        }
                        mysqli_close($db);
                    }
                }
            ?>

        </fieldset>
        </form>
    </div>
</html>