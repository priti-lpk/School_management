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
                                    <h4 class="page-title">Create Parents</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo isset($users) ? site_url('Teacher/Add_parents/edit_parents/' . $users[0]['id']) : site_url('Teacher/Add_parents/insert_parents'); ?>" id="form_data" name="party" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                                    <div class="col-sm-4" style="margin-left: -95px;">
                                                        <input class="form-control" type="text"  placeholder="First Name" id="p_fname" name="p_fname" value="<?php echo isset($users) ? set_value("p_fname", $users[0]['p_fname']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Middle Name</label>
                                                    <div class="col-sm-4"style="margin-left: -80px;">
                                                        <input class="form-control" type="text"  placeholder="Middle Name" id="p_mname" name="p_mname" value="<?php echo isset($users) ? set_value("p_mname", $users[0]['p_mname']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Surname</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">
                                                        <input class="form-control" type="text"  placeholder="Surname" id="p_surname" name="p_surname" value="<?php echo isset($users) ? set_value("p_surname", $users[0]['p_surname']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mother's Name</label>
                                                    <div class="col-sm-4" style="margin-left: -75px;">  
                                                        <input class="form-control" type="text"  placeholder="Mother's Name" id="s_mothername" name="s_mothername" value="<?php echo isset($users) ? set_value("s_mothername", $users[0]['s_mothername']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mobile No.1</label>
                                                    <div class="col-sm-4" style="margin-left: -95px;">
                                                        <input class="form-control" type="number"  placeholder="Mobile No.1" id="p_mobno1" name="p_mobno1" value="<?php echo isset($users) ? set_value("p_mobno1", $users[0]['p_mobno1']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mobile No.2</label>
                                                    <div class="col-sm-4" style="margin-left: -75px;">  
                                                        <input class="form-control" type="number"  placeholder="Mobile No.2" id="p_mobno2" name="p_mobno2" value="<?php echo isset($users) ? set_value("p_mobno2", $users[0]['p_mobno2']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Village</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">
                                                        <input class="form-control" type="text"  placeholder="Village" id="village" name="village" value="<?php echo isset($users) ? set_value("village", $users[0]['village']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Taluka</label>
                                                    <div class="col-sm-4" style="margin-left: -70px;">  
                                                        <input class="form-control" type="text"  placeholder="Taluka" id="taluka" name="taluka" value="<?php echo isset($users) ? set_value("taluka", $users[0]['taluka']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">District</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">
                                                        <input class="form-control" type="text"  placeholder="District" id="district" name="district" value="<?php echo isset($users) ? set_value("district", $users[0]['district']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">State</label>
                                                    <div class="col-sm-4" style="margin-left: -70px;">  
                                                        <input class="form-control" type="text"  placeholder="State" id="state" name="state" value="<?php echo isset($users) ? set_value("state", $users[0]['state']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Pin Code</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">
                                                        <input class="form-control" type="number"  placeholder="Pin Code" id="pin_code" name="pin_code" value="<?php echo isset($users) ? set_value("pin_code", $users[0]['pin_code']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-4" style="margin-left: -70px;">  
                                                        <input class="form-control" type="text"  placeholder="Address" id="address" name="address" value="<?php echo isset($users) ? set_value("address", $users[0]['address']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Username</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">  
                                                        <input class="form-control" type="text"  placeholder="Username" id="username" name="username" value="<?php echo isset($users) ? set_value("username", $users[0]['username']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-4" style="margin-left: -80px;">  
                                                        <input class="form-control" type="text"  placeholder="Password" id="password" name="password" value="<?php echo isset($users) ? set_value("password", $users[0]['password']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-1 col-form-label">Proof</label>
                                                    <div class="col-sm-4" style="margin-left: -10px;">
                                                        <input type="file" id="proof" name="proof" class="form-control filestyle" data-input="false" data-buttonname="btn-secondary" value="<?php echo isset($users) ? set_value("proof", $users[0]['proof']) : set_value(""); ?>" >
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

                                            <h4 class="mt-0 header-title">View of Parents</h4><br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Mother's Name</th>
                                                        <th>Contact</th>
                                                        <th>Village</th>
                                                        <th>Taluka</th>
                                                        <th>District</th>
                                                        <th>State</th>
                                                        <th>Pin Code</th>
                                                        <th>Address</th>
                                                        <th>Proof</th>
                                                        <th class="noExport">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($all)) {
                                                        $i = 1;
                                                        foreach ($all as $e) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $e['id']; ?></td>
                                                                <td><?php echo $e['p_fname'] . " " . $e['p_mname'] . " " . $e['p_surname'] ?></td>
                                                                <td><?php echo $e['s_mothername'] ?></td>
                                                                <td><?php echo $e['p_mobno1'] . " / " . $e['p_mobno2'] ?></td>
                                                                <td><?php echo $e['village'] ?></td>
                                                                <td><?php echo $e['taluka'] ?></td>
                                                                <td><?php echo $e['district'] ?></td>
                                                                <td><?php echo $e['state'] ?></td>
                                                                <td><?php echo $e['pin_code'] ?></td>
                                                                <td><?php echo $e['address'] ?></td>
                                                                <td><img src="<?php echo base_url("Parents/" . $e['proof']); ?>" height="60" width="60"></td>
                                                                <td><a href="<?php echo base_url() . 'Teacher/Add_parents/getdata_parents/' . $e['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                                    <a href="<?php echo base_url() . 'Teacher/Add_parents/delete_parents/' . $e['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
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