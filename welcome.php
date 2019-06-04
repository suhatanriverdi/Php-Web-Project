<?php session_start(); require 'session.php'; $_SESSION['success']=''; $_SESSION['error']=''; ?>

<html>
<link rel="stylesheet" href="form.css" type="text/css">
<title>Welcome</title>
<div align="center" class="down">
    <span class="user"><?= $_SESSION['success'] ?></span>
    <span class="user"><?= $_SESSION['error'] ?></span>

    <div class="welcome up">

        <?php
            $imgName = $_SESSION['id'];
            $files = glob("img/$imgName.*"); // Will find 2.txt, 2.php, 2.gif from webterm/img
            if(!glob("img/$imgName.*")) {
                $files = glob("img/default.ico"); // Will find default.png
                echo "<img style='width:55px; height:55px;' src='".$files[0]."'></div>";
            } else {
                echo "<img style='width:55px; height:55px;' src='".$files[0]."'></div>";
            }
        ?>
        Welcome <span class="user"><?= $_SESSION['username'] ?><?= " ".$_SESSION['lname'] ?></span><br><br>
        <a class="btn btn-primary" href="logout.php">Logout</a>
            <a class="btn btn-primary" href="proposal.php">Create Proposal</a>
            <a class="btn btn-primary" href="listproposals.php">Show Proposals</a><br><br>
            <a class="btn btn-primary" href="trendproposals.php">See Trend Activity proposals</a><br><br>
        <?php
            if($_SESSION['id'] == 1) { // If President
                echo "<p class='pad-green'>You Are System Administrator!</p>";
            }
        ?>

    <?php if($_SESSION['id'] == 1) : ?>
        <div class="body-content">
            <table border = 1>
                <tr style="color:#0c0">
                    <td> ID </td>
                    <td> Username </td>
                    <td> First Name </td>
                    <td> Last Name </td>
                    <td> Email </td>
                    <td> Department </td>
                    <td> Birthdate </td>
                    <td> Password </td>
                    <td> Update </td>
                </tr>
                <?php
                    require 'db_connect.php';
                    $query_all = $db->query("SELECT * FROM member");
                    while($row = $query_all->fetch_assoc()) {
                        if($row["id"] == 1) {
                            $username = $row["username"];
                            $email = $row["email"];
                            $id = $row["id"];
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            $birthdate = $row["birthdate"];
                            $email = $row["email"];
                            $department = $row["department"];
                            $password = $row["password"];
                            echo "<tr>";
                            echo "  <td> $id </td>";
                            echo "  <td> $username </td>";
                            echo "  <td> $fname </td>";
                            echo "  <td> $lname </td>";
                            echo "  <td> $email </td>";
                            echo "  <td> $department </td>";
                            echo "  <td> $birthdate </td>";
                            echo "  <td> $password </td>";
                            ?> 
                            <td>
                                <a class="edit_delete btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <?php   
                            echo "</tr>";
                                continue;  
                        }
                        $username = $row["username"];
                        $email = $row["email"];
                        $id = $row["id"];
                        $fname = $row["fname"];
                        $lname = $row["lname"];
                        $birthdate = $row["birthdate"];
                        $email = $row["email"];
                        $department = $row["department"];
                        $password = $row["password"];
                        echo "<tr>";
                        echo "  <td> $id </td>";
                        echo "  <td> $username </td>";
                        echo "  <td> $fname </td>";
                        echo "  <td> $lname </td>";
                        echo "  <td> $email </td>";
                        echo "  <td> $department </td>";
                        echo "  <td> $birthdate </td>";
                        echo "  <td> $password </td>";
                        ?> 
                        <td>
                            <a class="edit_delete btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="edit_delete btn-primary" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                        <?php   
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        <?php else : ?>
                <div class="body-content">
                    <table border = 1>
                        <tr style="color:#0c0">
                            <td> ID </td>
                            <td> Username </td>
                            <td> First Name </td>
                            <td> Last Name </td>
                            <td> Email </td>
                            <td> Department </td>
                            <td> Birthdate </td>
                            <td> Password </td>
                            <td> Update </td>
                        </tr>
                        <?php
                            require 'db_connect.php';
                            $id = $_SESSION['id'];
                            $query_all = $db->query("SELECT * FROM member WHERE id = '$id' ");
                            $row = $query_all->fetch_assoc();
                            $username = $row["username"];
                            $email = $row["email"];
                            $id = $row["id"];
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            $birthdate = $row["birthdate"];
                            $email = $row["email"];
                            $department = $row["department"];
                            $password = $row["password"];
                            echo "<tr>";
                            echo "  <td> $id </td>";
                            echo "  <td> $username </td>";
                            echo "  <td> $fname </td>";
                            echo "  <td> $lname </td>";
                            echo "  <td> $email </td>";
                            echo "  <td> $department </td>";
                            echo "  <td> $birthdate </td>";
                            echo "  <td> $password </td>";
                            ?> 
                            <td>
                                <a class="edit_delete btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <?php   
                            echo "</tr>";
                        ?>
        <?php endif; ?>
    </div>
</div>