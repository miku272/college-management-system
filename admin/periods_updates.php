<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];
$id_query = mysqli_query($con, "SELECT * FROM posts WHERE id = $id");
$period = mysqli_fetch_object($id_query);
?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $from = $_POST['from'];
    $to = $_POST['to'];

    $query = mysqli_query($con, "UPDATE posts SET title = '$title' WHERE id = $id");

    mysqli_query($con, "DELETE FROM metadata WHERE item_id = $id");

    if ($query) {
        mysqli_query($con, "INSERT INTO metadata (meta_key, meta_value, item_id) VALUES ('from', '$from', '$id')");
        mysqli_query($con, "INSERT INTO metadata (meta_key, meta_value, item_id) VALUES ('to', '$to', '$id')");

        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Some error occoured');</script>";
    }

    header('location: periods.php');
}
?>

<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Periods</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Periods</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Update Period
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <form action="" method="POST">
                                <div class="form-group px-5 py-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control bg-white" value="<?php echo $period->title; ?>" placeholder="Enter title" required>

                                    <label for="title">From</label>
                                    <input type="time" name="from" class="form-control bg-white" required>

                                    <label for="title">To</label>
                                    <input type="time" name="to" class="form-control bg-white" required>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Update Period">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>