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
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Romance
                                            <input type="checkbox" name="genre[]" value="Romance" <?php echo set_checkbox('genre', 'Romance'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Mystery
                                            <input type="checkbox" name="genre[]" value="Mystery" <?php echo set_checkbox('genre', 'Mystery'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Sci-fi
                                            <input type="checkbox" name="genre[]" value="Sci-fi" <?php echo set_checkbox('genre', 'Sci-fi'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Horror
                                            <input type="checkbox" name="genre[]" value="Horror" <?php echo set_checkbox('genre', 'Horror'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Encyclopedia
                                            <input type="checkbox" name="genre[]" value="Encyclopedia" <?php echo set_checkbox('genre', 'Encyclopedia'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Directories
                                            <input type="checkbox" name="genre[]" value="Directories" <?php echo set_checkbox('genre', 'Directories'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Adventure
                                            <input type="checkbox" name="genre[]" value="Adventure" <?php echo set_checkbox('genre', 'Adventure'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Almanacs
                                            <input type="checkbox" name="genre[]" value="Almanacs" <?php echo set_checkbox('genre', 'Almanacs'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Maps
                                            <input type="checkbox" name="genre[]" value="Maps" <?php echo set_checkbox('genre', 'Maps'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Pictures
                                            <input type="checkbox" name="genre[]" value="Pictures" <?php echo set_checkbox('genre', 'Pictures'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Folklore
                                            <input type="checkbox" name="genre[]" value="Folklore" <?php echo set_checkbox('genre', 'Folklore'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Short Stories
                                            <input type="checkbox" name="genre[]" value="Short Stories" <?php echo set_checkbox('genre', 'Short Stories'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Magazines
                                            <input type="checkbox" name="genre[]" value="Magazines" <?php echo set_checkbox('genre', 'Magazines'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Newspapers
                                            <input type="checkbox" name="genre[]" value="Newspapers" <?php echo set_checkbox('genre', 'Newspapers'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Journals
                                            <input type="checkbox" name="genre[]" value="Journals" <?php echo set_checkbox('genre', 'Journals'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Spirituality
                                            <input type="checkbox" name="genre[]" value="Spirituality" <?php echo set_checkbox('genre', 'Spirituality'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Art
                                            <input type="checkbox" name="genre[]" value="Art" <?php echo set_checkbox('genre', 'Art'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Cooking
                                            <input type="checkbox" name="genre[]" value="Cooking" <?php echo set_checkbox('genre', 'Cooking'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Comics
                                            <input type="checkbox" name="genre[]" value="Comics" <?php echo set_checkbox('genre', 'Comics'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">History
                                            <input type="checkbox" name="genre[]" value="History" <?php echo set_checkbox('genre', 'History'); ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
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
                <button type="submit" id="add-btn" class="btn btn-primary">Add</button>
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
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Romance
                                            <input type="checkbox" class="edit" value="Romance">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Mystery
                                            <input type="checkbox" class="edit" value="Mystery">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Sci-fi
                                            <input type="checkbox" class="edit" value="Sci-fi">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Horror
                                            <input type="checkbox" class="edit" value="Horror">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Encyclopedia
                                            <input type="checkbox" class="edit" value="Encyclopedia">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Directories
                                            <input type="checkbox" class="edit" value="Directories">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Adventure
                                            <input type="checkbox" class="edit" value="Adventure">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Almanacs
                                            <input type="checkbox" class="edit" value="Almanacs">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Maps
                                            <input type="checkbox" class="edit" value="Maps">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Pictures
                                            <input type="checkbox" class="edit" value="Pictures">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Folklore
                                            <input type="checkbox" class="edit" value="Folklore">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Short Stories
                                            <input type="checkbox" class="edit" value="Short Stories">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Magazines
                                            <input type="checkbox" class="edit" value="Magazines">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Newspapers
                                            <input type="checkbox" class="edit" value="Newspapers">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Journals
                                            <input type="checkbox" class="edit" value="Journals">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Spirituality
                                            <input type="checkbox" class="edit" value="Spirituality">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Art
                                            <input type="checkbox" class="edit" value="Art">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Cooking
                                            <input type="checkbox" class="edit" value="Cooking">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">Comics
                                            <input type="checkbox" class="edit" value="Comics">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="containerCheckbox">History
                                            <input type="checkbox" class="edit" value="History">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
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
                <button id="update-btn" class="btn btn-primary">UPDATE</button>
                <button data-dismiss="modal" class="btn btn-danger pull-left">CANCEL</button>
            </div>
            <!-- /.modal-footer -->
    </div/>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal-->

<div class="modal fade in" id="modal-delete">
    <div class="modal-dialog" style="max-width: 320px">
        <div id="box-delete" class="box box-danger">
            <div class="box-header with-border" style="cursor: move; margin: 0px;">
                <i id="box-delete-icon" class="fa fa-warning text-danger"></i>

                <h3 class="box-title text-danger">Warning</h3>
        
                <!-- tools box -->
                <div class="box-tools pull-right">
                    <button id="box-delete-btn" type="button" class="btn btn-box-tool" data-dismiss="modal"><i class="fa fa-times text-danger"></i></button>
                </div>
                <!-- /. tools -->
            </div>
            <div class="box-body box-profile flat" style="margin-top: -10px">
                <h4 id="text-status">Are you sure you want to delete record?</h4>
                <button id="delete-confirm" data-dismiss="modal" type="button" style="width: 75px" class="btn btn-block btn-danger btn-sm pull-right">Confirm</button>
            </div>
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

        var getRecordsUrl = '<?php echo base_url("books/populateTable"); ?>';
        var getRowUrl = '<?php echo base_url('books/ajaxGetRow'); ?>';
        var updateUrl = '<?php echo base_url('books/ajaxUpdate'); ?>';

        var new_book_title, new_author, new_library_section, new_date_added, new_copies, new_genres;
        var book_id, book_title, author, library_section, date_added, copies, genre;


        $(function () {
           populateTable();
        })
                         
        
        function populateTable(){

            $('#booksTable').DataTable().destroy();
              
            $('#booksTable').DataTable({
                "columns": [
                { "width": "5%" },
                { "width": "20%" },
                { "width": "15%" },
                { "width": "20%" },
                { "width": "15%" },
                { "width": "5%" },
                { "width": "10%" },
                { "width": "10%" }
                ],
                "ajax": getRecordsUrl
            });

            $("#booksTable").on("click", "tr td .view-btn", function(){
            
                book_id = $(this).parents('tr').find('td:first').html();

                $.ajax({
                    url: getRowUrl,
                    type: 'post',
                    dataType: 'json', 
                    data: {'table' : 'books', 'set': 'book_id', 'value': book_id}, 
                    success: function(result){
                        // console.log(result);

                        $( "input[type='checkbox']" ).prop('checked', false);

                        book_id = result.book_id;
                        book_title = result.book_title;
                        author = result.author;
                        copies = result.copies;
                        date_added = result.date_added;
                        library_section = result.library_section;
                        genre = result.genre;

                        $( "#book_title" ).val(book_title);
                        $( "#author" ).val(author);
                        $( "#copies" ).val(copies);
                        $( "#library_section" ).val(library_section);
                        $( "#date_added" ).val(date_added);

                        var genres = genre.split(", ");
                        //console.log(genres);

                        $.each(genres, function(index, value) {
                          //console.log(value);
                          $( "input[value='"+value+"']" ).prop('checked', true);
                        });
                        
                    }
                });   
            });
        }


        function updateRow(){
            $.ajax({
                url: updateUrl,
                type: 'post',
                dataType: 'json', 
                data: {
                    'table' : 'books',
                    'book_title' : new_book_title, 
                    'author': new_author, 
                    'copies': new_copies, 
                    'date_added': new_date_added, 
                    'library_section': new_library_section,
                    'genre': new_genres,
                    'set': book_id }, 
                    success: function(result){

                        populateTable();
                        
                    }
            }); 
        }


        $('#update-btn').click(function(){
            new_book_title = $( "#book_title" ).val();
            new_author = $( "#author" ).val();
            new_copies = $( "#copies" ).val();
            new_date_added = $('#date_added').val();
            new_library_section = $('#library_section').val();

            var strgen;

            $('input[class="edit"]:checked').each(function() {
                // console.log(this.value);
                if (strgen == null)
                {
                    strgen = this.value;
                }else 
                {
                    strgen = strgen+', '+this.value;
                }
            });

            new_genres = strgen;
            console.log(new_genres);
            updateRow();
        })

    </script>


</html>
