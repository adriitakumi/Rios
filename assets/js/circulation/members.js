var get_member_id, member_id, i;
var first_name, last_name, age, contact_no, email, house_no, street, barangay, city, province;
var new_first_name, new_last_name, new_age, new_contact_no, new_email, new_house_no, new_street, new_barangay, new_city, new_province;

$(".member").on("click", ".view-btn", function(){

hide();
get_member_id = $(this).parents(".card").find("small").text();

var split_id = get_member_id.split(" ");
member_id = split_id[2];
//alert(split_id[2]);

$.ajax({
    url: getRowUrl,
    type: 'post',
    dataType: 'json', 
    data: {'table' : 'members', 'set': 'member_id', 'value': member_id}, 
    success: function(result){
      //employee_id = result.employee_id;
      alert(result.house_no);
        $( "#view-firstname" ).val(result.first_name);
        $( "#view-lastname" ).val(result.last_name);
        $( "#view-age" ).val(result.age);
        $( "#view-contact" ).val(result.contact_no);
        $( "#view-email" ).val(result.email);
        $( "#view-houseno" ).val(result.house_no);
        $( "#view-street" ).val(result.street);
        $( "#view-barangay" ).val(result.barangay);
        $( "#view-city" ).val(result.city);
        $( "#view-province" ).val(result.province);
      
        first_name = result.first_name;
        last_name = result.last_name;
        age = result.age;
        contact_no = result.contact_no;
        email = result.email;
        house_no = result.house_no;
        street = result.street;
        barangay = result.barangay;
        city = result.city;
        province = result.province;
    }
  });
});

function show(){
    i=1;
    $( "#view-firstname" ).prop( "disabled", false );
    $( "#view-lastname" ).prop( "disabled", false );
    $( "#view-age" ).prop( "disabled", false );
    $( "#view-contact" ).prop( "disabled", false );
    $( "#view-email" ).prop( "disabled", false );
    $( "#view-houseno" ).prop( "disabled", false );
    $( "#view-street" ).prop( "disabled", false );
    $( "#view-barangay" ).prop( "disabled", false );
    $( "#view-city" ).prop( "disabled", false );
    $( "#view-province" ).prop( "disabled", false );
    $( "#view-edit-title" ).html('Edit');
    $( "#update-btn" ).show();
    $( "#cancel-btn" ).show();
    $( "#view-edit" ).hide();
}

function hide(){
    i=0;
    $( "#view-firstname" ).prop( "disabled", true );
    $( "#view-lastname" ).prop( "disabled", true );
    $( "#view-age" ).prop( "disabled", true );
    $( "#view-contact" ).prop( "disabled", true );
    $( "#view-email" ).prop( "disabled", true );
    $( "#view-houseno" ).prop( "disabled", true );
    $( "#view-street" ).prop( "disabled", true );
    $( "#view-barangay" ).prop( "disabled", true );
    $( "#view-city" ).prop( "disabled", true );
    $( "#view-province" ).prop( "disabled", true );
    $( "#view-edit-title" ).html('View');
    $( "#update-btn" ).hide();
    $( "#cancel-btn" ).hide();
    $( "#view-edit" ).show();
}

$('#view-edit').click(function(){
  if(i==0){
    show();
  }
  else if(i==1){
    hide();
  }      
})

function updateRow(){ 
    $.ajax({
        url: updateUrl,
        type: 'post',
        dataType: 'json', 
        data: {
        'table' : 'members',
        'first_name': new_first_name,  
        'last_name': new_last_name, 
        'age': new_age, 
        'contact_no': new_contact_no,  
        'email': new_email, 
        'house_no': new_house_no,
        'street': new_street,
        'barangay': new_barangay,
        'city': new_city,
        'province': new_province,
        'set': member_id }, 
        success: function(result){
            location.reload();
        }
    }); 
}



$('#update-btn').click(function(){
    new_first_name = $( "#view-firstname" ).val();
    new_last_name = $( "#view-lastname" ).val();
    new_age = $('#view-age').val();
    new_contact_no = $('#view-contact').val();
    new_email = $('#view-email').val();
    new_house_no = $( "#view-houseno" ).val();
    new_street = $( "#view-street" ).val();
    new_barangay = $( "#view-barangay" ).val();
    new_city = $( "#view-city" ).val();
    new_province = $( "#view-province" ).val();
    updateRow();  
})


$('#delete-confirm').click(function(){
    var tables = ['members', 'borrowed_books'];

    $.ajax({
        url: deleteRowUrl,
        type: 'post',
        dataType: 'json', 
        data: {
        'member_id': member_id,
        'tables': tables }, 
        success: function(result){
        //console.log(result);
        $('#modal-delete').modal('hide');
        location.reload();
        $.notify({
                icon: 'fa fa-check',
                message: "Successfully deleted member!"

            },{
                type: 'success',
                timer: 4000
            });
        }
    }); 
})


$('#searchMember').keyup(function(){
    var valThis = $(this).val().toLowerCase();
    
    if(valThis == "")
    {
        $('#byfours').show();
        $('#searchDiv').hide();
    } else 
    {
        $('.searchList > li').each(function(){
            var text = $(this).text().toLowerCase();
            $('#searchDiv').show();
            
            if (text.indexOf(valThis) >= 0) 
            {
                $(this).show();
                $('#byfours').hide();

            }else
            {
                $(this).hide();  
            } 
        });
    }
});