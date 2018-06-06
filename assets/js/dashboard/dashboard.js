var borrowed_book_id;

$(function () {
   populateTable();
})
                 

function populateTable(){

    $('#dueThisWeekTable').DataTable().destroy();
      
    $('#dueThisWeekTable').DataTable({
        "columns": [
        { "width": "10%" },
        { "width": "20%" },
        { "width": "15%" },
        { "width": "20%" },
        { "width": "10%" },
        { "width": "10%" },
        { "width": "15%" }
        ],
        "ajax": getRecordsUrl
    });

    $("#dueThisWeekTable").on("click", "tr td .return-btn", function(){
    
        borrowed_book_id = $(this).parents('tr').find('td:first').html();
        //alert(borrowed_book_id);

        $('#return-confirm').click(function(){

        $.ajax({
            url: returnBookUrl,
            type: 'post',
            dataType: 'json', 
            data: {
            'id': borrowed_book_id,
            'table': 'borrowed_books' }, 
            success: function(result){
            //console.log(result);

            populateTable();

            $.notify({
                icon: 'fa fa-check',
                message: "Successfully returned book!"

            },{
                type: 'success',
                timer: 4000
            });
            
            }
        }); 
    })  
    });
}
