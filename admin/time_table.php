<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Time Table</h1>
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
                                    <option value="">-Select Section-</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
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
                    <tr>
                        <td>9:10 AM - 10:00 AM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>10:00 AM - 10:50 AM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>10:50 AM - 11:40 AM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>11:40 AM - 12:30 PM</td>
                        <td colspan="5" class="text-center"><b style="font-size: 2rem;">Break</b></td>
                    </tr>
                    <tr>
                        <td>12:30 PM - 01:20 PM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>01:20 PM - 02:10 PM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>02:10 PM - 03:00 PM</td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                        <td>
                            <p>
                                <b>Sub: </b> Sub name<br>
                                <b>Teacher: </b> Teacher name
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>