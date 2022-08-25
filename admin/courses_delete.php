<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];

mysqli_query($con, "DELETE FROM courses WHERE id = $id");

header('location: courses.php');
?>