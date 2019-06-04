<?php
    session_start();
    require 'session.php';
    require 'db_connect.php';
?>
<html>
    <style>
    /* The container */
    .container {
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .liked {
        color: #c5e87b;
    }

    .disliked {
        color: #e33a3a;
    }

    .Disabled{
      pointer-events: none;
      cursor: not-allowed;
      opacity: 0.65;
      filter: alpha(opacity=65);
      -webkit-box-shadow: none;
      box-shadow: none;
    }
    </style>
    <link rel="stylesheet" href="form.css" type="text/css">
    <link href="custom/css/all.css" rel="stylesheet"> <!--load all custom styles -->
    <title>List Proposals</title>
    <body><br>
        <a class="btn btn-primary" href="welcome.php" style="margin: 10px;">Back</a>
        <div align="center" class="body-content moduleShow">
            <?php
                $result = mysqli_query($db, "SELECT * FROM proposal");
                $num_rows = mysqli_num_rows($result); // Number Of Proposals
                $query_all = $db->query("SELECT * FROM proposal");
                $i=1;

                while($row = $query_all->fetch_assoc()) {
                    $id = $row["id"];
                    $owner = $row["mem_id"];
                    $type = $row["type"];
                    $description = $row["description"];
                    $likeCount = $row["likeCount"];
                    $dislikeCount = $row["dislikeCount"];
                    $createdAt = $row["createdAt"];
                    $isActive = $row['isActive'];
                    $query = "SELECT fname, lname FROM member WHERE id = \"" . $owner . "\" LIMIT 1";
                    $result = $db->query($query);
                    $row = $result->fetch_assoc(); // Returned Result from Query
                    ?>
                    <fieldset style="width: 75%;margin: 45px;padding: 20px;display: unset;background-color: #231e2bb8;">
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
                                $query = "SELECT liked, disliked FROM voted_by WHERE prop_id = \"" . $id . "\" AND mem_by = \"" . $_SESSION['id'] . "\" LIMIT 1";
                                $result = $db->query($query);
                                $row = $result->fetch_assoc(); // Returned Result from Query
                                //echo $row['liked'];
                                //echo $row['disliked'];
                            ?>
                            <form method="post" action="listproposals.php" style="padding-top: 10px;">
                                <label class="container">Like<?= " ".$likeCount ?>
                                  <input disabled type="radio" <?=$row['liked']==1 ? "checked" : ""?> value="1" name="radio[<?php echo $i; ?>]">
                                  <i class="<?=$row['liked']==1 ? 'liked fas fa-thumbs-up' : 'fas fa-thumbs-up'?>"></i>
                                </label>
                                <label class="container">Dislike<?= " ".$dislikeCount ?>
                                  <input disabled type="radio" <?=$row['disliked']==1 ? "checked" : ""?> value="0" name="radio[<?php echo $i; ?>]">
                                  <i class="<?=$row['disliked']==1 ? 'disliked fas fa-thumbs-down' : 'fas fa-thumbs-down'?>"></i>
                                </label>
                            </form>
                        </div>
                        <?php
                            $qc = $db->query("SELECT * FROM comments WHERE prop_id = '$id' ");
                            while($com = $qc->fetch_assoc()) {       
                                $cid = $com["id"];
                                $comm = $com["comment"];
                                $dateAt = $com["date"];
                                $props = $com["prop_id"];
                                $mems = $com["mem_id"];
                                $query = "SELECT fname, lname FROM member WHERE id = \"" . $mems . "\" LIMIT 1";
                                $result = $db->query($query);
                                $row = $result->fetch_assoc(); // Returned Result from Query
                                $fullname = $row["fname"]." ".$row["lname"] ;
                                ?>
                                <fieldset style="text-align: right;padding: 10px;margin: 10px;background-color: #00647187;">
                                    <?php
                                        echo '<h3>';
                                        echo $comm;
                                        echo '</h3>';

                                        echo '<p>';
                                        echo $dateAt;
                                        echo '</p>';

                                        echo '<p>';
                                        echo $fullname;
                                        echo '</p>';
                                    ?>
                                </fieldset>
                                <?php
                            }
                        ?>
                        <div style="padding: 20px;">
                            <a class="btn btn-success" href="comment.php?id=<?php echo $id; ?>">Comment</a>
                            <?php if($isActive == 1) : ?>
                                <a class="btn btn-success" href="vote.php?id=<?php echo $id; ?>">Vote</a>
                            <?php else : ?>
                                <input type="button" value="Voting Closed" class="Disabled"/>
                            <?php endif; ?>
                        </div>
                    </fieldset>

                    <?php
                    $i+=1;
                }
            ?>
        </div>
    </body>
</html>