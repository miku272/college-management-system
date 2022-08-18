<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
<?php include('side_bar.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Time Table</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
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
                                    $query = mysqli_query($con, "SELECT * FROM posts as p INNER JOIN metadata as mc ON (mc.item_id = p.id) INNER JOIN metadata as md ON (md.item_id = p.id) INNER JOIN metadata as mp ON (mp.item_id = p.id) WHERE p.type = 'timetable' AND p.status = 'publish' AND md.meta_key = 'day_name' AND md.meta_value = '$day' AND mp.meta_key = 'period_id' AND mp.meta_value = $period->id AND mc.meta_key = 'class_id' AND mc.meta_value = 1");

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
                                            <!-- <p>
                                            <b>Sub: </b> Sub name<br>
                                            <b>Teacher: </b> <?php // echo get_metadata($time_table->item_id, 'teacher_id')[0]->meta_value; 
                                                                ?>
                                        </p> -->
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
    </div>
</section>
<?php include('footer.php'); ?>