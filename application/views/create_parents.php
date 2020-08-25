<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Parents</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.ico' ?>">
        <link href="<?php echo base_url() . 'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'plugins/select2/css/select2.min.css' ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url() . 'plugins/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'plugins/datatables/buttons.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'plugins/datatables/responsive.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css' ?>" rel="stylesheet" />
        <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/metismenu.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/icons.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'topbar.php'; ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Create Employee</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo isset($users) ? site_url('Add_employee/edit_employee/' . $users['id']) : site_url('Add_employee/insert_employee'); ?>" id="form_data" name="party" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Name</label>
                                                    <div class="col-sm-4" style="margin-left: -20px;">
                                                        <input class="form-control" type="text"  placeholder="Employee Name" id="emp_name" name="emp_name" value="<?php echo isset($users) ? set_value("name", $users['emp_name']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Contact</label>
                                                    <div class="col-sm-4"style="margin-left: -20px;">
                                                        <input class="form-control" type="number"  placeholder="Employee Contact" id="emp_contact" name="emp_contact" value="<?php echo isset($users) ? set_value("contact", $users['emp_contact']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-4" style="margin-left: -105px;">
                                                        <input class="form-control" type="text"  placeholder="Employee Address" id="emp_address" name="emp_address" value="<?php echo isset($users) ? set_value("address", $users['emp_address']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Designation</label>
                                                    <div class="col-sm-4" style="margin-left: -100px;">  
                                                        <input class="form-control" type="text"  placeholder="Employee Designation" id="emp_designation" name="emp_designation" value="<?php echo isset($users) ? set_value("designation", $users['emp_designation']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Join Date</label>
                                                    <div class="col-sm-4" style="margin-left: -100px;">  
                                                        <input class="form-control" type="date"  id="emp_joindate" placeholder="dd-mm-yy" name="emp_joindate" value="<?php echo isset($users) ? set_value("date", $users['emp_joindate']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-4" style="margin-left: -105px;">
                                                        <input type="file" id="emp_image" name="emp_image" class="form-control filestyle" data-input="false" data-buttonname="btn-secondary" value="<?php echo isset($users) ? set_value("image", $users['emp_image']) : set_value(""); ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-4" style="margin-left: -100px;">  
                                                        <?php
                                                        if (isset($users)) {
                                                            if ($users['emp_status'] == 'Active') {
                                                                ?>
                                                                <input type="checkbox" id="switch" switch="none" name="emp_status" checked />
                                                                <label for="switch" data-on-label="On"data-off-label="Off"</label>
                                                            <?php } elseif ($users['emp_status'] == 'Deactive') {
                                                                ?>
                                                                <input type="checkbox" id="switch" switch="none" name="emp_status" />
                                                                <label for="switch" data-on-label="On"data-off-label="Off"</label>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <input type="checkbox" id="switch" switch="none" name="emp_status" checked/>
                                                            <label for="switch" data-on-label="On"data-off-label="Off"></label>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class = "button-items">
                                                    <button type = "submit" id = "btn_save" class = "btn btn-primary waves-effect waves-light"><?php echo (isset($users) ? 'Edit' : 'Save') ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">View of Employee</h4><br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Emp ID</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Designation</th>
<!--                                                        <th>Type</th>-->
                                                        <th class="noExport">Status</th>
                                                        <th class="noExport">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($users1)) {
                                                        $i = 1;
                                                        foreach ($users1 as $e) {
                                                            $iid = $e['id'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $e['id']; ?></td>
                                                                <td><?php echo $e['emp_name'] ?></td>
                                                                <td><?php echo $e['emp_contact'] ?></td>
                                                                <td><?php echo $e['emp_address'] ?></td>
                                                                <!--<td><img src="<?php // echo base_url($e['emp_image']);                         ?>" height="60" width="60"></td>-->
                                                                <td><?php echo $e['emp_designation'] ?></td>
                                                                <!--<td><?php // echo $e['emp_type']                        ?></td>-->
                                                                <td><?php
                                                                    if ($e['emp_status'] == 'Active') {
                                                                        echo "<input type='checkbox' switch='none' data-status='0' id='" . $e['id'] . "'   onclick='approveuser(this.id)' checked/><label for='" . $e['id'] . "' data-on-label='On' data-off-label='Off'></label></td>";
                                                                    } else {
                                                                        echo "<input type='checkbox' switch='none' data-status='1' id='" . $e['id'] . "'  onclick='approveuser(this.id)'/><label for='" . $e['id'] . "'  data-on-label='On' data-off-label='Off' ></label></td>";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($right as $r) {
                                                                        if ($r['role_edit'] == 1) {
                                                                            ?>
                                                                            <a href="<?php echo base_url() . 'Add_employee/getdata_employee/' . $e['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                                                <?php
                                                                            }
                                                                            if ($r['role_delete'] == 1) {
                                                                                ?>
                                                                            <!--<a href="<?php // echo base_url() . 'index.php/login/delete_employee/' . $e['id']                         ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
                                                                            <?php
                                                                        }
                                                                    }
                                                                    echo "<button type = 'submit' href = '#addparty' class = 'btn btn-primary waves-effect waves-light' data-toggle = 'modal' data-id = '$iid' data-image = '" . $e['emp_image'] . "' data-url='" . base_url() . "' ><b>View Image</b></button>";
                                                                    ?>
                                                                </td>
                                                            </tr>   
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!--end row-->


                        </div>

                        <!--end page content-->

                    </div> <!--container-fluid -->

                </div> <!--content -->

                <?php include 'footer.php'
                ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.bundle.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/metisMenu.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery.slimscroll.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/waves.min.js' ?>"></script>

        <script src="<?php echo base_url() . 'plugins/jquery-sparkline/jquery.sparkline.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/bootstrap-md-datetimepicker/js/moment-with-locales.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/bootstrap-md-datetimepicker/js/bootstrap-material-datetimepicker.js' ?>"></script>

        <!-- Plugins js -->
        <script src="<?php echo base_url() . 'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js' ?>"></script>

        <script src="<?php echo base_url() . 'plugins/select2/js/select2.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/bootstrap-maxlength/bootstrap-maxlength.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/jquery.dataTables.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/dataTables.bootstrap4.min.js' ?>"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url() . 'plugins/datatables/dataTables.buttons.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/buttons.bootstrap4.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/jszip.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/pdfmake.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/vfs_fonts.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/buttons.html5.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/buttons.print.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/buttons.colVis.min.js' ?>"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url() . 'plugins/datatables/dataTables.responsive.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/datatables/responsive.bootstrap4.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/pages/datatables.init.js' ?>"></script>

        <!-- Plugins Init js -->
        <script src="<?php echo base_url() . 'assets/pages/form-advanced.js' ?>"></script>
        <!-- App js -->
        <script src="<?php echo base_url() . 'assets/js/app.js' ?>"></script>

    </body>

</html>