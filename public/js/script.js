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
    if($('.paginated_page_table tbody').text() === ''){
        $('.paginated_page_table tbody').html("<tr><td colspan=5 class='noresult-col'>No result found</td></tr>")
    }
  $('.del').click(function(){
      if(confirm('Sure you want to delete this ?')){
          $("#formTodel").submit();
      }
      else{
          return false;
      }
  });
  $('#allauthors').DataTable();
} );
