@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn xóa slide này  ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách Slide </h2>
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
		                            <th>Tiêu Để</th>
		                            <th>Hình Ảnh</th>
		                            <th>Link</th>
		                            
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>

		                    @foreach($slide as $sl)
		                        <tr>
		                            <td>{{$sl->id}}</td>
		                            <td>{{$sl->title}}</td>
		                           
		                          
		                            <td>
		                              <img src="uploads/slidershow/{{$sl->image}}" alt="" width="180px" height="100px">
		                            </td>
		                             <td>{{$sl->link}}</td>
		                            <td>
		                                <a href="admin/slide/sua/{{$sl->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/slide/xoa/{{$sl->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                    @endforeach
		                    </tbody>
                   </table>
        
                </div>


@endsection 
                 
                 