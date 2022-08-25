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
                <h1 class="m-0">Manage Courses</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Courses</li>
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
                        Add New Course
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
                                    <option value="web-designing">Business and Management</option>
                                    <option value="programming">Computer Science and IT</option>
                                </select>

                                <label for="price">Course price (Per Year)</label>
                                <input type="number" name="price" class="form-control bg-white mb-4" placeholder="Enter course price" required>

                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control bg-white mb-4" required>

                                <label for="duration">Course duration (In Years)</label>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Courses
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
                                    <th></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Duration (In Years)</th>
                                    <th>Price (Per year)</th>
                                    <th>Added Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php
                                $course_query = mysqli_query($con, "SELECT * FROM courses");
                                $count = 1;

                                while ($course = mysqli_fetch_object($course_query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><img src="../dist/uploads/<?php echo $course->course_image; ?>" alt="Course Image" height="100" width="100" class="border"></td>
                                        <td><?php echo $course->course_name; ?></td>
                                        <td><?php echo $course->category; ?></td>
                                        <td><?php echo $course->duration; ?></td>
                                        <td><?php echo $course->price; ?></td>
                                        <td><?php echo $course->date_added; ?></td>
                                        <td>
                                            <a href="courses_updates.php?id=<?php echo $course->id; ?>" class="btn btn-primary">Edit</a>
                                            <a href="courses_delete.php?id=<?php echo $course->id ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Duration (In Years)</th>
                                    <th>Price (Per year)</th>
                                    <th>Added Date</th>
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