                @extends('layout.index')
             @section('title')
                Chi Tiết Sản Phẩm
              @endsection
               @section('css')
            
                <link rel="stylesheet" href="css/details-item.css"/>
               @endsection

               @section('content')
            
                <div class="product-item">
                                    
                                    <div class="hearder1">
                                              <h4>
                                                  CHI TIẾT SẢN PHẨM
                                              </h4>
                                     </div>
                       @foreach($product_details as $pr)
                             <div class="item">
                                       <div class="image">
                                           <img src="uploads/product/{{$pr->images}}"/>
                                       </div>           
                                         <div id="details-items">
                                             <h2>Tên Sản Phẩm :{{$pr->name}}</h2>  
                                             <p>Giá : {{number_format($pr->price)}}VNĐ</p>
                                             
                                             <p>Lượt xem: {{$pr->view}}</p>
                                             <p>Số lượng: {{$pr->quantity}}</p>
                                             <h3>Liên Hệ : 0915096904</h3> 
                                             <a href="themgiohang/{{$pr->id}}" class="btn btn-danger" >Thêm Vào Giỏ Hàng</a>
                                           </div>  
                                   </div>   
                                 </div>
                                    <div id="des-item">
                                         <div class="hearder1">
                                              <h4>
                                                  MÔ TẢ SẢN PHẨM
                                              </h4>
                                         </div>
                                        
                                        
                                        <div class="des-content">
                                            <p> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Nhâc máy lên và gọi ngay tới hotline 
                                                0915096904 để được tư vấn và hỗ trợ!
                                                Bàn ghế gỗ thiên nhiên sử dụng trang trí phòng khách, phòng ngủ,
                                                bàn trang điểm hay bàn ăn trong các gia đình. Chất liệu gỗ cao cấp, 
                                                gần gũivới thiên nhiên, bề ngoài sang trọng, tính thẩm mỹ cao khiến 
                                                cho loại sản phẩm này được ưa thích tiêu dùng. Ưu điểm của bàn ghế ăn gỗ: + 
                                                Kiểu dáng đa dạng đẹp mắt: theo bộ hoặc bàn riêng, ghế riêng rất thuận tiện. + 
                                                Chất liệu gỗ giúp không gian ngôi nhà bạn trở nên sang trọng và sạch sẽ +
                                                Bề ngoài bàn phổ biến, mặt bàn tròn, vuông hoặc bầu dục. Tựa lưng ghế cách điệu hình nan,
                                                sở hữu hoa văn tinh tế. + Màu sắc: Màu đặc thù của gỗ, nâu đỏ hoặc nâu trầm sang trọng. +
                                                Kích thước bàn và ghế được thiết kế, 
                                                gia công phù hợp với ngôi nhà bạn
                                                Hãy đến sở hữu nội thất Thành văn để làm đẹp không gian ngôi nhà bạn !
                                            </p>
                                        </div>
                                      
                                        <div class="list-des-img">
                                          @foreach($image as $img)
                                            <div class="des-img" align="center">
                                               <img src="uploads/product/{{$img->images}}"/>
                                            </div>
                                          <!--   <div class="des-img" align="center">
                                                chưa có ảnh mô tả cho sản phẩm này
                                            </div>
                                            <div class="des-img" align="center">
                                               chưa có ảnh mô tả  cho sản phẩm này
                                            </div> -->
                                             @endforeach  
                                        </div>
                                     
                                </div>
                                   
                        @endforeach
                              
                          @if(Auth::user())
                                   <div class="comment">
                                            @if(session('thongbao'))
                                                  <div class="alert alert-success">
                                                   {{session('thongbao')}}
                                                 </div>

                                             @endif
                                       <h3>Viết Bình Luận...
                                        <span class="glyphicon glyphicon-pencil"></span>
                                       </h3>
                                       
                                            

                        <form role="form" action="binhluan/{{$pr->id}}" method="post">
                             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                              <div class="form-group ">
                                                
                        <textarea  rows="5" id="comment" style="width:750px" name="noidung">
                                                  
                          </textarea>
                           </div>
                             <button class="btn btn-default">Bình luận</button>
                           </form>
                       
                                  </div>

                         @endif
                                   <br/>
                                   <br/>

                                  <div class="write_comment">
                                    @foreach($comment as $cm)
                                    <h3>Đã bình luận:{{$cm->created_at}}</h3>
                                     <p>
                                        <h4 style="color:#1285BB">
                                          {{$cm->User->name}}
                                        </h4> 
                                        {{$cm->content}}
                                     </p>

                                      @endforeach
                                  </div>
                                
                                   


                   </div>
             </div>
     @endsection