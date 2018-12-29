$(document).ready(function() {
    $('#custom_picker').hide();
    $('#dateFilter').change(function(){
        var fieldVal = $(this).val();
         console.log(fieldVal);
         if(fieldVal == 'custom'){
         $('#custom_picker').fadeIn();
     }
     else{
         $('#custom_picker').fadeOut();
     }
     })
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
