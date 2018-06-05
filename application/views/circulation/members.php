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
                    <div class="col-md-8 col-xs-8">
                        <div class="input-group" style="padding-top: 5px;">
                            <input type="text" id="searchMember" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-xs-4">
                        <button class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus" style="margin: 0 10px 0 -5px;"></i>Add Member</button>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row" id="byfours">
                    <ul class="navList" style="margin: 90px 1px 0 -39px;">

                        <?php foreach ($records as $record): ?>
                        <li class="member" style="list-style-type: none;">
                            <div class="col-md-3 col-xs-12" style="margin-bottom: 30px;">
                                <div class="card card-user">
                                    <div class="content">
                                        <div class="author">
                                             <a href="#">
                                            <img class="avatar" src="<?php echo base_url(); ?>assets/img/alt_picture.jpg" alt="..." style="border-color: #95a5a6; border-width: 2px;"/>

                                              <h4 class="title"><?php echo $record->first_name.' '.$record->last_name; ?><br />
                                                 <small>Member ID: <span class="member_id"><?php echo $record->member_id; ?></span></small>
                                              </h4>
                                              <div class="row">
                                                    <div class="col-md-8 col-xs-8">
                                                        <h4 style="margin-top: 20px; margin-left: 30px;text-align: left">Borrowed<br>Books</h4>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4">
                                                        <h1 style="margin-top: 20px; margin-left: -20px; text-align: left;">
                                                            <?php 
                                                                $member_id = $record->member_id;
                                                                $where = array('member_id' => $member_id);
                                                                $bookCount = $this->global_model->count('borrowed_books', $where);

                                                                echo $bookCount;
                                                            ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <form method="post" action="<?php echo site_url('circulation/borrowed_books'); ?>" style="display: inline;">
                                            <input type="hidden" name="borrow_id" value="<?php echo $record->member_id; ?>">
                                            <button type="submit" class="btn btn-simple text-success"><i class="fa fa-book"></i></button>
                                        </form>
                                        <button id="view-btn" data-toggle="modal" data-target="#modal-view" class="view-btn btn btn-simple text-primary"><i class="fa fa-user"></i></button>
                                        <button class="btn btn-simple text-danger view-btn" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-times"></i></button>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div style="position: absolute; bottom: 50px; left: 490px;">
                    <center><?php echo $links; ?></center>
                    </div>
                </div>

                <div class="row" id="searchDiv" style="display: none;">
                    <ul class="searchList" style="margin: 90px 1px 0 -39px;">

                        <?php foreach ($recordSearch as $record): ?>
                        <li class="member" style="list-style-type: none;">
                            <div class="col-md-3 col-xs-12" style="margin-bottom: 30px;">
                                <div class="card card-user">
                                    <div class="content">
                                        <div class="author">
                                             <a href="#">
                                            <img class="avatar" src="<?php echo base_url(); ?>assets/img/alt_picture.jpg" alt="..." style="border-color: #95a5a6; border-width: 2px;"/>

                                              <h4 class="title"><?php echo $record->first_name.' '.$record->last_name; ?><br />
                                                 <small>Member ID: <span class="member_id"><?php echo $record->member_id; ?></span></small>
                                              </h4>
                                              <div class="row">
                                                    <div class="col-md-8 col-xs-8">
                                                        <h4 style="margin-top: 20px; margin-left: 30px;text-align: left">Borrowed<br>Books</h4>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4">
                                                        <h1 style="margin-top: 20px; margin-left: -20px; text-align: left;">
                                                            <?php 
                                                                $member_id = $record->member_id;
                                                                $where = array('member_id' => $member_id);
                                                                $bookCount = $this->global_model->count('borrowed_books', $where);

                                                                echo $bookCount;
                                                            ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <form method="post" action="<?php echo site_url('circulation/borrowed_books'); ?>" style="display: inline;">
                                            <input type="hidden" name="borrow_id" value="<?php echo $record->member_id; ?>">
                                            <button type="submit" class="btn btn-simple text-success"><i class="fa fa-book"></i></button>
                                        </form>
                                        <button id="view-btn" data-toggle="modal" data-target="#modal-view" class="view-btn btn btn-simple text-primary"><i class="fa fa-user"></i></button>
                                        <button class="btn btn-simple text-danger view-btn" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-times"></i></button>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>


        <?=$footer?>

    </div>
