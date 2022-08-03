<?php include('../includes/config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $image = $_FILES["thumbnail"]["name"];
    $date_added = date('Y-m-d');


    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["thumbnail"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            $query = mysqli_query($con, "INSERT INTO courses (course_name, category, duration, price, course_image, date_added) VALUES ('$name', '$category', '$duration', $price, '$image', '$date_added')") or die(mysqli_error($con));

            header('location: courses.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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
        <?php if (isset($_REQUEST['action'])) { ?>
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Add New Subjects
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="form-group px-5 py-3">
                                <label for="name">Course name</label>
                                <input type="text" name="name" class="form-control bg-white mb-4" placeholder="Enter course name" required>

                                <label for="category">Course Category</label>
                                <select name="category" class="form-control bg-white mb-4">
                                    <option value="">Select Category</option>
                                    <option value="programming">Programming</option>
                                    <option value="web-designing">Web Designing</option>
                                    <option value="app-development">App Development</option>
                                </select>

                                <label for="price">Course price</label>
                                <input type="number" name="price" class="form-control bg-white mb-4" placeholder="Enter course price" required>

                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control bg-white mb-4" required>

                                <label for="duration">Course duration</label>
                                <input type="text" name="duration" class="form-control bg-white mb-4" placeholder="Enter course duration" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Add Course">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        <?php } else { ?>
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
                            <form action="#" class="form-group" method="POST">
                                <label for="select_class">Select Class</label>
                                <select name="select_class" id="select_class" class="form-control bg-white mb-4" id="select_class" required>
                                    <option value="">Select Class</option>
                                    <?php
                                    $args = array('type' => 'class', 'status' => 'publish');
                                    $classes = get_posts($args);
                                    foreach ($classes as $class) {
                                    ?>
                                        <option value="<?php echo $class->id; ?>"><?php echo $class->title; ?></option>
                                    <?php } ?>
                                </select>

                                <div class="form-group" id="section-container" style="display:none">
                                    <label for="select_section">Select Section</label>
                                    <select require name="select_section" id="select_section" class="form-control bg-white">
                                        <option value="">-Select Section-</option>
                                    </select>
                                </div>

                                <label for="input_subject">Select Section</label>
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
                                                <td><?php echo $subject->date_added; ?></td>
                                                <td></td>
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
        <?php } ?>
        <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>