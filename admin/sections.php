<?php include('../includes/config.php'); ?>
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
                        Add New Class
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <form action="" method="post">
                            <div class="form-group px-5 py-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control bg-white mb-4" placeholder="Enter title" required>

                                <label for="section">Section</label>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM sections");
                                $count = 1;
                                while ($sections = mysqli_fetch_object($query)) {
                                ?>
                                    <div>
                                        <label for="<?php $count ?>">
                                            <input type="checkbox" id="<?php $count ?>" name="section[]" class="mb-1" required><?php echo $sections->title; ?>
                                        </label>
                                    </div>
                                <?php $count++;
                                } ?>
                            </div>
                            <input type="submit" class="btn btn-success mx-5 mb-2 col-3" value="Add Class">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Name</th>
                                    <th>Email</th>
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