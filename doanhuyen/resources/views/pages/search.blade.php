 @extends('layout.index')

 @section('title')
     Tìm Kiếm
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
                                   <?php 
                                    function doimau($str,$search)
                                    {
                                        return str_replace($search,"<span style='color:red'>$search</span>",$str);
                                    }
                                    ?>
                                    <div class="hearder1">
                                     
                                              <h4>
                                                  Từ Khóa Tìm kiếm : {!!$search!!}
                                              </h4>
                                     </div>
                                      @foreach($product_search as $pr)
                                   <div class="col-md-4 special-4-md"> 
                                         <div class="item"> 
                                              <div class="img-item ">
                                                  <a href="chitietsanpham/{{$pr->id}}">
                                                      <img src="uploads/product/{{$pr->images}}" width="100%" height="200px" />
                                                  </a>
                                              </div> 
                                              <div class="name-item">
                                                  <a href="chitietsanpham/{{$pr->id}}">
                                                      <h4>
                                                      {!! doimau($pr->name,$search)!!}</h4>
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
                            </div>  
                           @endforeach                                                           
                </div>
@endsection