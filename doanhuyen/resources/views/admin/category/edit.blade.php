 @extends('admin.layouts.index')
    @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn Sửa danh mục này ?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                           <div class="title table">
                               <h2>Sửa Danh Mục </h2>
                               <small>{{$category->name}}</small>
                           </div>   

                       @if(count($errors) > 0)

                           <div class="alert alert-danger">
                               @foreach($errors->all() as $err)
                               {{$err}}<br/>
                               @endforeach
                           </div>
                       @endif

                       @if(session('thongbao'))
                         <div class="alert alert-success">
                             {{session('thongbao')}}
                         </div>
                       @endif
                          <form action="admin/danhmuc/sua/{{$category->id}}" method="post" accept-charset="utf-8">

                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                         <div class="form-group">
                           <label>Tên Danh Mục</label>
                           <input type="text" name="ten" value="{{$category->name}}" class="form-control" placeholder="Nhập tên danh mục...">
                        </div>
                         <div class="form-group">
                            <label>Nổi Bật &nbsp; </label>

                           <label class="radio-inline">
                               <input type="radio" name="hotcate" value="1" 
                                @if($category->hot_category== 1)
                                   {{"checked"}}
                               @endif> có
                           </label>

                           <label class="radio-inline">
                            <input type="radio" name="hotcate" value="0" 
                               @if($category->hot_category == 0)
                                   {{"checked"}}
                               @endif
                            > không
                           </label>
                            
                         </div>
                          <br/>
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info edit">Sửa</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                      </div>
 </div>

 @endsection