</div>


</body>

<!-- Modal -->
<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form method="post" action="<?php echo site_url('circulation/addMember');?>">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">Add Member</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">First Name</label>
                            <input id="fname-input" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">Last Name</label>
                            <input id="lname-input" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- /.row --> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group is-empty">
                            <label class="control-label">Age</label>
                            <input id="age-input" type="text" class="form-control" name="age" value="<?php echo set_value('age'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Contact No.</label>
                            <input id="contact-input" type="text" class="form-control" name="contact_no" value="<?php echo set_value('contact_no'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group is-empty">
                            <label class="control-label">Email Address</label>
                            <input id="email-input" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">House No.</label>
                            <input id="houseno-input" type="text" name="house_no" value="<?php echo set_value('house_no'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">Street</label>
                            <input id="street-input" type="text" name="street" value="<?php echo set_value('street'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Barangay</label>
                            <input id="barangay-input" type="text" name="barangay" value="<?php echo set_value('barangay'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">City</label>
                            <input id="city-input" type="text" name="city" value="<?php echo set_value('city'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Province</label>
                            <input id="province-input" type="text" name="province" value="<?php echo set_value('province'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button type="submit" id="add-btn" class="btn btn-fill btn-primary">Add</button>
                <button data-dismiss="modal" class="btn btn-fill btn-danger pull-left">Cancel</button>
            </div>
            <!-- /.modal-footer -->
        </form>
    </div/>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal-->

<!-- Modal -->
<div id="modal-view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><span id="view-edit-title">View</span> Member Info</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">First Name</label>
                            <input id="view-firstname" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">Last Name</label>
                            <input id="view-lastname" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- /.row --> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group is-empty">
                            <label class="control-label">Age</label>
                            <input id="view-age" type="text" class="form-control" name="age" value="<?php echo set_value('age'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Contact No.</label>
                            <input id="view-contact" type="text" class="form-control" name="contact_no" value="<?php echo set_value('contact_no'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group is-empty">
                            <label class="control-label">Email Address</label>
                            <input id="view-email" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">House No.</label>
                            <input id="view-houseno" type="text" name="house_no" value="<?php echo set_value('house_no'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group is-empty">
                            <label class="control-label">Street</label>
                            <input id="view-street" type="text" name="street" value="<?php echo set_value('street'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Barangay</label>
                            <input id="view-barangay" type="text" name="barangay" value="<?php echo set_value('barangay'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">City</label>
                            <input id="view-city" type="text" name="city" value="<?php echo set_value('city'); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Province</label>
                            <input id="view-province" type="text" name="province" value="<?php echo set_value('province'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button id="view-edit" class="btn btn-fill btn-primary">Edit</button>
                <button type="submit" id="update-btn" class="btn btn-fill btn-success" style="display: none;">Update</button>
                <button data-dismiss="modal" id="cancel-btn" class="btn btn-fill btn-danger pull-left" style="display: none;">Cancel</button>
            </div>
            <!-- /.modal-footer -->
    </div/>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal-->


<div class="modal fade in" id="modal-delete">
    <div class="modal-dialog" style="width: 320px">
        <div class="modal-content">
            <div class="modal-header bg-danger text-danger">
                <button type="button" class="close btn btn-box-tool" data-dismiss="modal"><i class="fa fa-times text-danger"></i></button>
                <i class="fa fa-warning"><h4 class="modal-title" style="display: inline; margin: 10px 10px; ">Warning!</h4></i>
                
            </div>
            <div class="modal-body">
                <h4 style="margin-top: 2px;">Are you sure you want to remove this member?</h4>
            </div>
            <div class="modal-footer bg-danger">
                <button id="delete-confirm" style="width: 75px" class="btn btn-block btn-simple btn-fill btn-danger btn-sm pull-right">Confirm</button>
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

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <!-- Page Script -->
    <script src="<?php echo base_url(); ?>assets/js/circulation/members.js"></script>
    <script>
        var getRowUrl = '<?php echo base_url('circulation/ajaxGetRow'); ?>';
        var updateUrl = '<?php echo base_url('circulation/ajaxUpdate'); ?>';
        var deleteRowUrl = '<?php echo base_url('circulation/ajaxDeleteRow'); ?>';


    </script>
</html>
