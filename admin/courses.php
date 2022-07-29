<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $image = $_POST['thumbnail'];
    $date_added = date('Y-m-d');

    $query = mysqli_query($con, "INSERT INTO courses (course_name, category, duration, price, course_image, date_added) VALUES ('$name', '$category', '$duration', $price, '$image', '$date_added')") or die(mysqli_error($con));
}
?>

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
                                    <th>Duration</th>
                                    <th>Price</th>
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
                                        <td><img src="<?php echo $course->course_image; ?>" alt="Course Image" height="100" width="100"></td>
                                        <td><?php echo $course->course_name; ?></td>
                                        <td><?php echo $course->category; ?></td>
                                        <td><?php echo $course->duration; ?></td>
                                        <td><?php echo $course->price; ?></td>
                                        <td><?php echo $course->date_added; ?></td>
                                        <td></td>
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
                                    <th>Duration</th>
                                    <th>Price</th>
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