@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn Xóa danh mục Này ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách danh mục</h2>
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
		                            <th>Tên Danh Mục</th>
		                            <th>Danh Mục hot</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                      @foreach($category as $cate)
		                        <tr>
		                            <td>{{$cate->id}}</td>
		                            <td>{{$cate->name}}</td>
		                            <td>
		                               @if( $cate->hot_category==1)
		                                  {{'có'}}
                                        @else
                                         {{'không'}}
		                               @endif
		                            </td>
		                            <td>
		                                <a href="admin/danhmuc/sua/{{$cate->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/danhmuc/xoa/{{$cate->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                       @endforeach
		                    </tbody>
                   </table>
         
                   <div class="pani">
		                    <ul class="pagination pull-right">

                                    @if($category->currentPage() != 1)
			                        <li><a href="{!!$category->url($category->currentPage() - 1)!!}">Page</a></li>
                                    @endif
                                    
			                         @for($i = 1 ;$i <= $category->lastPage(); $i++)
					                        <li 
					                          class="{{($category->currentPage()==$i) ? 'active' : ''}}">
					                         <a href="{!!$category->url($i)!!}">{{$i}}</a>
					                        </li>
			                         @endfor

			                         @if($category->currentPage() !=  $category->lastPage())
			                        <li><a href="{!!$category->url($category->currentPage() + 1)!!}">&raquo;</a></li>
			                         @endif()
		                    </ul>
                   </div>
                   
                </div>

@endsection 
                 
                 