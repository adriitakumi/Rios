<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/img/dark.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $title; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  DataTables   -->
    <link href="https://nightly.datatables.net/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <?=$sidebar?>

    <div class="main-panel">
        
        <?=$topnav?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card" style="background-color: #3498db; color: white;">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <i class="fa fa-book" style="font-size: 70px; margin: 10px; opacity: 0.2;"></i>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="content text-right">
                                        <h2 style="margin-top: 0px; margin-bottom: 0px;"><b><?php echo $book_num; ?></b></h2>
                                        <h4 style="margin: 10px 0 -10px 0;">No.of Books</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: white;">
                                        <i class="fa fa-clock-o"></i> Updated as of <?php echo $date_today; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-3 -->
                    
                    <div class="col-md-3">
                        <div class="card" style="background-color: #2ecc71; color: white;">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <i class="fa fa-sign-in" style="font-size: 70px; margin: 10px; opacity: 0.2;"></i>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="content text-right">
                                        <h2 style="margin-top: 0px; margin-bottom: 0px;"><b><?php echo $out_num; ?></b></h2>
                                        <h4 style="margin: 10px 0 -10px 0;">Out Books</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: white;"">
                                        <i class="fa fa-clock-o"></i> Updated as of <?php echo $date_today; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-3 -->
                    
                    <div class="col-md-3">
                        <div class="card" style="background-color: #f39c12; color: white;">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <i class="fa fa-users" style="font-size: 70px; margin: 10px; opacity: 0.2;"></i>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="content text-right">
                                        <h2 style="margin-top: 0px; margin-bottom: 0px;"><b><?php echo $member_num; ?></b></h2>
                                        <h4 style="margin: 10px 0 -10px 0;">No.of Users</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: white;"">
                                        <i class="fa fa-clock-o"></i> Updated as of <?php echo $date_today; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-3 -->
                    
                    <div class="col-md-3">
                        <div class="card" style="background-color: #e74c3c; color: white;">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <i class="fa fa-calendar" style="font-size: 70px; margin: 10px; opacity: 0.2;"></i>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="content text-right">
                                        <h2 style="margin-top: 0px; margin-bottom: 0px;"><b><?php echo $due_today_num; ?></b></h2>
                                        <h4 style="margin: 10px 0 -10px 0;">Due Today</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: white;"">
                                        <i class="fa fa-clock-o"></i> Updated as of <?php echo $date_today; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-3 -->
                    
                </div>
                <!-- /.row -->

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header border-primary">
                                <h4 class="title">Books that are due this week</h4>
                                <p class="category"><?php echo $date_today.' - '.$date_nextweek; ?> </p>
                            </div>
                            <div class="container-fluid" style="margin-top: 10px;">
                                <table class="table table-bordered table-hover" id="dueThisWeekTable">
                                    <thead>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Borrowed By</th>
                                        <th>Date Borrowed</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <?=$footer?>

    </div>
</div>


</body>

<div class="modal fade in" id="modal-return">
    <div class="modal-dialog" style="width: 320px">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close btn btn-box-tool" data-dismiss="modal"><i class="fa fa-times text-danger"></i></button>
                <h4 class="modal-title" style="display: inline; ">Return Book</h4></i>
                
            </div>
            <div class="modal-body">
                <h4 style="margin-top: 2px;">Is the book returned?</h4>
            </div>
            <div class="modal-footer bg-info">
                <button id="return-confirm" data-dismiss="modal" type="button" style="width: 75px" class="btn btn-block btn-fill return-btn btn-success btn-sm pull-right">Yes</button>
                <button data-dismiss="modal" style="width: 75px" class="btn btn-block btn-danger btn-fill btn-sm pull-left">No</button>
            </div>
            <!-- /.modal-footer -->
        </div>
    </div>
</div>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>dist/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <!-- Page Script -->
    <script src="<?php echo base_url(); ?>assets/js/dashboard/dashboard.js"></script>
    <script>
        var getRecordsUrl = '<?php echo base_url("dashboard/populateTable"); ?>';
        var returnBookUrl = '<?php echo base_url("dashboard/returnBook"); ?>';
    </script>    

</html>
