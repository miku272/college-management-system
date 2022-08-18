<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $class = $_POST['select_class'];
    $section = $_POST['select_section'];
    $teacher = $_POST['select_teacher'];
    $period = $_POST['select_period'];
    $day = $_POST['select_day'];
    $subject = $_POST['select_subject'];
    $date_added = date('Y-m-d');
    $status = 'publish';
    $type = 'time_table';
    $title = $day . " Time table";

    $metadata = array(
        'class_id' => $class,
        'section_id' => $section,
        'teacher_id' => $teacher,
        'period_id' => $period,
        'day_name' => $day,
        'subject_id' => $subject,
    );

    $query = mysqli_query($con, "INSERT INTO posts (type, status, publish_date) VALUES ('$type', '$status', '$date_added')");

    $item_id = mysqli_insert_id($con);

    if ($query) {
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
                <h1 class="m-0">
                    Manage Time Table
                    <a href="?action=add" class="mx-5 btn btn-lg btn-primary">Add New</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Time Table</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
            <div class="card">
                <div class="card-body">
                    <form action="" class="form-group" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <label for="select_class">Select Class (Year)</label>
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
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="section-container">
                                    <label for="select_section">Select Section (Semester)</label>
                                    <select require name="select_section" id="select_section" class="form-control bg-white" required>
                                        <option value="">Select Section (Semester)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="teacher-container">
                                    <label for="select_teacher">Select Teacher</label>
                                    <select require name="select_teacher" id="select_teacher" class="form-control bg-white" required>
                                        <option value="">Select Teacher</option>
                                        <?php
                                        $query = mysqli_query($con, "SELECT * FROM accounts WHERE user_type = 'teacher'");
                                        while ($teachers = mysqli_fetch_object($query)) {
                                        ?>
                                            <option value="<?php echo $teachers->id; ?>"><?php echo $teachers->user_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="period-container">
                                    <label for="select_period">Select Period</label>
                                    <select require name="select_period" id="select_period" class="form-control bg-white" required>
                                        <option value="">Select Period</option>
                                        <?php
                                        $args = array('type' => 'period', 'status' => 'publish');
                                        $periods = get_posts($args);
                                        foreach ($periods as $period) {
                                        ?>
                                            <option value="<?php echo $period->id; ?>"><?php echo $period->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="day-container">
                                    <label for="select_day">Select Day</label>
                                    <select require name="select_day" id="select_day" class="form-control bg-white" required>
                                        <option value="">Select Day</option>
                                        <?php
                                        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

                                        foreach ($days as $day) {
                                        ?>
                                            <option value="<?php echo $day; ?>"><?php echo ucwords($day); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="subject-container">
                                    <label for="select_subject">Select Subject</label>
                                    <select require name="select_subject" id="select_subject" class="form-control bg-white" required>
                                        <option value="">Select Subject</option>
                                        <?php
                                        $args = array('type' => 'subject', 'status' => 'publish');
                                        $subjects = get_posts($args);
                                        foreach ($subjects as $subject) {
                                        ?>
                                            <option value="<?php echo $subject->id; ?>"><?php echo $subject->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-lg btn-success mt-4 col-12" name="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        <?php } else { ?>

            <div class="card">
                <div class="card-body">
                    <form action="" class="form-group" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
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
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" id="section-container" style="display:none">
                                    <label for="select_section">Select Section (Semester)</label>
                                    <select require name="select_section" id="select_section" class="form-control bg-white">
                                        <option value="">Select Section (Semester)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Timing</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $args = array('type' => 'period', 'status' => 'publish');
                    $periods = get_posts($args);

                    foreach ($periods as $period) {
                    ?>
                        <tr>
                            <td><?php
                                $from = get_metadata($period->id, 'from')[0]->meta_value;

                                echo date('h:i A', strtotime($from));
                                ?> - <?php
                                        $to = get_metadata($period->id, 'to')[0]->meta_value;

                                        echo date('h:i A', strtotime($to));
                                        ?></td>
                            <?php
                            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

                            foreach ($days as $day) {
                                $query = mysqli_query($con, "SELECT * FROM posts AS p INNER JOIN metadata AS md ON (md.item_id = p.id) INNER JOIN metadata AS mp ON (mp.item_id = p.id) WHERE p.type = 'time_table' AND p.status = 'publish' AND md.meta_key = 'day_name' AND md.meta_value = '$day' AND mp.meta_key = 'period_id' AND mp.meta_value = $period->id");

                                if (mysqli_num_rows($query) > 0) {
                                    while ($time_table = mysqli_fetch_object($query)) {
                            ?>
                                        <td>
                                            <p>
                                                <b>Sub: </b>
                                                <?php
                                                $subject_id = get_metadata($time_table->item_id, 'subject_id')[0]->meta_value;
                                                echo get_post(array('id' => $subject_id))->title;
                                                ?>
                                                <br>
                                                <b>Teacher: </b> <?php
                                                                    $teacher_id = get_metadata($time_table->item_id, 'teacher_id')[0]->meta_value;
                                                                    echo get_user_data($teacher_id)[0]->user_name;
                                                                    ?>
                                            </p>
                                        </td>
                                    <?php }
                                } else { ?>
                                    <td>
                                        Unscheduled
                                    </td>
                            <?php }
                            } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>