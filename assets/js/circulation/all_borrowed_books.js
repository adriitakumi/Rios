var book_ids, newselected, available, split_id, borrowed_books_id, member_id;

$(function () {
   populateTable();
})
                 

function populateTable(){

    $.ajax({
        url: getRecordsUrl,
        type: 'post',
        dataType: 'json', 
        data: {'table' : 'borrowed_books'}, 
        success: function(result){
            //console.log(result);
            
            $('#borrowedBooksTable').DataTable().destroy();
  
            $('#borrowedBooksTable').DataTable({
                "columns": [
                { "width": "5%" },
                { "width": "20%" },
                { "width": "20%" },
                { "width": "20%" },
                { "width": "10%" },
                { "width": "10%" },
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

    member_id = $('#member_id').val();
    alert(member_id);

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
                alert('No copies to borrow.');
            } else
            {
                book_ids.push(split_id);
                //populateTable();
            }
        });
        borrowBooks();
        $('#modal-add').modal('hide');
        newselected = null;
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

                location.reload();

                $.notify({
                    icon: 'fa fa-check',
                    message: "Successfully borrowed book!"

                },{
                    type: 'success',
                    timer: 4000
                });
                
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