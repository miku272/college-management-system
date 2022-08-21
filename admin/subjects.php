<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['submit_subject'])) {
    $title = $_POST['input_subject'];
    $class = $_POST['select_class'];
    $section = $_POST['select_section'];
    $description = $title . " Description";
    $type = 'subject';
    $date_added = date('Y-m-d');
    $status = 'publish';

    $query = mysqli_query($con, "INSERT INTO posts (title, description, type, publish_date, status) VALUES ('$title', '$description', '$type', '$date_added', '$status')");

    if ($query) {
        $item_id = mysqli_insert_id($con);

        $metadata = array(
            'class_id' => $class,
            'section_id' => $section,
        );

        foreach ($metadata as $key => $value) {
            mysqli_query($con, "INSERT INTO metadata (item_id, meta_key, meta_value) VALUES ('$item_id', '$key', '$value')");
        }

        echo "<script>alert('Data inserted Successfully');</script>";
    } else {
        echo "<script>alert('Some error occured!');</script>";
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
                <h1 class="m-0">Manage Subjects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header py-2">
                        <div class="card-title">
                            Add New Subject
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form action="" class="form-group" method="POST">
                            <label for="select_class">Select Class</label>
                            <select name="select_class" id="select_class" class="form-control bg-white mb-4" id="select_class" required>
                                <option value="">Select Class (Year)</option>
                                <?php
                                $args = array('type' => 'class', 'status' => 'publish');
                                $classes = get_posts($args);
                                foreach ($classes as $class) {
                                ?>
                                    <option value="<?php echo $class->id; ?>"><?php echo $class->title; ?></option>
                                <?php } ?>
                            </select>

                            <div class="form-group" id="section-container" style="display:none">
                                <label for="select_section">Select Section (Semester)</label>
                                <select require name="select_section" id="select_section" class="form-control bg-white" required>
                                    <option value="">-Select Section-</option>
                                </select>
                            </div>

                            <label for="input_subject">Enter Subject Name</label>
                            <input type="text" name="input_subject" placeholder="Enter subject" id="input_subject" class="form-control bg-white mb-5" required>

                            <input type="submit" name="submit_subject" class="btn btn-success col-12" value="Add Subject">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Subjects
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Name</th>
                                        <th>Added Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $args = array(
                                        'type' => 'subject',
                                        'status' => 'publish'
                                    );
                                    $subjects = get_posts($args);

                                    foreach ($subjects as $subject) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $subject->title; ?></td>
                                            <td><?php echo $subject->publish_date; ?></td>
                                            <td>
                                                <a href="subjects_updates.php?id=<?php echo $subject->id; ?>" class="btn btn-primary">Edit</a>
                                                <a href="subjects_delete.php?id=<?php echo $subject->id; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php $count++;
                                    } ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Name</th>
                                        <th>Added Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>