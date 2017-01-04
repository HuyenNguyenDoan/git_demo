@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn xóa sản phẩm này ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách Sản Phẩm </h2>
                     </div>

                     @if(session('thongbao'))
                       <div class="alert alert-success">
                       	  {{session('thongbao')}}
                       </div>
                     @endif
                      <form action="admin/sanpham/danhsach" method="post" class="form-inline">
                      	  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <input type="text"  name="timkiem" class="form-control" placeholder="Nhập Tên sản Phẩm,Mã sẩn Phẩm  Bạn Muốn Tìm..." size="90">
                          <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                      </form>
                        
                    <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th>STT</th>
		                            <th>Tên Sản Phẩm</th>
		                            <th>Giá</th>
		                            <th>View</th>
		                            <th>Hình</th>
		                            <th>Mục</th>
		                            <th>Loại Gỗ</th>
		                            <th>Mô Tả</th>
		                            <th>Số Lượng</th>
		                            <th>Nổi Bật</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($product as $pr)
		                        <tr>
		                            <td>{{$pr->id}}</td>
		                            <td>{{$pr->name}}</td>
		                            <td>{{$pr->price}}</td>
		                            <td>{{$pr->view}}</td>
		                            <td>  
		                            	<img src="uploads/product/{{$pr->images}}" alt="" width="40px" height="40px">
		                            </td>
		                            <td>{{$pr->category_id}}</td>
		                            <td>{{$pr->type_of_wood_id}}</td>
		                            <td>{{$pr->description}}</td>
		                            <td>{{$pr->quantity}}</td>
		                             <td>
		                             	@if($pr->hot_product == 1)
		                             	   {{'có'}}
		                             	   @else
		                             	   {{'không'}}
		                             	@endif
		                             </td>
		                            <td>
		                                <a href="admin/sanpham/sua/{{$pr->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/sanpham/xoa/{{$pr->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                        @endforeach
		                      
		                    </tbody>
                   </table>
         
                   <div class="pani">
		                    <ul class="pagination pull-right">

                                     @if($product->currentPage() != 1)
			                        <li><a href="{!!$product->url($product->currentPage()- 1)!!}">Page</a></li>
                                     @endif()
			                        @for($i = 1 ; $i <= $product->lastPage() ;$i++)
			                        <li class="{{($product->currentPage()==$i)? 'active' : ''}}">
			                        <a href="{!!$product->url($i)!!}">{{$i}}</a>
			                        </li>
			                        @endfor

			                         @if($product->currentPage() != $product->lastPage())
			                        <li><a href="{!!$product->url($product->currentPage() +1)!!}">&raquo;</a></li>

			                         @endif()
		                    </ul>
                   </div>
                   
                </div>


@endsection 
                 
                 