<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];

mysqli_query($con, "DELETE FROM posts WHERE id = $id");

header('location: sections.php');
?>