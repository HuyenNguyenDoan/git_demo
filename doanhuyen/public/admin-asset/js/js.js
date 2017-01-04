
             
             $(function(){

                     $('.sub-menu').slideUp();
                  $('.toogle').click(function(){
                      $('.sub-menu').slideUp();
                      $(this).next().slideToggle();
                    
                  });

             });
        