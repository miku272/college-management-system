<?php include('../includes/config.php'); ?>

<?php
$id = $_GET['id'];
$id_query = mysqli_query($con, "SELECT * FROM courses WHERE id = $id");
$course = mysqli_fetch_object($id_query);
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $image = $_FILES["thumbnail"]["name"];

    mysqli_query($con, "UPDATE courses SET course_name = '$name', category = '$category', duration = '$duration', price = '$price' WHERE id = $id");

    if ($image != "") {
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
                echo "<script>alert('File is not an image.');</script>";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "<script>alert('Sorry, file already exists.');</script>";
        //     $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES["thumbnail"]["size"] > 50000000) {
            echo "<script>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $query = mysqli_query($con, "UPDATE courses SET course_image = '$image' WHERE id = $id") or die(mysqli_error($con));
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    }

    header('location: courses.php');
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
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Update Course
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group px-5 py-3">
                            <label for="name">Course name</label>
                            <input type="text" name="name" class="form-control bg-white mb-4" value="<?php echo $course->course_name ?>" placeholder="Enter course name" required>

                            <label for="category">Course Category</label>
                            <select name="category" class="form-control bg-white mb-4" required>
                                <option value="">Select Category</option>
                                <option value="web-designing">Business and Management</option>
                                <option value="programming">Computer Science and IT</option>
                            </select>

                            <label for="price">Course price (Per Year)</label>
                            <input type="number" name="price" class="form-control bg-white mb-4" value="<?php echo $course->price ?>" placeholder="Enter course price" required>

                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control bg-white mb-4">

                            <label for="duration">Course duration (In Years)</label>
                            <input type="text" name="duration" class="form-control bg-white mb-4" value="<?php echo $course->duration ?>" placeholder="Enter course duration" required>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success mx-5 mb-2 col-3" value="Update Course">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
</section>
<!-- /.content -->
<?php include('footer.php'); ?>