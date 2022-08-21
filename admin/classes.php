<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $title." Description";
    $type = 'class';
    $added_date = date('Y-m-d');
    $status = 'publish';

    $query = mysqli_query($con, "INSERT INTO posts (title, description, type, publish_date, status) VALUES('$title', '$description', '$type', '$added_date', '$status')") or die('oops! Something went wrong...');

    $item_id = mysqli_insert_id($con);
    $section_ids = $_POST['section'];

    foreach($section_ids as $section_id) {
        $meta_query = mysqli_query($con, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ($item_id, 'section', '$section_id')");
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
        <?php if (isset($_REQUEST['action'])) { ?>
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Add New Class (Year)
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <form action="" method="POST">
                            <div class="form-group px-5 py-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control bg-white mb-4" placeholder="Enter class title" required>

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
                            <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Add Class">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        <?php } else { ?>
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Classes
                    </h3>
                    <div class="card-tools">
                        <a href="?action=add-new" class="btn btn-sm btn-outline-success"><i class="fa fa-plus mr-2"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Class (Year)</th>
                                    <th>Sections</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php
                                $args = array('type' => 'class', 'status' => 'publish');
                                $classes = get_posts($args);
                                $count = 1;

                                foreach ($classes as $class) {
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $class->title; ?></td>
                                        <td>
                                            <?php
                                            $class_meta = get_metadata($class->id, 'section');

                                            foreach ($class_meta as $meta) {
                                                $section = get_post(array('id' => $meta->meta_value));

                                                echo $section->title, "<br>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="classes_updates.php?id=<?php echo $class->id ?>" class="btn btn-primary">Edit</a>
                                            <a href="classes_delete.php?id=<?php echo $class->id ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Class (Year)</th>
                                    <th>Sections</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        <?php } ?>
        <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>