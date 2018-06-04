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

    <!--  Select2   -->
    <link href="<?php echo base_url(); ?>dist/select2-4.0.6-rc.1/dist/css/select2.min.css" rel="stylesheet"/>

    <!--  Customized CSS  -->
    <link href="<?php echo base_url(); ?>assets/css/checkbox.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/customize.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/Ionicons/css/ionicons.min.css">
      
</head>


<body>

<div class="wrapper">
    <?=$sidebar?>

    <div class="main-panel">
		<?=$topnav?>

        <div class="content">
            <div class="container-fluid panel-primary">
                <div class="text-warning">
                    <?php 
                        // if($this->session->flashdata('error')){
                            echo $this->session->flashdata('error');
                        // }
                    ?>
                </div>
                <!-- /.text-warning -->
                <div class="panel-heading">
                    <h3>Books</h3>
                    <p>List of book information</p>
                    <p id="add-link" class="category pull-right" style="margin: -60px 20px 0 20px;"><i class="fa fa-plus-circle" data-toggle="modal" data-target="#modal-add" style="font-size: 40px; cursor: pointer;"></i></p>
                </div>
                <div class="container-fluid panel" style="padding: 10px;">
                    <table class="table table-bordered table-hover" id="booksTable">
                        <thead>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Library Section</th>
                            <th>No. of Copies</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
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
        <form method="post" action="<?php echo site_url('books/add');?>">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Book</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group is-empty">
                            <label class="control-label">Book Title</label>
                            <input id="title-input" type="text" name="book_title" value="<?php echo set_value('book_title'); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Author</label>
                            <input id="author-input" type="text" class="form-control" name="author" value="<?php echo set_value('author'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">No. of Copies</label>
                            <input id="copies-input" type="text" class="form-control" name="copies" value="<?php echo set_value('copies'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group is-empty">
                            <label class="control-label">Library Section</label>
                            <select class="form-control" id="section-input" name="library_section" style="width: 100%;" value="<?php echo set_select('library_section'); ?>" required>
                                <option value="" selected disabled>Please select</option>
                                <option value="General Reference" <?php echo  set_select('library_section', 'General Reference'); ?> >General Reference</option>
                                <option value="Children's Section" <?php echo  set_select('library_section', 'Children\'s section'); ?> >Children's Section</option>
                                <option value="Fiction" <?php echo  set_select('library_section', 'Fiction'); ?> >Fiction</option>
                                <option value="Periodical Section" <?php echo  set_select('library_section', 'Periodical Section'); ?> >Periodical Section</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="genreFormGroup">
                            <label class="control-label">Genre</label>
                        </div>
                        <div class="row">
                            <?php foreach ($genres as $genre): ?>
                            <div class="col-md-3">
                                <label class="containerCheckbox"><?php echo $genre->genre; ?>
                                    <input type="checkbox" name="genre[]" value="<?php echo $genre->id; ?>" <?php echo set_checkbox('genre', $genre->id); ?> >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button type="submit" id="add-btn" class="btn btn-simple btn-fill btn-primary">Add</button>
                <button data-dismiss="modal" class="btn btn-simple btn-fill btn-danger pull-left">Cancel</button>
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
<div id="modal-edit" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Book Info</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group is-empty">
                            <label class="control-label">Book Title</label>
                            <input id="book_title" type="text" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label class="control-label">Author</label>
                                    <input id="author" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label class="control-label">No. of Copies</label>
                                    <input id="copies" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label class="control-label">Library Section</label>
                                    <select class="form-control" id="library_section" style="width: 100%;" required>
                                        <option value="" selected disabled>Please select</option>
                                        <option value="General Reference">General Reference</option>
                                        <option value="Children's Section">Children's Section</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Periodical Section">Periodical Section</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group is-empty">
                                    <label class="control-label">Date Added</label>
                                    <input id="date_added" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Genre</label>
                                </div>
                                <div class="row">
                                    <?php foreach ($genres as $genre): ?>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox"><?php echo $genre->genre; ?>
                                            <input type="checkbox" name="genre[]" class="edit" value="<?php echo $genre->id; ?>">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button id="update-btn" class="btn btn-simple btn-fill btn-primary">Update</button>
                <button data-dismiss="modal" class="btn btn-simple btn-fill btn-danger pull-left">Cancel</button>
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
                <h4 style="margin-top: 2px;">Are you sure you want to delete this book?</h4>
            </div>
            <div class="modal-footer bg-danger">
                <button id="delete-confirm" data-dismiss="modal" type="button" style="width: 75px" class="btn btn-block btn-simple btn-fill btn-danger btn-sm pull-right">Confirm</button>
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

    <!-- Select2  -->
    <script src="<?php echo base_url(); ?>dist/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>    

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <!-- Page Script -->
    <script src="<?php echo base_url(); ?>assets/js/books/books.js"></script>
    <script>
        var getRecordsUrl = '<?php echo base_url("books/populateTable"); ?>';
        var getRowUrl = '<?php echo base_url('books/ajaxGetRow'); ?>';
        var updateUrl = '<?php echo base_url('books/ajaxUpdate'); ?>';
        var deleteRowUrl = '<?php echo base_url('books/ajaxDeleteRow'); ?>';


    </script>

</html>
