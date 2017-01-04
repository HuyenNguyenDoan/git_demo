@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn Xóa đi người này ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 
                     <div class="title table">
                         <h2>Danh sách Người Dùng</h2>
                     </div>
                     @if(session('thongbao'))
                           <div class="alert alert-success">
                             {{session('thongbao')}}
                           </div>
                        @endif
                          <form action="admin/nguoidung/danhsach" method="post" class="form-inline">
                      	  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <input type="text"  name="timkiem" class="form-control" placeholder="Nhập Mã và Nhập Tên Người dùng bạn muốn tìm..." size="90">
                          <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                          </form>
                    <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th>STT</th>
		                            <th>Họ Tên</th>
		                            <th>Email</th>
		                            <th>level</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($user as $us)
		                        <tr>
		                            <td>{{$us->id}}</td>
		                            <td>{{$us->name}}</td>
		                            <td>{{$us->email}}</td>
		                          
		                            <td>
		                            	@if($us->level==1)
		                            	   {{'admin'}}
		                            	   @else
		                            	   {{'thường'}}
		                            	@endif
		                            </td>
		                            <td>
		                                <a href="admin/nguoidung/sua/{{$us->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/nguoidung/xoa/{{$us->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                       @endforeach
		                    </tbody>
                   </table>
         
                   <div class="pani">
		                    <ul class="pagination pull-right">
			                         @if($user->currentPage() != 1)
			                        <li><a href="{!!$user->url($user->currentPage() - 1)!!}">Page</a></li>
                                    @endif
			                         @for($i = 1 ;$i <= $user->lastPage(); $i++)
					                        <li 
					                          class="{{($user->currentPage()==$i) ? 'active' : ''}}">
					                         <a href="{!!$user->url($i)!!}">{{$i}}</a>
					                        </li>
			                         @endfor

			                         @if($user->currentPage() !=  $user->lastPage())
			                        <li><a href="{!!$user->url($user->currentPage() + 1)!!}">&raquo;</a></li>
			                         @endif()
		                    </ul>
                   </div>  
                </div>
@endsection 
                 
                 