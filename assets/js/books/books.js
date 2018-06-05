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

                var genres = genre.split(",");
                //console.log(genres);

                $.each(genres, function(index, value) {
                  //console.log(value);
                  $( "input[value='"+value+"']" ).prop('checked', true);
                });
                
            }
        });   
    });
}


$("#booksTable").on("click", "tr td .delete-btn", function(){
    
    book_id = $(this).parents('tr').find('td:first').html();
    //alert(book_id);
    $('#delete-confirm').click(function(){

        $.ajax({
            url: deleteRowUrl,
            type: 'post',
            dataType: 'json', 
            data: {
            'book_id': book_id,
            'table': 'books' }, 
            success: function(result){
            //console.log(result);

            populateTable();

            $.notify({
                icon: 'fa fa-check',
                message: "Successfully deleted book!"

            },{
                type: 'success',
                timer: 4000
            });

            }
        }); 
    })
});




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
                $('#modal-edit').modal('hide');
                populateTable();

                $.notify({
                icon: 'fa fa-check',
                message: "Successfully updated book!"

            },{
                type: 'success',
                timer: 4000
            });
                
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
        //console.log(this.value);
        if (strgen == null)
        {
            strgen = this.value;
        }else 
        {
            strgen = strgen+','+this.value;
        }
    });

    new_genres = strgen;
    //console.log(new_genres);
    updateRow();
})

$('#add-link').click(function(){
    $( "input[type='checkbox']" ).prop('checked', false);
})