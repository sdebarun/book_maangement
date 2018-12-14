$(document).ready(function() {
    $('#allauthors').DataTable();

    $('.del').click(function(){

       
        if(confirm('Sure you want to delete this ?')){
            $("#formTodel").submit();
            // var id = $(this).attr('data-id');
            // console.log(id);
        }
        else{
            return false;
        }
    });

} );