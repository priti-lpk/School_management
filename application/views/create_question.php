<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Question</title>
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
                                    <h4 class="page-title">Create Question</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo isset($users) ? site_url('Add_question/edit_question/' . $users[0]['id']) : site_url('Add_question/insert_question'); ?>" id="form_data" name="party" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
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
                                                        <select class="form-control select2" name="class_id" id="create_party">
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
                                                    <label for="example-text-input" class="col-sm-2 col-form-label" style="width:300px;">Select Level</label>
                                                    <div class="col-sm-4" id="partylist5" style="margin-left: -80px;">
                                                        <select class="form-control select2" name="level_id" id="level">
                                                            <option>Select Level</option>
                                                            <?php
                                                            foreach ($level as $l) {
                                                                if (isset($users)) {
                                                                    ?>
                                                                    <option <?php echo ($l->id == $users[0]['level_id'] ? 'selected' : '') ?> value="<?php echo $l->id; ?>" ><?php echo $l->type; ?></option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $l->id; ?>" ><?php echo $l->type; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Image</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input type = "file" id = "image" name = "image" class = "form-control filestyle" data-input = "false" data-buttonname = "btn-secondary">
                                                    </div>
                                                </div>
                                                <div class = "form-group row">
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Question</label>
                                                    <div class = "col-sm-9" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Question" id = "question" name = "question" value = "<?php echo isset($users) ? set_value("question", $users[0]['question']) : set_value(""); ?>" required = "">
                                                    </div>
                                                </div>
                                                <div class = "form-group row">
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Option A</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Option A" id = "option_a" name = "option_a" value = "<?php echo isset($users) ? set_value("option_a", $users[0]['option_a']) : set_value(""); ?>" required = "">
                                                    </div>
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Option B</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Option B" id = "option_b" name = "option_b" value = "<?php echo isset($users) ? set_value("option_b", $users[0]['option_b']) : set_value(""); ?>" required = "">
                                                    </div>
                                                </div>
                                                <div class = "form-group row">
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Option C</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Option C" id = "option_c" name = "option_c" value = "<?php echo isset($users) ? set_value("option_c", $users[0]['option_c']) : set_value(""); ?>" required = "">
                                                    </div>
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Option D</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Option D" id = "option_d" name = "option_d" value = "<?php echo isset($users) ? set_value("option_d", $users[0]['option_d']) : set_value(""); ?>" required = "">
                                                    </div>
                                                </div>
                                                <div class = "form-group row">
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Answer</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <select class="form-control select2" name="answer" id="answer" required="">
                                                            <option<?php
                                                            if (isset($users)) {
                                                                echo $users[0]['answer'] == 'Option A' ? ' selected="selected"' : '';
                                                            }
                                                            ?> value = 'Option A'>Option A</option>
                                                            <option<?php
                                                            if (isset($users)) {
                                                                echo $users[0]['answer'] == 'Option B' ? ' selected="selected"' : '';
                                                            }
                                                            ?> value = 'Option B'>Option B</option>
                                                            <option<?php
                                                            if (isset($users)) {
                                                                echo $users[0]['answer'] == 'Option C' ? ' selected="selected"' : '';
                                                            }
                                                            ?> value = 'Option C'>Option C</option>
                                                            <option<?php
                                                            if (isset($users)) {
                                                                echo $users[0]['answer'] == 'Option D' ? ' selected="selected"' : '';
                                                            }
                                                            ?> value = 'Option D'>Option D</option>
                                                        </select> 
                                                    </div>
                                                    <label for = "example-text-input" class = "col-sm-2 col-form-label">Mark</label>
                                                    <div class = "col-sm-4" style = "margin-left: -80px;">
                                                        <input class = "form-control" type = "text" placeholder = "Question's Mark" id = "mark" name = "mark" value = "<?php echo isset($users) ? set_value("mark", $users[0]['mark']) : set_value(""); ?>" required = "">
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

                                            <h4 class="mt-0 header-title">View of Question</h4><br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Medium</th>
                                                        <th>Class Name</th>
                                                        <th>Level Type</th>
                                                        <th>Question</th>
                                                        <th>Option A</th>
                                                        <th>Option B</th>
                                                        <th>Option C</th>
                                                        <th>Option D</th>
                                                        <th>Answer</th>
                                                        <th>Image</th>
                                                        <th>Question's Mark</th>
                                                        <th class="noExport">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($all)) {
                                                        $i = 1;
                                                        foreach ($all as $a) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $a['id']; ?></td>
                                                                <td><?php echo $a['medium_name'] ?></td>
                                                                <td><?php echo $a['class_name'] ?></td>
                                                                <td><?php echo $a['type'] ?></td>
                                                                <td><?php echo $a['question'] ?></td>
                                                                <td><?php echo $a['option_a'] ?></td>
                                                                <td><?php echo $a['option_b'] ?></td>
                                                                <td><?php echo $a['option_c'] ?></td>
                                                                <td><?php echo $a['option_d'] ?></td>
                                                                <td><?php echo $a['answer'] ?></td>
                                                                <td><img src="<?php echo base_url("Question/" . $a['image']); ?>" height="60" width="60"></td>
                                                                <td><?php echo $a['mark'] ?></td>
                                                                <td><a href="<?php echo base_url() . 'Add_question/getdata_question/' . $a['iid'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                                    <a href="<?php echo base_url() . 'Add_question/delete_question/' . $a['iid'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
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
                                                                        url: "<?php echo base_url() . 'Add_question/get_class' ?>",
                                                                        method: "POST",
                                                                        datatype: "html",
                                                                        data: dataString,
                                                                        cache: false,
                                                                        success: function (data)
                                                                        {
//                        alert(data);
                                                                            $("#create_party").html(data);
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