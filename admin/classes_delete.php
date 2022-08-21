<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];

mysqli_query($con, "DELETE FROM posts WHERE id = $id");
mysqli_query($con, "DELETE FROM metadata WHERE item_id = $id");

header('location: classes.php');
?>