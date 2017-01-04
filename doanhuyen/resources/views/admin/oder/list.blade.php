@extends('admin.layouts.index')
@section('content')
              <div class="col-md-9  content"> 
                     <div class="title table">
                         <h2>Danh sách Hóa Đơn</h2>
                     </div>
                        @if(session('thongbao'))
                           <div class="alert alert-success">
                             {{session('thongbao')}}
                           </div>
                        @endif
                         <br/>
                         <form action="admin/hoadon/danhsach" method="post" class="form-inline">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <input type="text"  name="timkiem" class="form-control" placeholder="Nhập Mã Hóa Đơn ,Mã Người Dùng Bạn Muốn Tìm.." size="90">
                          <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                          </form>
                          <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Hóa Đơn</th>
                                <th>Mã NGười Dùng</th>
                                <th>Họ Tên</th>
                                <th>Địa Chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng Tiền</th>
                                <th>Thời gian đặt Hàng</th>   
                                <th>Trạng Thái</th>
                                <th>Cập Nhật Trạng Thái</th>                               
                                <th>Chi Tiết Hóa Đơn</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($oder as $key =>$o)
                            <tr>
                                 <td>{{$key + 1}}</td>
                                <td>{{$o->id}}</td>
                                 <td>{{$o->id_user}}</td>                                
                                   <td>
                                      {{$o->name}}
                                   </td>
                                 <td>
                                     {{$o->address}}
                                </td>
                                 <td>
                                     {{$o->phone_number}}
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
                                 <td>
                                    <a href="admin/hoadon/sua/{{$o->id}}" title="Cập Nhật Trạng Thái">Cập Nhật</a>
                                </td>
                                <td>
                                    <a href="admin/hoadon/chitiethoadon/{{$o->id}}" title="Chi tiết Hóa Đơn">Chi Tiết Hóa Đơn</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>
                   <div class="pani">
                    <ul class="pagination pull-right">
                    <li>
                        {!!$oder->links()!!} 
                    </li>
                     </ul>
                   </div>             
                </div>
@endsection 
                 
                 