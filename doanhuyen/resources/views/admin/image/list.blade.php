@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn xóa hình ảnh này  ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách Hình Ảnh</h2>
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
		                            <th>Mã Hình Ảnh</th>
		                            <th>Hình Ảnh</th>
		                            <th>Link Ảnh cho mã sản phẩm</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($image as $key  =>$img)
		                        <tr>
		                            <td>{{$key + 1 }}</td>
		                            <td>{{$img->id}}</td>
		                            <td>
		                              <img src="uploads/product/{{$img->images}}" alt="" width="180px" height="100px">
		                            </td>
		                             <td>{{$img->id_product}}</td>
		                            <td>
		                                <a href="admin/hinhanh/sua/{{$img->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/hinhanh/xoa/{{$img->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                    @endforeach
		                    </tbody>
                   </table>
                   <div class="pani">
                    <ul class="pagination pull-right">
                    <li>
                        {!!$image->links()!!} 
                    </li>
                     </ul>
                   </div>
                </div>


@endsection 
                 
                 