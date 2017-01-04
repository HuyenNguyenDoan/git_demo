@extends('layout.index')


@section('title')
    Chi Tiết Giỏ Hàng
@endsection
@section('css')
       
    <link rel="stylesheet" href="css/cart.css"/>
@endsection
@section('script')
  <script type="text/javascript">
      $(document).ready(function(){
          $(".updatecart").click(function(){
             var rowid =  $(this).attr('id');
             var qty =  $(this).parent().parent().find(".qty").val();
             var token = $("input[name='_token']").val();

            $.ajax({
                  url:'capnhat/'+rowid+'/'+ qty,
                  type:'GET',
                  cache:false,
                  data:{"_token":token,"id":rowid,"qty":qty},
                  success:function(data){
                          if(data == "oke")
                          {
                            window.location ="giohang";
                          }
                  }
            });
             
          });
      });
  </script>
@endsection


@section('content')
                              
                             <div class="hearder1">
                                    <h4>Chi Tiết Giỏ Hàng</h4>
                                </div>
                                
                                <div id="table-cart">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Action</th>
                                            <th>Giá</th>
                                            <th>Thành tiền</th>
                                           
                                        </tr>
                                          <form method="post">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        @foreach($content as $item)           
                                        <tr>
                                            <td>
                                                <img src="uploads/product/{{$item->options->img}}" width="60px" height="60px" />
                                            </td>
                                            <td>
                                               {!!$item->name!!}
                                            </td>
                                            <td>
                                                <input type="text"  size="5"
                                                 value="{!!$item->qty!!}" name="quantity[40]" class="qty" />
                                            </td>
                                           
                                             <td>
                                               <a href="capnhat/{{$item->rowId}}/{{$item->qty}}" title="Cập nhật" class="updatecart" id="{{$item->rowId}}"> Cập nhật</a> <br/><br/>
                                                 <a href="xoasanpham/{{$item->rowId}}" title="Xóa"> Xóa</a> 
                                            </td>
                                            <td>
                                               {!!number_format($item->price)!!} VNĐ
                                            </td>
                                            <td>
                                               {!!number_format($item->price)*$item->qty ,",",0,0,0!!} VNĐ
                                            </td>  
                                        </tr>
                                       @endforeach()  
                                       </form>
                                    </table>
                                    <h3 style="color: red"> Tổng tiền:{{$subtotal}} VNĐ </h3>
                                    <a  href="trangchu" title="Tiếp Tục Mua hàng" class="btn btn-default"> Tiếp tục mua hàng</a>
                                    <a href="huygiohang" title="Hủy Giỏ Hàng" class="btn btn-default">Hủy Giỏ Hàng</a>
                                </div>
                                
                                <div  id="customer">
                                    <h4>Đặt Hàng</h4>
                                     @if(count($errors) > 0)

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br/>
                                @endforeach
                            </div>
                        @endif
                         
                        @if(session('thongbao'))
                           <div class="alert alert-success">
                             {{session('thongbao')}}
                           </div>

                        @endif
                                    @if((Cart::content()->count() > 0))
                                       @if(Auth::user())
                                       <form id="frm-customer" action="dathang" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                           <div class="form-group">
                                              <label>Số Điện thoại Người Nhận Hàng</label>
                                              <input type="text" class="form-control" name="sdtn" >
                                          </div>
                                          <div class="form-group">
                                              <label>Địa Chỉ Người Nhận</label>
                                              <input type="text" class="form-control" name="diachin">
                                          </div>
                                          <button type="submit" class="btn btn-warning">Đặt Mua</button>                 
                                      </form>
                                       @else
                                         <form id="frm-customer" action="dathang" method="post">
                                           <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                       
                                        <div class="form-group">
                                            <label>Họ Tên Khách Hàng</label>
                                            <input type="text" class="form-control" name="tenkh">
                                        </div>
                                         <div class="form-group">
                                            <label>Số Điện thoại</label>
                                            <input type="text" class="form-control" name="sdt" >
                                        </div>
                                        <div class="form-group">
                                            <label>Địa Chỉ</label>
                                            <input type="text" class="form-control" name="diachi">
                                        </div>
                                        <button type="submit" class="btn btn-warning">Đặt Mua</button>      
                                     </form>
                                       @endif
                                    @endif
                                </div>
                            </div>
@endsection

