 @extends('layout.index')

 @section('title')
     Trang Chủ
 @endsection
 @section('css')
  
 <link rel="stylesheet" href="css/style.css"/>
 <script type="text/javascript">
            
     $(document).ready(function(){
         $(".additem").click(function(){
               alert('Thêm Sản Phẩm vào Giỏ Hàng Thành Công');
         });
     });
 </script>
 @endsection

 @section('content')
                             <div class="product-item">

                                  
                                    <div class="hearder1">
                                     
                                              <h4>
                                                  SẢN PHẨM NỔI BẬT
                                              </h4>
                                     </div>
                                     
                                      <!--  list product-->
                                      @foreach($product as $pr)
                                   <div class="col-md-4 special-4-md"> 
                             
                                         <div class="item"> 
                                           
                                              <div class="img-item ">
                                                  <a href="chitietsanpham/{{$pr->id}}">
                                                      <img src="uploads/product/{{$pr->images}}" width="237.98px" height="200px" />
                                                  </a>
                                              </div>
                                              
                                              <div class="name-item">
                                                  <a href="chitietsanpham/{{$pr->id}}">
                                                      <h4>{{$pr->name}}</h4>
                                                  </a>
                                              </div>
                                              
                                              <div class="price-views">
                                                  <h4>{{number_format($pr->price)}} VNĐ</h4>
                                                  <p>Lượt Xem : {{$pr->view}}</p>
                                              </div>
                                        

                                              <div class="details-item">
                                                  <ul>
                                                      <li>
                                                          <a href="chitietsanpham/{{$pr->id}}">Chi Tiết</a>
                                                      </li>
                                                       <li>
                                                          <a href="themgiohang/{{$pr->id}}" class="additem">Thêm Giỏ Hàng</a>
                                                      </li>
                                                   
                                                  </ul>
                                              </div>   
                                         
                                        </div> 
                                         
                          <!--  item owl-->
                            </div>  
                        <!--  list-item-->
                           @endforeach                                            
                                       
                </div> 
                                

@endsection