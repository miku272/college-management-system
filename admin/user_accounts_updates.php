<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];
$id_query = mysqli_query($con, "SELECT * FROM accounts WHERE id = $id");
$account = mysqli_fetch_object($id_query);
?>

<?php
if (isset($_POST['user_submit'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_type = $_POST['user_type'];

    mysqli_query($con, "UPDATE accounts SET user_name = '$user_name', email = '$user_email' WHERE id = $id") or die(mysqli_error($con));

    header("location: user_accounts.php?user=$user_type");
}
?>

<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Accounts</h1>
                <a href="user_accounts.php?user=<?php echo $account->user_type; ?>&action=add-new" class="btn btn-lg btn-primary mt-4">Add New</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                    <li class="breadcrumb-item active"><?php echo $account->user_type; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" class="form-group">
                    <input type="text" placeholder="Enter full name" name="user_name" value="<?php echo $account->user_name; ?>" class="form-control bg-white mb-4">
                    <input type="email" placeholder="Enter email" name="user_email" value="<?php echo $account->email; ?>" class="form-control bg-white mb-4">
                    <input type="hidden" name="user_type" value="<?php echo $account->user_type; ?>">
                    <input type="submit" class="btn btn-lg btn-success" name="user_submit" value="Update <?php echo $account->user_type; ?>">
                </form>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>