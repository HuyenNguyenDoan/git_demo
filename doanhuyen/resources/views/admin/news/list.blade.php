@extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".delete").click(function(){
                            return confirm('Bạn có chắc muốn xóa tin tức này ?');
                   });
             });
       </script>
  @endsection
@section('content')
              <div class="col-md-9  content"> 

                     <div class="title table">
                         <h2>Danh sách Tin Tức</h2>
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
		                            <th>Tiêu Đề Tin Tức</th>
		                            <th>Nội Dung</th>
		                            <th>Hình Ảnh</th>
		                            <th>Nổi Bật</th>
		                            <th>Sửa</th>
		                            <th>Xóa</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($new as $n)
		                        <tr>
		                            <td>{{$n->id}}</td>
		                            <td>{{$n->title}}</td>
		                            <td>{{$n->content}}</td>
		                            <td>
		                              <img src="uploads/news/{{$n->images}}" alt="" width="100px" height="100px"> 
		                            </td>
		                            <td>
		                              @if($n->hot_news == 1)
		                                 {{'Tin Nổi Bật'}}
		                              @else
		                                 {{'Tin Thường'}}
		                              @endif
		                            </td>
		                            <td>
		                                <a href="admin/tintuc/sua/{{$n->id}}" title="">Sửa</a>
		                            </td>
		                            <td>
		                                <a href="admin/tintuc/xoa/{{$n->id}}" title="" class="delete">Xóa</a>
		                            </td>
		                        </tr>
		                      @endforeach 
		                    </tbody>
                   </table>
                    <div class="pani">
		                    <ul class="pagination pull-right">
                                    @if($new->currentPage() != 1)
			                        <li><a href="{!!$new->url($new->currentPage() - 1)!!}">Page</a></li>
                                    @endif
			                         @for($i = 1 ;$i <= $new->lastPage(); $i++)
					                        <li 
					                          class="{{($new->currentPage()==$i) ? 'active' : ''}}">
					                         <a href="{!!$new->url($i)!!}">{{$i}}</a>
					                        </li>
			                         @endfor
			                         @if($new->currentPage() !=  $new->lastPage())
			                        <li><a href="{!!$new->url($new->currentPage() + 1)!!}">&raquo;</a></li>
			                         @endif()
		                    </ul>
                   </div>  
                </div>
@endsection 
                 
                 