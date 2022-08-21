<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $title . " Description";
    $type = 'section';
    $date_added = date('Y-m-d');
    $status = 'publish';

    $query = mysqli_query($con, "INSERT INTO posts (title, description, type, publish_date, status) VALUES('$title', '$description', '$type', '$date_added', '$status')");

    if ($query) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Some error occured');</script>";
    }
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Sections (Semesters)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Sections</li>
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
                            Sections (Semesters)
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $args = array('type' => 'section', 'status' => 'publish');
                                    $sections = get_posts($args);
                                    $count = 1;

                                    foreach ($sections as $section) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $section->title; ?></td>
                                            <td>
                                                <a href="sections_updates.php?id=<?php echo $section->id; ?>" class="btn btn-primary">Edit</a>
                                                <a href="sections_delete.php?id=<?php echo $section->id; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php $count++;
                                    } ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Title</th>
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
                            Add New Section (Semester)
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <form action="" method="POST">
                                <div class="form-group px-5 py-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control bg-white" placeholder="Enter section (Semester) title" required>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Add Section">
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