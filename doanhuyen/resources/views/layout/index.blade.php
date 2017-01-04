<!DOCTYPE html>
<html>
    <head>
        <title>Huyen Doan | @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <base href="{{asset('')}}" >
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="css/style.css"/> -->
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.theme.css"/>
        <script src="js/jquery-2.2.4.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>

        @yield('css')
        
        
                        
                         <script>
                             $(document).ready(function() {
 
                                $(".list-other-item ").owlCarousel({

                                  autoPlay: 2000, //Set AutoPlay to 3 seconds

                                    items :4                              

                                });

                              });
                        </script>    
                        <script type="text/javascript">
 
                                $(window).scroll(function(){
                                        if($(window).scrollTop() >= 10) {
                                                $('.button_scroll2top').show();
                                        } else {
                                                $('.button_scroll2top').hide();
                                        }
                                });
                                function page_scroll2top(){
                                        $('html,body').animate({
                                                scrollTop: 0
                                    }, 'fast');
                                }
                        </script>

                          @yield('script')  
    </head>
    <body>
        
       
        
        <div class="container">
             <div href="javascript:;" class="button_scroll2top" onclick="page_scroll2top()">
                 <span class="glyphicon glyphicon-chevron-up"></span>
             </div>
           @include('layout.header')
        </div>
         <!-- end search-->
         
         <!-- slide-->
        <div class="container">

            @include('layout.slide')
       </div>
               <!-- end slider-->
               
               <div class="container">  


                  <div class="row five">
                        <!--category-->
                        <div class="col-md-3 category">

                            <div class="category-product">

                              @include('layout.left_menu')
                           

                            <div id="support" style=" height: 270px;margin-top: 20px;width:98%">

                               <img src="images/support/hotline.jpg" alt="" width="100%" height="270px">
                            </div>
                            <div id="facebook">
                               <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="255px" height="217px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                            
                            <div class="advantise">
                                <img src="images/advantise/ad1.jpg">
                            </div> 



                        </div>


                        <!-- end category-->
                        <!--show product-->

                            <div class="col-md-9 product"> 


                                <!--  product item-->
                                @yield('content')
                                <!--  product-item-->      
                            </div>

                      <!--  row five--> 
                 </div>


                 <div class="row six">


                          <div class="other-products">
                              
                                <div class="hearder1">
                                              <h4>
                                               SẢN PHẨM KHÁC
                                              </h4>
                                </div>
                          
                              <div class="list-other-item">
                                    @foreach($other_product as $opr)
                                       <div class="other-item-owl"> 

                                              <div class="img-other-item">
                                                  <a href="chitietsanpham/{{$opr->id}}">
                                                      <img src="uploads/product/{{$opr->images}}" width="100%" height="200px" />
                                                  </a>
                                              </div>
                                              
                                              <div class="name-other-item">
                                                  <a href="chitietsanpham/{{$opr->id}}">
                                                      <h4> {{$opr->name}}</h4>
                                                  </a>
                                              </div>
                                              
                                              <div class="price-other-views">
                                                  <h4>{{number_format($opr->price)}} VNĐ</h4>
                                                  <p>Lượt Xem : {{$opr->view}}</p>
                                              </div>
                                              
                                              <div class="details-other-item">
                                                  <ul>
                                                      <li>
                                                          <a href="chitietsanpham/{{$opr->id}}">Chi Tiết</a>
                                                      </li>
                                                       <li>
                                                          <a href="themgiohang/{{$opr->id}}" class="additem">Thêm Vào giỏ Hàng</a>
                                                      </li>
                                                  </ul>
                                              </div>   
                                         <!--  item-->
                                        </div>   
                                   @endforeach
                              </div>
                              
                          
                         </div>
                 </div>

         </div>   
                       
               <div class="container">
                  @include('layout.footer')

               </div>     
           
                  
                      
                     
    </body>
</html>

