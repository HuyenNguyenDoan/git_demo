@extends('admin.layouts.index')
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách liên hệ</h2>
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
		                            <th>Tên Người Liên Hệ</th>
		                            <th>Số điện thoại</th>
		                            <th>Email</th>
		                            <th>Địa Chỉ</th>
		                            <th>Nội dung liên hệ</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                      @foreach($contact as $ct)
		                        <tr>
		                            <td>{{$ct->id}}</td>
		                            <td>{{$ct->fullname}}</td>
		                            <td>
		                               {{$ct->phone_number}}
		                            </td>
		                            <td>{{$ct->email}}</td>
		                            <td>{{$ct->address}}</td>
		                            <td>{{$ct->content}}</td>

		                            
		                            <td>
		                                <a href="admin/lienhe/xoa/{{$ct->id}}" title="">Xóa</a>
		                            </td>
		                        </tr>
		                       @endforeach
		                    </tbody>
                   </table>
         
                  
                   
                </div>

@endsection 
                 
                 