<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

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


                <div class="row">
                    <ul class="navList" style="margin: 90px 1px 0 -39px;">

                        <?php foreach ($records as $record): ?>
                        <li class="member" style="list-style-type: none;">
                            <div class="col-md-3 col-xs-12" style="margin-bottom: 30px;">
                                <div class="card card-user">
                                    <div class="content">
                                        <div class="author">
                                             <a href="#">
                                            <img class="avatar border-gray" src="<?php echo base_url(); ?>assets/img/faces/face-3.jpg" alt="..."/>

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
                                        <button href="#" class="btn btn-simple text-danger"><i class="fa fa-times"></i></button>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <center><?php echo $links; ?></center>

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
        <form method="post" action="<?php echo site_url('circulation/add');?>">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Email Address</label>
                            <input id="email-input" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Address</label>
                        <textarea class="form-control" name="address" id="address-input" value="<?php echo set_value('address'); ?>" required></textarea>
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
<div id="modal-vsiew" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form method="post" action="<?php echo site_url('circulation/add');?>">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">View Member Info</h4>
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Email Address</label>
                            <input id="email-input" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Address</label>
                        <textarea class="form-control" name="address" id="address-input" value="<?php echo set_value('address'); ?>" required></textarea>
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




    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <!-- Page Script -->
    <script>

        var member_id;

        // $("#view-btn").on("click", function(){
        $(".member").on("click", ".view-btn", function(){

        //hide();
        
        member_id = $(this).parents("small").find("span").text();
        alert(member_id);
        });

        $('#searchMember').keyup(function(){
            var valThis = $(this).val().toLowerCase();
            if(valThis == ""){
                $('.navList > li').show();
            } else {
                $('.navList > li').each(function(){
                    var text = $(this).text().toLowerCase();
                    (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
                });
            };
        });
    </script>

</html>
