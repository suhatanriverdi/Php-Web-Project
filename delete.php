<?php
    require 'session.php';
	$id = $_GET['id'];
	require 'db_connect.php';
	mysqli_query($db, "DELETE FROM member WHERE id = '$id' ");
	header('location:welcome.php');
?>