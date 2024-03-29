<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Exam Schedule</title>
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
                                    <h4 class="page-title">Exam Schedule</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo isset($users) ? site_url('Add_exam_schedule/edit_exam_schedule/' . $users[0]['id']) : site_url('Add_exam_schedule/insert_exam_schedule'); ?>" id="form_data" name="party" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Medium</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -80px;">
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
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select class</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -80px;">
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
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Subject</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -80px;">
                                                        <select class="form-control select2" name="subject_id" id="create_subject">
                                                            <option>Select Subject</option>
                                                            <?php
                                                            foreach ($all_sub as $val) {
                                                                echo "<option " . ($val->id == $users[0]['subject_id'] ? 'selected' : '') . " value=" . $val->id . ">" . $val->subject_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Exam</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -80px;">
                                                        <select class="form-control select2" name="exam_id" id="exam">
                                                            <option>Select Exam</option>
                                                            <?php
                                                            foreach ($exam as $e) {
                                                                if (isset($users)) {
                                                                    ?>
                                                                    <option <?php echo ($e->id == $users[0]['exam_id'] ? 'selected' : '') ?> value="<?php echo $e->id; ?>" ><?php echo $e->exam_name; ?></option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $e->id; ?>" ><?php echo $e->exam_name; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-4" style="margin-left: -80px;">
                                                        <input class="form-control" type="date"  placeholder="Date" id="date1" name="date" value="<?php echo isset($users) ? set_value("date", $users[0]['date']) : set_value(""); ?>" required="">
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Start Time</label>
                                                    <div class="col-sm-4" style="margin-left: -80px;">
                                                        <input class="form-control" type="time"  placeholder="start Time" id="start_time" name="start_time" value="<?php echo isset($users) ? set_value("start_time", $users[0]['start_time']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">End Time</label>
                                                    <div class="col-sm-4" style="margin-left: -80px;">
                                                        <input class="form-control" type="time"  placeholder="End Time" id="end_time" name="end_time" value="<?php echo isset($users) ? set_value("end_time", $users[0]['end_time']) : set_value(""); ?>" required="">
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

                                            <h4 class="mt-0 header-title">View of Exam Schedule</h4><br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Medium</th>
                                                        <th>Class Name</th>
                                                        <th>Subject Name</th>
                                                        <th>Exam Name</th>
                                                        <th>Date</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
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
                                                                <td><?php echo $e['medium_name'] ?></td>
                                                                <td><?php echo $e['class_name'] ?></td>
                                                                <td><?php echo $e['subject_name'] ?></td>
                                                                <td><?php echo $e['exam_name'] ?></td>
                                                                <td><?php echo $e['date'] ?></td>
                                                                <td><?php echo $e['start_time'] ?></td>
                                                                <td><?php echo $e['end_time'] ?></td>
                                                                <td><a href="<?php echo base_url() . 'Add_exam_schedule/getdata_exam_schedule/' . $e['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                                    <a href="<?php echo base_url() . 'Add_exam_schedule/delete_exam_schedule/' . $e['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
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
        <script type="text/javascript">
                                                                function mainchange() {

                                                                    var med = document.getElementById("medium").value;
                                                                    var dataString = 'medium=' + med;
                                                                    $.ajax({
                                                                        url: "<?php echo base_url() . 'Add_exam_schedule/get_class' ?>",
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
                                                                        url: "<?php echo base_url() . 'Add_assignment/get_sub' ?>",
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
    </body>

</html>