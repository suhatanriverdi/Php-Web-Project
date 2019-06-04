<?php
    session_start();
    require 'session.php';
?>
<html>
    <link rel="stylesheet" href="form.css" type="text/css">
    <title>Leaderboard</title>
    <body>
        <div align="center" class="body-content moduleShow">
            <table border = 1 style="background:#163349c7;">
                <tr style="color:#0c0">
                    <td> ID </td>
                    <td> Owner </td>
                    <td> Type </td>
                    <td> Description </td>
                    <td> LikeCount </td>
                    <td> DislikeCount </td>
                    <td> CreatedAt </td>
                    <td> Popularity </td>
                </tr>
                <?php
                    require 'db_connect.php';
                    /*$cnt = $db->query("SELECT * FROM proposal");
                    while($row = $cnt->fetch_assoc()) {       
                        $id = $row["id"];
                        $owner = $row["mem_id"];
                        $type = $row["type"];
                        $description = $row["description"];
                        $likeCount = $row["likeCount"];
                        $dislikeCount = $row["dislikeCount"];
                        $createdAt = $row["createdAt"];

                        // Calculate Popularity
                        $popularity = ($likeCount - $dislikeCount);

                        /*$rows=array(
                            array($id,$owner,$type,$description,$likeCount,$dislikeCount,$createdAt)
                        );*/
/*
                        $query = "SELECT fname, lname FROM member WHERE id = \"" . $owner . "\" LIMIT 1";
                        $result = $db->query($query);
                        $row = $result->fetch_assoc(); // Returned Result from Query
                        $nameSurname = $row["fname"]." ".$row["lname"]; 

                        echo "<tr>";  
                        echo "  <td> $id </td>"; 
                        echo "  <td> $nameSurname </td>";
                        echo "  <td> $type </td>";
                        echo "  <td> $description </td>"; 
                        echo "  <td> $likeCount </td>";
                        echo "  <td> $dislikeCount </td>";
                        echo "  <td> $createdAt </td>"; 
                        echo "  <td> $popularity </td>";
                        echo "</tr>";
                    }  */

                    $rows = [];
                    $query = "SELECT * FROM proposal";
                    $result = $db->query($query);
                    while($row = mysqli_fetch_array($result)){
                        $owner = $row["mem_id"];
                        $likeCount = $row["likeCount"];
                        $dislikeCount = $row["dislikeCount"];
                        // Calculate Popularity
                        $popularity = ($likeCount - $dislikeCount);
                        array_unshift($row, $popularity);

                        $q = "SELECT fname, lname FROM member WHERE id = \"" . $owner . "\" LIMIT 1";
                        $res = $db->query($q);
                        $new = $res->fetch_assoc(); // Returned Result from Query
                        $nameSurname = $new["fname"]." ".$new["lname"]; 
                        $row['mem_id'] = $nameSurname;

                        $rows[] = $row;
                    }
                    array_multisort($rows, SORT_DESC); // ilk elemana göre sıralar!
                    //print_r($rows[0]);  
                    //echo '<br><br><br>'; 
                    $i = 0;
                    echo "<h2>The Most popular 5 Activity</h2>";  
                    foreach ($rows as $row) {
                        if($i<5) {                        
                            $id = $row['id']; 
                            $nameSurname = $row['mem_id'];
                            $type = $row[3];
                            $description = $row['description']; 
                            $likeCount = $row['likeCount'];
                            $dislikeCount = $row['dislikeCount'];
                            $createdAt = $row['createdAt']; 
                            $popularity = $row[0];

                            echo "<tr>";  
                            echo "  <td> $id </td>"; 
                            echo "  <td> $nameSurname </td>";
                            echo "  <td> $type </td>";
                            echo "  <td> $description </td>"; 
                            echo "  <td> $likeCount </td>";
                            echo "  <td> $dislikeCount </td>";
                            echo "  <td> $createdAt </td>"; 
                            echo "  <td> $popularity </td>";
                            echo "</tr>";
                            //print_r($row[0]);                    
                        }
                        $i++;
                    }
                ?>
            </table><br>
            <a class="btn btn-primary" href="welcome.php">Back</a>
        </div>
    </body>
</html>