@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn xóa danh mục loại gỗ này ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách Loại Gỗ</h2>
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
		                            <th>Tên Loại Gỗ</th>
		                            <th>Loại Gỗ Hot</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                      @foreach($typewood as $tw)
		                        <tr>
		                            <td>{{$tw->id}}</td>
		                            <td>{{$tw->name}}</td>
		                            <td>
		                               @if( $tw->hot_type_of_wood == 1)
		                                  {{'có'}}
                                        @else
                                         {{'không'}}
		                               @endif
		                            </td>
		                            <td>
		                                <a href="admin/loaigo/sua/{{$tw->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/loaigo/xoa/{{$tw->id}}" class="delete" title="">Xóa</a>
		                            </td>
		                        </tr>
		                       @endforeach
		                    </tbody>
                   </table>
         
         
                  
                   
                </div>


@endsection 
                 
                 