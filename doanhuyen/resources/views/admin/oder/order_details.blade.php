@extends('admin.layouts.index')
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2> Chi Tiết Hóa Đơn {{$order->id}}</h2>
                     </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Hóa Đơn </th>
                                <th>Mã Sản Phẩm</th>
                                <th>Số Lượng</th>
                                 <th>Đơn Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($order_details as $odd)
                            <tr>
                                <td>{{$odd->id}}</td>
                                 <td>{{$odd->order_id}}</td>
                                <td>
                                     {{$odd->product_id}}
                                </td>
                                 <td style="color:blue;">
                                       {!!number_format($odd->quantity)!!}
                                </td>
                                <td style="color:purple;">       
                                       {!!number_format($odd->price)!!} VNĐ
                                </td>
                                <td style="color:red;">
                                     {!!number_format($odd->total_price)!!}   VNĐ
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>
                      <a href="admin/hoadon/danhsach" title="Quay lại" class="btn btn-info">Quay Lại</a> 
                </div>
@endsection 
                 
                 