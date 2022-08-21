<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $type = 'period';
    $description = $title . " Description";
    $status = 'publish';
    $date_added = date('Y-m-d');

    $query = mysqli_query($con, "INSERT INTO posts (title, status, type, description, publish_date) VALUES ('$title', '$status', '$type', '$description', '$date_added')");

    if ($query) {
        $post_id = mysqli_insert_id($con); // Returns the id of last inserted row

        mysqli_query($con, "INSERT INTO metadata (meta_key, meta_value, item_id) VALUES ('from', '$from', '$post_id')");
        mysqli_query($con, "INSERT INTO metadata (meta_key, meta_value, item_id) VALUES ('to', '$to', '$post_id')");

        // header('location: ./periods.php');
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Some error occoured');</script>";
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Periods
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Title</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $args = array('type' => 'period', 'status' => 'publish');
                                    $periods = get_posts($args);
                                    $count = 1;

                                    foreach ($periods as $period) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $period->title; ?></td>
                                            <td>
                                                <?php
                                                $from = get_metadata($period->id, 'from')[0]->meta_value;

                                                echo date('h:i A', strtotime($from));
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $to = get_metadata($period->id, 'to')[0]->meta_value;

                                                echo date('h:i A', strtotime($to));
                                                ?>
                                            </td>
                                            <td>
                                                <a href="periods_updates.php?id=<?php echo $period->id ?>" class="btn btn-primary">Edit</a>
                                                <a href="periods_delete.php?id=<?php echo $period->id ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php $count++;
                                    } ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Title</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Add New Period
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <form action="" method="POST">
                                <div class="form-group px-5 py-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control bg-white" placeholder="Enter title" required>

                                    <label for="title">From</label>
                                    <input type="time" name="from" class="form-control bg-white" required>

                                    <label for="title">To</label>
                                    <input type="time" name="to" class="form-control bg-white" required>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Add Period">
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