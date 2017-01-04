@extends('admin.layouts.index')
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2> Xem Hóa Đơn Mã Khách Hàng {{$customer->id}} </h2>
                     </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Khách hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Tổng Tiền</th>
                                <th>Thời gian đặt Hàng</th>  
                                <th>Trạng Thái</th>                                
                            </tr>     
                        </thead>
                        <tbody>
                          @foreach($order as $o)
                            <tr>
                                <td>{{$o->id}}</td>
                                 <td>{{$o->customer_id}}</td>                                

                                <td>
                                     {{$o->address}}
                                </td>
                                 <td style="color:red;">
<!--                                      {{$o->total_price}} -->
                                      {!!number_format($o->total_price)!!} VNĐ
                                </td>

                                <td>
                                     {{$o->created_at}}
                                </td>
                                <td style="color:green;">
                                   @if($o->status==0)
                                    {{'Đang chờ xử lý'}}
                                    @elseif($o->status==1)
                                     {{'Đang xử lý'}}
                                     @elseif($o->status==2)
                                     {{'Đã Giao Hàng'}}
                                     @elseif($o->status==3)
                                     {{'Hết Hàng'}}
                                   @endif
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>   
                   <a href="admin/khachhang/danhsach" title="Quay Lại" class="btn btn-info">Quay Lại</a>        
@endsection 
                 
                 