<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Notice</title>
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
                                    <h4 class="page-title">Create Notice</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">                   
                                            <form action="<?php echo isset($users) ? site_url('Add_notice/edit_notice/' . $users[0]['id']) : site_url('Add_notice/insert_notice'); ?>" id="form_data" name="party" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >  
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                                    <div class="col-sm-9" style="margin-left: -95px;">
                                                        <input class="form-control" type="text"  placeholder="Title" id="title" name="title" value="<?php echo isset($users) ? set_value("title", $users[0]['title']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                                    <div class="col-sm-9"style="margin-left: -95px;">
                                                        <input class="form-control" type="text"  placeholder="Date" id="date" name="date" value="<?php echo isset($users) ? set_value("date", $users[0]['date']) : set_value(""); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Notice</label>
                                                    <div class="col-sm-10" style="margin-left: -95px;">
                                                        <textarea id="elm1" name="notice"><?php echo (isset($users) ? $users[0]['notice'] : ''); ?></textarea>
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

                                            <h4 class="mt-0 header-title">View of Notice</h4><br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Date</th>
                                                        <th>Notice</th>
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
                                                                <td><?php echo $e['title'] ?></td>
                                                                <td><?php echo $e['date'] ?></td>
                                                                <td><?php echo $e['notice'] ?></td>
                                                                <td><a href="<?php echo base_url() . 'Add_notice/getdata_notice/' . $e['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                                    <a href="<?php echo base_url() . 'Add_notice/delete_notice/' . $e['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
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
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url() . 'plugins/sweet-alert2/sweetalert2.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/pages/sweet-alert.init.js' ?>"></script>
        <!-- Plugins Init js -->
        <script src="<?php echo base_url() . 'assets/pages/form-advanced.js' ?>"></script>
        <!-- App js -->
        <script src="<?php echo base_url() . 'assets/js/app.js' ?>"></script>
        <script src="<?php echo base_url() . 'plugins/tinymce/tinymce.min.js' ?>"></script>

        <script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    if ($("#elm1").length > 0) {
                                                                        tinymce.init({
                                                                            selector: "textarea#elm1",
                                                                            theme: "modern",
                                                                            height: 300,
                                                                            plugins: [
                                                                                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                                                                                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                                                                "save table contextmenu directionality emoticons template paste textcolor"
                                                                            ],
                                                                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                                                                            style_formats: [
                                                                                {title: 'Bold text', inline: 'b'},
                                                                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                                                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                                                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                                                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                                                                {title: 'Table styles'},
                                                                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                                                                            ]
                                                                        });
                                                                    }
                                                                });
        </script>
    </body>

</html>