@extends('admin.layouts.index')
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách khách Hàng</h2>
                     </div>
                      
                     @if(session('thongbao'))
                       <div class="alert alert-success">
                       	   {{session('thongbao')}}
                       </div>
                     @endif
                    <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th>STT</th>
		                            <th>Họ Tên</th>
		                            <th>Số điện thoại</th>
		                            <th>Địa Chỉ</th>
		                            <!--  <th>Hóa Đơn</th> -->

		                            <th>Sửa</th>
		                            <!-- <th>Xóa</th> -->

		                        </tr>
		                    </thead>
		                    <tbody>
		                      @foreach($customer as $ctm)
		                        <tr>
		                            <td>{{$ctm->id}}</td>
		                            <td>{{$ctm->fullname}}</td>
		                            <td>
		                               {{$ctm->phone_number}}
		                            </td>
		                            
		                            <td>{{$ctm->address}}</td>
		                            
                                    <!--  <td>
		                                <a href="admin/khachhang/hoadon/{{$ctm->id}}" title="">Xem Hóa Đơn</a>
		                            </td> -->
		                             <td>
		                                <a href="admin/khachhang/sua/{{$ctm->id}}" title="">Sửa</a>
		                            </td> 
		                        </tr>
		                       @endforeach
		                    </tbody>
                   </table>
                   <div class="pani">
                    <ul class="pagination pull-right">
		            <li>
                        {!!$customer->links()!!} 
			        </li>
			         </ul>
                   </div>
                </div>

@endsection 
                 
                 