<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];
$id_query = mysqli_query($con, "SELECT * FROM posts WHERE id = $id");
$class = mysqli_fetch_object($id_query);
?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    $query = mysqli_query($con, "UPDATE posts SET title = '$title' WHERE id = $id") or die('oops! Something went wrong...');

    $section_ids = $_POST['section'];

    mysqli_query($con, "DELETE FROM metadata WHERE item_id = $id");

    foreach ($section_ids as $section_id) {
        $meta_query = mysqli_query($con, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ($id, 'section', '$section_id')");
    }

    header('location: classes.php');
}
?>

<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Classes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Classes</li>
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
            <div class="card-header py-2">
                <h3 class="card-title">
                    Update Class (Year)
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <form action="" method="POST">
                        <div class="form-group px-5 py-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control bg-white mb-4" value="<?php echo $class->title; ?>" placeholder="Enter class title" required>

                            <label for="section">Section (Semester)</label>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM posts WHERE type = 'section'");
                            $count = 1;
                            while ($sections = mysqli_fetch_object($query)) {
                            ?>
                                <div>
                                    <label for="<?php $count ?>">
                                        <input type="checkbox" id="<?php $count ?>" value="<?php echo $sections->id; ?>" name="section[]" class="mb-1"><?php echo $sections->title; ?>
                                    </label>
                                </div>
                            <?php $count++;
                            } ?>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Update Class">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>