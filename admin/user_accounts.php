<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['user_submit'])) {
    $user_name = $_POST['user_name'];
    $user_type = $_POST['user_type'];
    $user_email = $_POST['user_email'];
    $user_pass = md5(123);

    $check_email = mysqli_query($con, "SELECT * FROM accounts WHERE email='$user_email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email already exists')</script>";
    } else {
        mysqli_query($con, "INSERT INTO accounts (user_name, user_type, email, password) VALUES ('$user_name', '$user_type', '$user_email', '$user_pass')") or die(mysqli_error($con));

        header("location: user_accounts.php?user=$user_type&action=add-new");
    }
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
                <a href="user_accounts.php?user=<?php echo $_REQUEST['user']; ?>&action=add-new" class="btn btn-lg btn-primary mt-4">Add New</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                    <li class="breadcrumb-item active"><?php echo $_REQUEST['user'] ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php if (isset($_GET['action']) && $_GET['action']) { ?>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" class="form-group">
                        <input type="text" placeholder="Enter full name" name="user_name" class="form-control bg-white mb-4">
                        <input type="email" placeholder="Enter email" name="user_email" class="form-control bg-white mb-4">
                        <input type="hidden" name="user_type" value="<?php echo $_REQUEST['user']; ?>">
                        <input type="submit" class="btn btn-lg btn-success" name="user_submit" value="Register <?php echo $_REQUEST['user']; ?>">
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="table-responsive bg-white">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user_query = "SELECT * FROM accounts WHERE user_type='" . $_REQUEST['user'] . "'";
                        $user_result = mysqli_query($con, $user_query);
                        $count = 1;

                        while ($users = mysqli_fetch_object($user_result)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $users->user_name; ?></td>
                                <td><?php echo $users->email; ?></td>
                                <td>
                                    <a href="user_accounts_updates.php?id=<?php echo $users->id ?>" class="btn btn-primary">Edit</a>
                                    <a href="user_accounts_delete.php?id=<?php echo $users->id ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php $count++;
                        }  ?>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php } ?>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>