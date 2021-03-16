<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Exam Attendance</title>
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
                                    <h4 class="page-title">Exam Attendance</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo base_url('Teacher/Exam_attendance/check_attandance') ?>" id="form_data" class="form-horizontal" role="form" method="get" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Exam</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="exam_id" id="exam_id">
                                                            <option>Select Exam</option>
                                                            <?php
                                                            foreach ($exam as $e) {
                                                                if (isset($exam)) {
                                                                    ?>
                                                                    <option <?php echo ($e->id == $exam_id ? 'selected' : '') ?> value="<?php echo $e->id; ?>" ><?php echo $e->exam_name; ?></option>
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
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Medium</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="medium" id="medium" onchange="mainchange();">
                                                            <option>Select Medium</option>
                                                            <?php
                                                            foreach ($medium as $p) {
                                                                if (isset($medium_id)) {
                                                                    ?>
                                                                    <option <?php echo ($p->id == $medium_id ? 'selected' : '') ?> value="<?php echo $p->id; ?>" ><?php echo $p->medium_name; ?></option>
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
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Class</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="class_id" id="create_party" onchange="subchange(); subjectchange();">
                                                            <option>Select Class</option>
                                                            <?php
                                                            foreach ($class as $val) {
                                                                echo "<option " . ($val->id == $class_id ? 'selected' : '') . " value=" . $val->id . ">" . $val->class_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Section</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="section_id" id="create_subject">
                                                            <option>Select Section</option>
                                                            <?php
                                                            foreach ($all_sub as $val) {
                                                                echo "<option " . ($val->id == $section_id ? 'selected' : '') . " value=" . $val->id . ">" . $val->section_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Subject</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -20px;">
                                                        <select class="form-control select2" name="subject_id" id="create_sub">
                                                            <option>Select Subject</option>
                                                            <?php
                                                            foreach ($subject as $subj) {
                                                                echo "<option " . ($subj->id == $subject_id ? 'selected' : '') . " value=" . $subj->id . ">" . $subj->subject_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Date</label>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="date"  placeholder="date" id="date1" name="date" value="<?php echo isset($all) ? set_value("date", $date) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class = "button-items">
                                                        <button type = "submit" style="margin-left: 20px;" id = "btn_save" class = "btn btn-primary waves-effect waves-light"  onclick="getSummary();"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <!--end row-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <form action="<?php echo site_url('Teacher/Exam_attendance/insert_exam_attendance'); ?>" id="form_data" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  

                                                <h4 class="mt-0 header-title">Exam Attendance</h4><br>
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Full Name</th>
                                                            <th>Photo</th>
                                                            <th>Attendance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (isset($all)) {
                                                            $i = 1;
                                                            $k = 0;
                                                            foreach ($all as $student) {
                                                                ?>
                                                                <tr>
                                                                    <td style="width: 10px;"><input type="text" name="no" value="<?php echo $i ?>" style="border: none; width: 10px;"></td>
                                                            <input type="hidden" name="s_id[]" value="<?php echo $student['id'] ?>">
                                                            <input type="hidden" name="date[]" value="<?php echo $date ?>">
                                                            <input type="hidden" name="medium_id[]" value="<?php echo $medium_id ?>">
                                                            <input type="hidden" name="class_id[]" value="<?php echo $class_id ?>">
                                                            <input type="hidden" name="section_id[]" value="<?php echo $section_id ?>">
                                                            <input type="hidden" name="exam_id[]" value="<?php echo $exam_id ?>">
                                                            <input type="hidden" name="subject_id[]" value="<?php echo $subject_id ?>">
                                                            <td style="width: 300px;"><input type="text" name="s_name" value="<?php echo $student['s_surname'] . " " . $student['s_name'] . " " . $student['s_fathername'] ?>" style="border: none;"></td>
                                                            <td><img src='<?php echo base_url('Student/' . $student['s_image']); ?>' id='image-link' alt='image' name="image" class='img-responsive' height=50 width=50 ></td>
                                                            <td><?php
                                                                if (isset($check_attandance)) {
//                                                                        print_r($check_attandance[$k]['s_id']);
                                                                    if (!empty($check_attandance)) {
                                                                        ?>
                                                                        <input type="radio" id="present" name="stu_attendance<?php echo $i ?>[]" value="P" <?php
                                                                        echo (($check_attandance[$k]['stu_attendance'] == 'P') && ($check_attandance[$k]['s_id'] == $student['id']) ? 'checked' : '')
                                                                        ?>>
                                                                        <label for="present">Present</label>
                                                                        <input type="radio" id="absent" name="stu_attendance<?php echo $i ?>[]" value="A"  <?php
                                                                        echo (($check_attandance[$k]['stu_attendance'] == 'A') && ($check_attandance[$k]['s_id'] == $student['id']) ? 'checked' : '')
                                                                        ?>>
                                                                        <label for="absent">Absent</label>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <input type="radio" id="present" name="stu_attendance<?php echo $i ?>[]" value="P">
                                                                        <label for="present">Present</label>
                                                                        <input type="radio" id="absent" name="stu_attendance<?php echo $i ?>[]" value="A">
                                                                        <label for="absent">Absent</label>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <input type="radio" id="present" name="stu_attendance<?php echo $i ?>[]" value="P">
                                                                    <label for="present">Present</label>
                                                                    <input type="radio" id="absent" name="stu_attendance<?php echo $i ?>[]" value="A">
                                                                    <label for="absent">Absent</label>
                                                                    <?php
                                                                }
                                                                ?></td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                            $k++;
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <div class="form-group row">
                                                    <div class = "button-items">
                                                        <button type = "submit" style="margin-left: 20px;" id = "btn_save" class = "btn btn-primary waves-effect waves-light"  onclick="getSummary();"><i class="fa fa-plus"></i> Add</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>

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
                                                                    url: "<?php echo base_url() . 'Teacher/View_class_report/get_class' ?>",
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
                                                                    url: "<?php echo base_url() . 'Teacher/View_class_report/get_sub' ?>",
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
                                                            function subjectchange() {

                                                                var med = document.getElementById("create_party").value;
                                                                var medi = document.getElementById("medium").value;
//                                                                alert(medi);
                                                                var dataString = 'class=' + med + '&medium=' + medi;
                                                                $.ajax({
                                                                    url: "<?php echo base_url() . 'Teacher/View_class_report/get_subject' ?>",
                                                                    method: "POST",
                                                                    datatype: "html",
                                                                    data: dataString,
                                                                    cache: false,
                                                                    success: function (data)
                                                                    {
//                                                                        alert(data);
                                                                        $("#create_sub").html(data);
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