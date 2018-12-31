$(document).ready(function() {
    $('#custom_picker').hide();
    $('.filter-btn').attr('disabled','true');
    $('#dateFilter').change(function(){
        var fieldVal = $(this).val();
        console.log(fieldVal);
        if(fieldVal != ''){
            $('.filter-btn').removeAttr('disabled',false);
        }
        else{
            $('.filter-btn').attr('disabled','true');
        }
        if(fieldVal == 'custom'){
            $('#custom_picker').fadeIn();
        }
        else{
            $('#custom_picker').fadeOut();
        }
    });
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
