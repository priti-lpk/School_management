<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>View Class Report</title>
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
                                    <h4 class="page-title">View Class Report</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="" id="form_data" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Medium</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="medium" id="medium" onchange="mainchange();">
                                                            <option>Select Medium</option>
                                                            <?php
                                                            foreach ($medium as $p) {
                                                                if (isset($users)) {
                                                                    ?>
                                                                    <option <?php echo ($p->id == $users[0]['medium'] ? 'selected' : '') ?> value="<?php echo $p->id; ?>" ><?php echo $p->medium_name; ?></option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $p->id; ?>" ><?php echo $p->medium_name; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Class</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="class_id" id="create_party" onchange="subchange();">
                                                            <option>Select Class</option>
                                                            <?php
                                                            foreach ($class as $val) {
                                                                echo "<option " . ($val->id == $users[0]['class_id'] ? 'selected' : '') . " value=" . $val->id . ">" . $val->class_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Section</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="section_id" id="create_subject">
                                                            <option>Select Section</option>
                                                            <?php
                                                            foreach ($all_sub as $val) {
                                                                echo "<option " . ($val->id == $users[0]['section_id'] ? 'selected' : '') . " value=" . $val->id . ">" . $val->section_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class = "button-items">
                                                        <button type = "submit" style="margin-left: 20px;" id = "btn_save" class = "btn btn-primary waves-effect waves-light"  onclick="getSummary();"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Subject And Teacher</h4>
                                            <table class="table mb-0">
                                                <thead class="thead-default">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Class Teacher Details</h4>
                                            <table class="table mb-0">
                                                <?php
                                                if (!empty($teacher)) {
                                                    foreach ($teacher as $a) {
                                                        ?>
                                                        <tr>
                                                            <td colpan="2" style="display: inline-block; text-align: centers"><img src="<?php echo base_url("Teacher/" . $a->t_image); ?>" height="100" width="100">
                                                        </tr>
                                                        <tr>
                                                            <td><b>Techer Name: </b><?php echo $a->t_fname . " " . $a->t_lastname ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Phone: </b><?php echo $a->t_mobno ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Address: </b><?php echo $a->address ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Table head options</h4>
                                            <p class="text-muted m-b-30">Use one of two modifier classes to make
                                                <code>&lt;thead&gt;</code>s appear light or dark gray.
                                            </p>

                                            <table class="table mb-0">
                                                <thead class="thead-default">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
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
        <script type="text/javascript">
                                                            function mainchange() {

                                                                var med = document.getElementById("medium").value;
                                                                var dataString = 'medium=' + med;
                                                                $.ajax({
                                                                    url: "<?php echo base_url() . 'View_class_report/get_class' ?>",
                                                                    method: "POST",
                                                                    datatype: "html",
                                                                    data: dataString,
                                                                    cache: false,
                                                                    success: function (data)
                                                                    {
                                                                        //                                                                        alert(data);
                                                                        $("#create_party").html(data);
                                                                    },
                                                                    error: function (errorThrown) {
                                                                        alert(errorThrown);
                                                                        alert("There is an error with AJAX!");
                                                                    }
                                                                });
                                                            }
                                                            ;
                                                            function subchange() {

                                                                var med = document.getElementById("create_party").value;
                                                                //                                                                alert(med);
                                                                var dataString = 'class=' + med;
                                                                $.ajax({
                                                                    url: "<?php echo base_url() . 'View_class_report/get_sub' ?>",
                                                                    method: "POST",
                                                                    datatype: "html",
                                                                    data: dataString,
                                                                    cache: false,
                                                                    success: function (data)
                                                                    {
//                                                                        alert(data);
                                                                        $("#create_subject").html(data);
                                                                    },
                                                                    error: function (errorThrown) {
                                                                        alert(errorThrown);
                                                                        alert("There is an error with AJAX!");
                                                                    }
                                                                });
                                                            }
                                                            ;

        </script>
        <script>
            function getSummary()
            {
                var month = document.getElementById('medium').value
                var type = document.getElementById('create_party').value;
                alert(type);
                var sub = document.getElementById('create_subject').value;
                var my_object = {'medium': month, 'create_party': type, 'create_subject': sub};

                $.ajax({
                    url: '<?php echo base_url() . 'View_class_report' ?>',
                    type: 'POST',
                    datatype: 'html',
                    data: my_object,
                    success: function (Data) {
                        alert(Data);
                        //                                                                        $('#summary').html(data);
                    }

                });

            }
        </script>
    </body>

</html>