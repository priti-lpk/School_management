<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>View Attendance Sheet</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.ico' ?>">
        <link href="<?php echo base_url() . 'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'plugins/select2/css/select2.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css' ?>" rel="stylesheet" />

        <!-- DataTables -->
        <link href="<?php echo base_url() . 'plugins/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'plugins/datatables/buttons.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url() . 'plugins/datatables/responsive.bootstrap4.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/metismenu.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/icons.css' ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet" type="text/css">
        <style>
            table.dataTable.nowrap th, table.dataTable.nowrap td {
                white-space: normal !important;
            }
            #datatable-buttons th,#datatable-buttons td{
                white-space: normal !important;
                padding-right: 1px !important;
                padding-left: : 1px !important;
            }
            #CalendarControlIFrame {
                display: none;  left: 0px;  position: absolute;  top: 0px;  height: 250px;  width: 250px;  z-index: 99;
            }
            #CalendarControl {
                position:absolute;  background-color:#d1e3f9;  margin:0;  padding:0;  display:none;  z-index: 100;
            }
            #CalendarControl table {
                font-family: arial, verdana, helvetica, sans-serif;  font-size: 8pt;
            }
            #CalendarControl th {
                font-weight: normal;
            }
            #CalendarControl th a {
                font-weight: normal;  text-decoration: none;  color: #000;  padding: 1px;
            }
            #CalendarControl td {
                text-align: center;
            }
            #CalendarControl .cal_header {
                background-color: #eceeed;  color:#000;  height:30px;
            }
            #CalendarControl .weekday {
                background-color: #d1e3f9;  color: #000;
            }
            #CalendarControl .weekend {
                background-color: #f5f5e0;  color: #000;
            }
            #CalendarControl .current {
                background-color: #696969;  color: #FFF;
            }
            #CalendarControl .weekday,#CalendarControl .weekend,#CalendarControl .current {
                display: block;  text-decoration: none;  line-height:25px;    padding:8px;
            }
            #CalendarControl .cl_header {
                text-align:  center; background: #eceeed; line-height:25px;
            }
            #CalendarControl .weekday:hover,#CalendarControl .weekend:hover,#CalendarControl .current:hover {
                color: #FFF;  background-color: #696969;
            }
            #CalendarControl .previous,#CalendarControl .next {
                padding: 1px 3px 1px 3px;  font-size: 1.4em;
            }
            #CalendarControl .previous a,#CalendarControl .next a {
                color:#000;  text-decoration: none;  font-weight: bold;  font-size:14px;
            }
            #CalendarControl .title {
                text-align: center;  font-weight: bold;  color: #000;  font-size:14px;
            }
            #CalendarControl .empty {
                background-color: #d1e3f9;
            }
            .CalenderButton{
                margin-top:0px;
            }
            #dpMonthYear {
                width: calc(100% - 30px);
            }
        </style>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php $this->load->view('topbar'); ?>
            <!-- Top Bar End -->
            <?php include 'sidebar.php'; ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">View Of Attendance Sheet</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="page-content-wrapper">
                            <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">View Of Attendance Sheet</h4>
                                            <div>
                                                <table id="datatable-buttons" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100% !important;">
                                                    <thead>
                                                        <tr>
                                                            <th style="font-size:10px !important;">ID</th>
                                                            <th style="font-size:10px !important;">Month</th>
                                                            <?php
                                                            for ($i = 1; $i <= 31; $i++) {
                                                                echo '<th style="font-size:10px !important;width:5px !important;">' . $i . '</th>';
                                                            }
                                                            ?>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $months = array("Jan", "Feb", "Mar", "Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                                        foreach ($months as $month) {
                                                            echo "</tr>";
                                                            echo "<td>".$month."</td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                        <!-- end page content-->
                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                <?php $this->load->view('footer'); ?>
            </div>
            <div class="col-sm-6 col-md-3 m-t-30">
                <div class="modal fade" id="addinstruction" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">View Instruction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <p><i class="fa fa-hand-point-right"></i> First of  month select  then search the attendance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
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
        <!-- Required datatable js -->
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

        <!-- Datatable init js -->
        <script src="<?php echo base_url() . 'assets/pages/datatables.init.js' ?>"></script>

        <script src="<?php echo base_url() . 'assets/pages/form-advanced.js' ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url() . 'assets/js/app.js' ?>"></script>
    </body>
</html>


