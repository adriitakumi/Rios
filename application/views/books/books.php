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
</head>


<body>

<div class="wrapper">
    <?=$sidebar?>

    <div class="main-panel">
		<?=$topnav?>

        <div class="content">
            <div class="container-fluid panel-primary">
                <div class="panel-heading">
                    <h3>Books</h3>
                    <p>List of book information</p>
                    <p id="add-link" class="category pull-right" style="margin-top: -60px;"><i class="pe-7s-plus" data-toggle="modal" data-target="#modal-add" style="font-size: 40px; cursor: pointer;"></i></p>
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
                            <tr>
                                <td>1</td>
                                <td>Dakota Rice</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Minerva Hooper</td>
                                <td>$23,789</td>
                                <td>Curaçao</td>
                                <td>Sinaai-Waas</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sage Rodriguez</td>
                                <td>$56,142</td>
                                <td>Netherlands</td>
                                <td>Baileux</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Philip Chaney</td>
                                <td>$38,735</td>
                                <td>Korea, South</td>
                                <td>Overland Park</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Doris Greene</td>
                                <td>$63,542</td>
                                <td>Malawi</td>
                                <td>Feldkirchen in Kärnten</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Mason Porter</td>
                                <td>$78,615</td>
                                <td>Chile</td>
                                <td>Gloucester</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
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
                            <input id="pay-invoice" type="text" name="title" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group is-empty">
                                    <label class="control-label">Author</label>
                                    <input type="text" class="form-control" name="author" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group is-empty">
                                    <label class="control-label">No. of Copies</label>
                                    <input type="text" class="form-control" name="copies" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group is-empty">
                                    <label class="control-label">Library Section</label>
                                    <select class="form-control" name="library_section" style="width: 100%;">
                                        <option value="" selected disabled>Please select</option>
                                        <option value="General Reference">General Reference</option>
                                        <option value="Children's Section">Children's Section</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Periodical Section">Periodical Section</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Genre</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Romance
                                            <input type="checkbox" name="genre[]" value="Romance">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Mystery
                                            <input type="checkbox" name="genre[]" value="Mystery">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Sci-fi
                                            <input type="checkbox" name="genre[]" value="Sci-fi">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Horror
                                            <input type="checkbox" name="genre[]" value="horror">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Encyclopedia
                                            <input type="checkbox" name="genre[]" value="Encyclopedia">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Directories
                                            <input type="checkbox" name="genre[]" value="Directories">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Adventure
                                            <input type="checkbox" name="genre[]" value="Adventure">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Almanacs
                                            <input type="checkbox" name="genre[]" value="Almanacs">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Maps
                                            <input type="checkbox" name="genre[]" value="Maps">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Pictures
                                            <input type="checkbox" name="genre[]" value="Pictures">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Folklore
                                            <input type="checkbox" name="genre[]" value="Folklore">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Short Stories
                                            <input type="checkbox" name="genre[]" value="Short Stories">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Magazines
                                            <input type="checkbox" name="genre[]" value="Magazines">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Newspapers
                                            <input type="checkbox" name="genre[]" value="Newspapers">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Journals
                                            <input type="checkbox" name="genre[]" value="Journals">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Spirituality
                                            <input type="checkbox" name="genre[]" value="Spirituality">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Art
                                            <input type="checkbox" name="genre[]" value="Art">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Cooking
                                            <input type="checkbox" name="genre[]" value="Cooking">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Comics
                                            <input type="checkbox" name="genre[]" value="Comics">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">History
                                            <input type="checkbox" name="genre[]" value="History">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

  </div>
</div>


    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

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
    <script type="text/javascript">

        $(document).ready(function() {
            $('#booksTable').DataTable();
        } );

    </script>


</html>
