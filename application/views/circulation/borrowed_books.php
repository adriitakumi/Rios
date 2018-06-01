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

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  DataTables   -->
    <link href="https://nightly.datatables.net/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

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
                            echo $member_id;
                        // }
                    ?>
                </div>
                <!-- /.text-warning -->
                <div class="panel-heading">
                    <h3>Borowed Books</h3>
                    <p>List of MEMBER HERE borrowed books information</p>
                    <p id="add-link" class="category pull-right" style="margin: -60px 20px 0 20px;"><i class="fa fa-plus-circle" data-toggle="modal" data-target="#modal-add" style="font-size: 40px; cursor: pointer;"></i></p>
                </div>
                <div class="container-fluid panel" style="padding: 10px;">
                    <table class="table table-bordered table-hover" id="borrowedBooksTable">
                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Borrowed</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Date Returned</th>
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
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            <h4 class="modal-title">Borrow Book</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="booksTable" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Book ID</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Available Copies</th>
                          </tr>
                        </thead>
                      </table>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
            <button id="add-btn" class="btn btn-fill btn-primary">Add</button>
        </div>
        <!-- /.modal-footer -->
    </div/>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal-->


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

    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>dist/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <!-- Page Script -->
    <script type="text/javascript">

        var member_id = '<?php echo $member_id; ?>'
        var getRecordsUrl = '<?php echo base_url("circulation/populateTable"); ?>';
        var getBooksUrl = '<?php echo base_url("circulation/getBooksTable"); ?>';
        var borrowBooksUrl = '<?php echo base_url("circulation/add"); ?>';
        var returnBookUrl = '<?php echo base_url("circulation/returnBook"); ?>';
        //console.log(member_id);

        var book_ids, newselected, available, split_id, borrowed_books_id;

        $(function () {
           populateTable();
        })
                         
        
        function populateTable(){

            $.ajax({
                url: getRecordsUrl,
                type: 'post',
                dataType: 'json', 
                data: {'table' : 'members', 'set': 'member_id', 'value': member_id}, 
                success: function(result){
                    //console.log(result);
                    
                    $('#borrowedBooksTable').DataTable().destroy();
          
                    $('#borrowedBooksTable').DataTable({
                        "columns": [
                        { "width": "5%" },
                        { "width": "20%" },
                        { "width": "20%" },
                        { "width": "12%" },
                        { "width": "12%" },
                        { "width": "10%" },
                        { "width": "11%" },
                        { "width": "10%" }
                        ],
                        "data": result
                    });   
                }
            });

            $('#booksTable').DataTable().destroy();

            $('#booksTable').DataTable( {
                "columns": [
                { "width": "15%" },
                { "width": "15%" },
                { "width": "25%" },
                { "width": "25%" },
                { "width": "20%" }
                ],
                "ajax": getBooksUrl
            });
        }


        $('#add-btn').on('click', function(event) {

            var selected = $('input[type="checkbox"]:checked');
            //console.log(selected);

            if (selected.length <= 0)
            {
                alert('Please select a book first!');
            }
            else if (selected.length > 3)
            {
                alert('You can only borrow a maximum of 3 books.');
            }
            else
            {
                book_ids = [];
                $($('input[type="checkbox"]:checked')).each(function(index, val){
                     
                    newselected = val.value.split(",");
                    available = newselected[1];
                    split_id = newselected[0];

                    if (available <= 0)
                    {
                        alert('bawal');
                    } else
                    {
                        book_ids.push(split_id);
                        borrowBooks();
                        $('#modal-add').modal('hide');
                        populateTable();
                    }
                    newselected = null;
                });
            }

        });

        function borrowBooks(){
            $.ajax({
                url: borrowBooksUrl,
                type: 'post',
                dataType: 'json', 
                data: {
                    'table' : 'borrowed_books',
                    'member_id': member_id,
                    'book_id' : book_ids
                    }, 
                    success: function(result){
                        
                    }
            }); 
        }
        
        $("#borrowedBooksTable").on("click", "tr td .return-btn", function(){
            
            id = $(this).parents('tr').find('td:first').html();
            //alert(id);
            $('#return-confirm').click(function(){

                $.ajax({
                    url: returnBookUrl,
                    type: 'post',
                    dataType: 'json', 
                    data: {
                    'id': id,
                    'table': 'borrowed_books' }, 
                    success: function(result){
                    //console.log(result);

                    populateTable();
                    }
                }); 
            })
        });

    </script>


</html>
