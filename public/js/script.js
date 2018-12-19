$(document).ready(function() {
    
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

    $('.slider').slick({
        dots: true,
        arrows : true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });

});



      