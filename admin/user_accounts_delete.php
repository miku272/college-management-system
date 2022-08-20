<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];
$id_query = mysqli_query($con, "SELECT * FROM accounts WHERE id = $id");
$account = mysqli_fetch_object($id_query);

mysqli_query($con, "DELETE FROM accounts WHERE id = $id");

header("location: user_accounts.php?user=$account->user_type");
?>